<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_banner_fullheight',
        'title' => 'Full Height Banner',
        'fields' => array (
            array (
                'key' => 'field_banner_fullheight_content',
                'label' => 'Banner Content',
                'name' => 'content',
                'type' => 'wysiwyg',
            ),
            array (
                'key' => 'field_banner_fullheight_image_desktop',
                'label' => 'Desktop Background Image',
                'name' => 'image_desktop',
                'instruction' => 'Background image to be shown on desktop. 1920x960',
                'type' => 'image',
                'wrapper' => array( 'width' => '50%' ),
            ),
            array (
                'key' => 'field_banner_fullheight_image_mobile',
                'label' => 'Mobile Background Image',
                'name' => 'image_mobile',
                'instruction' => 'Background image to be shown on mobile. 992x800',
                'type' => 'image',
                'wrapper' => array( 'width' => '50%' ),
            ),
            array (
                'key' => 'field_banner_fullheight_button_1',
                'label' => 'First Button',
                'name' => 'button_1',
                'type' => 'link',
                'wrapper' => array( 'width' => '50%' ),
            ),
            array (
                'key' => 'field_banner_fullheight_button_2',
                'label' => 'Second Button',
                'name' => 'button_2',
                'type' => 'link',
                'wrapper' => array( 'width' => '50%' ),
            ),
            array (
                'key' => 'field_banner_fullheight_overlay_color',
                'label' => 'Overlay background color',
                'name' => 'overlay_color',
                'type' => 'text',
                'wrapper' => array( 'width' => '33%' ),
            ),
            array (
                'key' => 'field_banner_fullheight_overlay_opacity',
                'label' => 'Overlay opacity',
                'name' => 'overlay_opacity',
                'type' => 'number',
                'min' => 0,
                'max' => 1,
                'default_value' => 1,
                'wrapper' => array( 'width' => '33%' ),
            ),
            array (
                'key' => 'field_banner_fullheight_overlay_type',
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
                    'value' => 'acf/banner-fullheight',
                ),
            ),
        ),
    ));

}