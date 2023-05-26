<?php
/**
 * Office custom post type registration & set up
 * 
 */
function mpfdm_office_custom_post_type()
{
    register_post_type(
        'office',
        array(
            'labels' => array(
                'name' => 'Offices',
                'singular_name' => 'Office'
            ),
            'public' => false,
            'has_archive' => false,
            'rewrite' => array( 'slug' => 'office' ),
            'hierarchical' => false,
            'menu_icon' => 'dashicons-location',
            'supports' => [
                'title',
                'revisions',
                'excerpt',
                'thumbnail',
                'custom-fields',
                'page-attributes',
            ],
        ),
    );
}
add_action('init', 'mpfdm_office_custom_post_type');



/*
 * Office Custom post type metaboxes
 * 
 */

// Add meta boxes to post editor screens only
add_action('load-post.php', 'mpfdm_office_metabox_setup');
add_action('load-post-new.php', 'mpfdm_office_metabox_setup');

/**
 * Meta box set up
 * 
 */
function mpfdm_office_metabox_setup()
{
    add_action('add_meta_boxes', 'mpfdm_add_office_metaboxes');
    add_action('save_post', 'mpfdm_save_office_metaboxes', 10, 2);
}

/**
 * Create meta boxes
 * 
 */
function mpfdm_add_office_metaboxes()
{

    // Office's general information
    add_meta_box(
        'mpfdm_office_information',
        'General Office Information',
        'mpfdm_office_information_html',
        'office'
    );

}

/**
 * Office information HTML callback function
 * 
 */
function mpfdm_office_information_html($post)
{
    // Old Values
    $mpfdm_office_shortname = esc_attr( get_post_meta($post->ID, 'mpfdm_office_shortname', true) );
    $mpfdm_office_gmap_link = esc_attr( get_post_meta($post->ID, 'mpfdm_office_gmap_link', true) );
    $mpfdm_office_gmap_embed = esc_attr( get_post_meta($post->ID, 'mpfdm_office_gmap_embed', true) );
    $mpfdm_office_address = esc_attr( get_post_meta($post->ID, 'mpfdm_office_address', true) );
    $mpfdm_office_city = esc_attr( get_post_meta($post->ID, 'mpfdm_office_city', true) );
    $mpfdm_office_state = esc_attr( get_post_meta($post->ID, 'mpfdm_office_state', true) );
    $mpfdm_office_zip = esc_attr( get_post_meta($post->ID, 'mpfdm_office_zip', true) );
    $mpfdm_office_phone = esc_attr( get_post_meta($post->ID, 'mpfdm_office_phone', true) );
    $mpfdm_office_email = esc_attr( get_post_meta($post->ID, 'mpfdm_office_email', true) );

    // Nonce
    wp_nonce_field( basename( __FILE__ ), 'mpfdm_office_information_nonce' );

    // Form HTML
    ?>
    <div class="container-fluid">

        <div class="row g-3">

            <div class="col-12 col-md-6 col-lg-4">
                <label for="mpfdm_office_shortname">Office Nickname</label>
                <input type="text" class="form-control" name="mpfdm_office_shortname" id="mpfdm_office_shortname" value="<?php echo $mpfdm_office_shortname; ?>">
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <label for="mpfdm_office_gmap_link">Google Map Link</label>
                <input type="text" class="form-control" name="mpfdm_office_gmap_link" id="mpfdm_office_gmap_link" value="<?php echo $mpfdm_office_gmap_link; ?>">
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <label for="mpfdm_office_gmap_embed">Google Map Embed</label>
                <input type="text" class="form-control" name="mpfdm_office_gmap_embed" id="mpfdm_office_gmap_embed" value="<?php echo $mpfdm_office_gmap_embed; ?>">
            </div>

            <div class="col-12">
                <label for="mpfdm_office_address">Address</label>
                <input type="text" class="form-control" name="mpfdm_office_address" id="mpfdm_office_address" value="<?php echo $mpfdm_office_address; ?>">
            </div>

            <div class="col-12 col-md-6">
                <label for="mpfdm_office_city">City</label>
                <input type="text" class="form-control" name="mpfdm_office_city" id="mpfdm_office_city" value="<?php echo $mpfdm_office_city; ?>">
            </div>

            <div class="col-12 col-md-2">
                <label for="mpfdm_office_state">State</label>
                <input type="text" class="form-control" name="mpfdm_office_state" id="mpfdm_office_state" value="<?php echo $mpfdm_office_state; ?>">
            </div>

            <div class="col-12 col-md-4">
                <label for="mpfdm_office_zip">Zip</label>
                <input type="text" class="form-control" name="mpfdm_office_zip" id="mpfdm_office_zip" value="<?php echo $mpfdm_office_zip; ?>">
            </div>

            <div class="col-12 col-md-6">
                <label for="mpfdm_office_phone">Phone</label>
                <input type="text" class="form-control" name="mpfdm_office_phone" id="mpfdm_office_phone" value="<?php echo $mpfdm_office_phone; ?>">
            </div>

            <div class="col-12 col-md-6">
                <label for="mpfdm_office_email">Email</label>
                <input type="text" class="form-control" name="mpfdm_office_email" id="mpfdm_office_email" value="<?php echo $mpfdm_office_email; ?>">
            </div>

        </div>

    </div>
    <?php
}



