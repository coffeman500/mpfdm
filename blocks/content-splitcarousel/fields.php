<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_content_splitcarousel',
        'title' => 'Split Carousel',
        'fields' => array (
            array (
                'key' => 'field_content_splitcarousel_slides',
                'label' => 'Slides',
                'name' => 'slides',
                'type' => 'repeater',
                'sub_fields' => Array(
                    array (
                        'key' => 'field_content_splitcarousel_slides_slide',
                        'label' => 'Slide',
                        'name' => 'slide',
                        'type' => 'image',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/content-splitcarousel',
                ),
            ),
        ),
    ));

}