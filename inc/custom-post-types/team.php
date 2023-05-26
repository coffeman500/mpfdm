<?php
/**
 * Team custom post type registration
 * 
 */
function mpfdm_team_custom_post_type()
{
    register_post_type(
        'team',
        array(
            'labels' => array(
                'name' => 'Team',
                'singular_name' => 'Team'
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array( 'slug' => 'team' ),
            'hierarchical' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-groups',
            'supports' => [
                'title',
                'editor',
                'revisions',
                'excerpt',
                'thumbnail',
                'custom-fields',
                'page-attributes',
            ],
            'taxonomies' => array('team_role'),
        ),
    );
}
add_action('init', 'mpfdm_team_custom_post_type');

/**
 * Role taxonomy for team members
 * 
 */
function mpfdm_team_custom_post_type_taxonomy() {

    register_taxonomy(
        'team_role', 
        'team', 
        array(
            'labels' => array(
                'name' => 'Roles',
                'singular_name' => 'Role',
                'search_items' =>  'Search Roles',
                'all_items' => 'All Roles',
                'edit_item' => 'Edit Role', 
                'update_item' => 'Update Role',
                'add_new_item' => 'Add New Role',
                'new_item_name' => 'New Role Name',
                'menu_name' => 'Roles',
            ),
            'public' => true,
            'query_var' => true,
            'show_in_rest' => true,
            'rewrite' => array( 'slug' => 'role' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'mpfdm_team_custom_post_type_taxonomy' );



/*
 * Team custom post type metaboxes
 * 
 */

// Add meta boxes to post editor screens only
add_action('load-post.php', 'mpfdm_team_metabox_setup');
add_action('load-post-new.php', 'mpfdm_team_metabox_setup');

/**
 * Meta box set up
 * 
 */
function mpfdm_team_metabox_setup()
{
    add_action('add_meta_boxes', 'mpfdm_add_team_metaboxes');
    add_action('save_post', 'mpfdm_save_team_metaboxes', 10, 2);
}

/**
 * Create meta boxes
 * 
 */
function mpfdm_add_team_metaboxes()
{
    // Team member's title
    add_meta_box(
        'mpfdm_team_title',
        'Team member title',
        'mpfdm_team_title_html',
        'team',
        'side',
    );
}

/**
 * Team member title HTML callback function
 * 
 */
function mpfdm_team_title_html($post)
{
    // Old Values
    $mpfdm_team_member_title = esc_attr( get_post_meta($post->ID, 'mpfdm_team_member_title', true) );

    // Nonce
    wp_nonce_field( basename( __FILE__ ), 'mpfdm_team_member_nonce' );

    // Form HTML
    ?>
    <label for="mpfdm_team_member_title">Team member title</label>
    <input type="text" class="form-control" name="mpfdm_team_member_title" id="mpfdm_team_member_title" value="<?php echo $mpfdm_team_member_title; ?>">
    <?php
}


/**
 * Save team meta boxes
 * 
 */
function mpfdm_save_team_metaboxes($post_id, $post)
{
    // Verify nonce
    if ( !isset( $_POST['mpfdm_team_member_nonce'] ) || !wp_verify_nonce( $_POST['mpfdm_team_member_nonce'], basename( __FILE__ ) ) ) return $post_id;

    // Get the post type object.
    $post_type = get_post_type_object( $post->post_type );

    // Check if the current user has permission to edit the post.
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) return $post_id;

    // Update post meta for basic fields
    mpfdm_action_post_meta('mpfdm_team_member_title', $post_id, $_POST['mpfdm_team_member_title']);
}