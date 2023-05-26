<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_splitmap',
        'title' => 'Split Map',
        'fields' => array (
            array (
                'key' => 'field_splitmap_map',
                'label' => 'Map',
                'name' => 'map',
                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/callout-splitmap',
                ),
            ),
        ),
    ));

}