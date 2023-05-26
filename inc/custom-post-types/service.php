<?php
/**
 * Service custom post type registration
 * 
 */
function mpfdm_service_custom_post_type()
{
    register_post_type(
        'service',
        array(
            'labels' => array(
                'name' => 'Services',
                'singular_name' => 'Service'
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array( 'slug' => 'services' ),
            'hierarchical' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-networking',
            'capabilities' => [],
            'supports' => [
                'title',
                'editor',
                'revisions',
                'excerpt',
                'thumbnail',
                'custom-fields',
                'page-attributes',
            ],
        ),
    );
}
add_action('init', 'mpfdm_service_custom_post_type');