<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_callout_officemap',
        'title' => 'Office Map',
        'fields' => array (
            array (
                'key' => 'field_callout_officemap_office',
                'label' => 'Office',
                'name' => 'office',
                'type' => 'post_object',
                'required' => 1,
                'post_type' => 'office',
                'return_format' => 'id'
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/callout-officemap',
                ),
            ),
        ),
    ));

}