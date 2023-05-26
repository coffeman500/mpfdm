<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_',
        'title' => '',
        'fields' => array (
            array (
                'key' => 'field_',
                'label' => 'Main Content',
                'name' => 'content',
                'type' => 'wysiwyg',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/',
                ),
            ),
        ),
    ));

}