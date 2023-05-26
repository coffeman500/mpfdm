<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Load helper functions
 * 
 */
require_once(__DIR__ . '/inc/helpers/office-information.php');
require_once(__DIR__ . '/inc/helpers/acf-fields.php');

/**
 * Load shortcodes
 * 
 */
require_once(__DIR__ . '/inc/shortcodes/office_info.php');
require_once(__DIR__ . '/inc/shortcodes/office_social.php');

/**
 * Load custom post types
 * 
 */
require_once(__DIR__ . '/inc/custom-post-types/service.php');
require_once(__DIR__ . '/inc/custom-post-types/office.php');
require_once(__DIR__ . '/inc/custom-post-types/team.php');

/**
 * Load theme settings
 * 
 */
require_once(__DIR__ . '/inc/settings/acf-theme-options.php');

/**
 * Load widgets
 * 
 */
require_once(__DIR__ . '/inc/mpfdm-widgets.php');

/**
 * Load ACF Blocks
 * 
 */
require_once(__DIR__ . '/blocks/blocks.php');

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
	wp_enqueue_script( 'jquery' );
	
	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );



/**
 * Disable all comment functionality
 * 
 * https://www.wpbeginner.com/wp-tutorials/how-to-completely-disable-comments-in-wordpress/
 */
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
     
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
 
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
 
// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
 
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
 
// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
 
// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});



/**
 * Load Bootstrap 5 utilities into the back-end
 * 
 */
add_action( 'admin_enqueue_scripts', 'mpfdm_load_admin_style' );
function mpfdm_load_admin_style() 
{
    wp_enqueue_style( 'admin_css', get_stylesheet_directory_uri() . '/css/admin-styles.css', false, '1.0.0' );
}



/**
 * Helper function to assist in saving post meta
 * 
 * @param String $meta_key
 * @param Integer $post_id
 * @param Mixed $new_meta_value
 */
function mpfdm_action_post_meta($meta_key, $post_id, $new_meta_value)
{
    // Get current meta value
    $meta_value = get_post_meta( $post_id, $meta_key, true );

    // Add new meta value
    if ( $new_meta_value && '' == $meta_value )
        add_post_meta( $post_id, $meta_key, $new_meta_value, true );

    // Update meta value
    elseif ( $new_meta_value && $new_meta_value != $meta_value )
        update_post_meta( $post_id, $meta_key, $new_meta_value );

    // Delete meta value
    elseif ( '' == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, $meta_key, $meta_value );

}



/**
 * Register extra navigations
 * 
 */
 function mpfdm_register_footer_navs() {
	register_nav_menus( array(
		'footer_nav_1' => 'Footer Nav Left',
        'footer_nav_2' => 'Footer Nav Right'
	));
 }
 add_action( 'after_setup_theme', 'mpfdm_register_footer_navs', 0 );


 /**
  * Function for returning breadcrumbs
  *
  */
function mpfdm_get_page_breadcrumbs($post_id, $call = 0) 
{
    $post = get_post($post_id);
    $postURL = get_permalink($post_id);
    $call++;
    $output = "";

    if ($post->post_parent) {
        $output .= mpfdm_get_page_breadcrumbs($post->post_parent, $call);

        if ($call >= 2)
            $output .=  " > ";
    }

    if ($call == 1) {
        return $output;
    } else {
        return $output . "<a href='{$postURL}'>{$post->post_title}</a>";
    }
}

/**
 * Function to change the GForm submit button to a Bootstrap supported button
 * 
 */
function mpfdm_gform_submit_button( $button, $form ) {
    return "<button type='submit' class='btn btn-primary btn-icon' id='gform_submit_button_{$form['id']}'>Submit <i class='fa-solid fa-arrow-right postfix-icon'></i></button>";
}
add_filter( 'gform_submit_button', 'mpfdm_gform_submit_button', 10, 2 );