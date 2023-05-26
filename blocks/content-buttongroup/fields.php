<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_buttongroup',
        'title' => 'Full-Width Button Group',
        'fields' => array (
            array(
                'key' => 'field_buttongroup_style',
                'label' => 'Style',
                'name' => 'style',
                'type' => 'select',
                'choices' => array(
                    'light' => 'Light',
                    'dark' => 'Dark',
                ),
            ),
            array (
                'key' => 'field_buttongroup_buttons',
                'label' => 'Buttons',
                'name' => 'buttons',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_buttongroup_button',
                        'label' => 'Button',
                        'name' => 'button',
                        'type' => 'link',
                    ),
                    array(
                        'key' => 'field_buttongroup_highlight',
                        'label' => 'Highlight',
                        'name' => 'highlight',
                        'type' => 'true_false',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/content-buttongroup',
                ),
            ),
        ),
    ));

}