/**
 * Save office meta boxes
 * 
 */
function mpfdm_save_office_metaboxes($post_id, $post)
{
    // Verify nonce
    if ( !isset( $_POST['mpfdm_office_information_nonce'] ) || !wp_verify_nonce( $_POST['mpfdm_office_information_nonce'], basename( __FILE__ ) ) ) return $post_id;

    // Get the post type object.
    $post_type = get_post_type_object( $post->post_type );

    // Check if the current user has permission to edit the post.
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) return $post_id;

    // Update post meta for basic fields
    mpfdm_action_post_meta('mpfdm_office_shortname', $post_id, $_POST['mpfdm_office_shortname']);
    mpfdm_action_post_meta('mpfdm_office_gmap_link', $post_id, $_POST['mpfdm_office_gmap_link']);
    mpfdm_action_post_meta('mpfdm_office_gmap_embed', $post_id, $_POST['mpfdm_office_gmap_embed']);
    mpfdm_action_post_meta('mpfdm_office_address', $post_id, $_POST['mpfdm_office_address']);
    mpfdm_action_post_meta('mpfdm_office_city', $post_id, $_POST['mpfdm_office_city']);
    mpfdm_action_post_meta('mpfdm_office_state', $post_id, $_POST['mpfdm_office_state']);
    mpfdm_action_post_meta('mpfdm_office_zip', $post_id, $_POST['mpfdm_office_zip']);
    mpfdm_action_post_meta('mpfdm_office_phone', $post_id, $_POST['mpfdm_office_phone']);
    mpfdm_action_post_meta('mpfdm_office_email', $post_id, $_POST['mpfdm_office_email']);
}



/**
 * ACF Fields for the office CPT
 * 
 */
if(function_exists('acf_add_local_field_group'))
{
    // Social Media
    acf_add_local_field_group(array(
        'key' => 'group_social_media',
        'title' => 'Social Media',
        'fields' => array (
            /**
             * Social media repeater
             */
            array (
                'key' => 'field_social_media',
                'label' => 'Social Media Profiles',
                'name' => 'social_media',
                'type' => 'repeater',
                'sub_fields' => array(
                    array ( // Icon
                        'key' => 'field_social_media_icon',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array ( // Link
                        'key' => 'field_social_media_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'text',
                        'required' => 1,
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'office',
                ),
            ),
        ),
    ));

    // Office Hours
    acf_add_local_field_group(array(
        'key' => 'group_office_hours',
        'title' => 'Office Hours',
        'fields' => array (
            /**
             * Office hours repeater
             */
            array (
                'key' => 'field_office_hours',
                'label' => 'Office Hours',
                'name' => 'office_hours',
                'type' => 'repeater',
                'sub_fields' => array(
                    array ( // Day
                        'key' => 'field_office_hours_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                    ),
                    array ( // Hours
                        'key' => 'field_office_hours_hours',
                        'label' => 'Hours',
                        'name' => 'hours',
                        'type' => 'text',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'office',
                ),
            ),
        ),
    ));
}