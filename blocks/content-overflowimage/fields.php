<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_overflowimage',
        'title' => 'Overflow Image',
        'fields' => array (
            array (
                'key' => 'field_overflowimage_image',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/content-overflowimage',
                ),
            ),
        ),
    ));

}