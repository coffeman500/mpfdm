<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_banner_heroslider',
        'title' => 'Hero Slider',
        'fields' => array (
            array (
                'key' => 'field_banner_heroslider_slides',
                'label' => 'Slides',
                'name' => 'slides',
                'type' => 'repeater',
                'instructions' => 'Use desktop size, mobile size will be loaded automatically.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_banner_heroslider_slides_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                    ),
                ),
            ),
            array (
                'key' => 'field_banner_heroslider_interval',
                'label' => 'Slide Interval',
                'name' => 'interval',
                'type' => 'number',
                'default_value' => '5000',
                'instructions' => 'Slide interval in ms',
            ),
            array (
                'key' => 'field_banner_heroslider_overlay_color',
                'label' => 'Overlay background color',
                'name' => 'overlay_color',
                'type' => 'text',
                'wrapper' => array( 'width' => '33%' ),
            ),
            array (
                'key' => 'field_banner_heroslider_overlay_opacity',
                'label' => 'Overlay opacity',
                'name' => 'overlay_opacity',
                'type' => 'number',
                'min' => 0,
                'max' => 1,
                'default_value' => 1,
                'wrapper' => array( 'width' => '33%' ),
            ),
            array (
                'key' => 'field_banner_heroslider_overlay_type',
                'label' => 'Overlay blend mode',
                'name' => 'overlay_type',
                'type' => 'select',
                'wrapper' => array( 'width' => '33%' ),
                'choices' => array(
                    'normal' => 'Normal',
                    'multiply' => 'Multiply',
                    'difference' => 'Difference',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'soft-light' => 'Soft Light',
                    'hard-light' => 'Hard Light',
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/banner-heroslider',
                ),
            ),
        ),
    ));

}