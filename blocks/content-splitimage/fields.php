<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_content_splitimage',
        'title' => 'Split Image Content Section',
        'fields' => array (
            array (
                'key' => 'field_content_splitimage_image',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'wrapper' => array('width' => '50%'),
                'instructions' => 'Recommended image size: 992x750',
            ),
            array (
                'key' => 'field_content_splitimage_flip',
                'label' => 'Flip image/content positions',
                'name' => 'flip_positions',
                'type' => 'true_false',
                'wrapper' => array('width' => '50%'),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/content-splitimage',
                ),
            ),
        ),
    ));

}