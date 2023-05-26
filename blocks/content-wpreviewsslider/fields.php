<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_content_wpreviewsslider',
        'title' => '',
        'fields' => array (
            array (
                'key' => 'field_content_wpreviewsslider_title',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ),
            array (
                'key' => 'field_content_wpreviewsslider_slider_shortcode',
                'label' => 'Slider Shortcode',
                'name' => 'slider_shortcode',
                'type' => 'text',
            ),
            array (
                'key' => 'field_content_wpreviewsslider_badge_shortcode',
                'label' => 'Badge Shortcode',
                'name' => 'badge_shortcode',
                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/content-wpreviewsslider',
                ),
            ),
        ),
    ));

}