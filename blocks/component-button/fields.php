<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_componentbutton',
        'title' => 'Button',
        'fields' => array (
            array (
                'key' => 'field_componentbutton_button',
                'label' => 'Button',
                'name' => 'button',
                'type' => 'link',
                'required' => true,
            ),
            array (
                'key' => 'field_componentbutton_type',
                'label' => 'Type',
                'name' => 'type',
                'type' => 'select',
                'choices' => array(
                    'btn-' => 'Solid',
                    'btn-outline-' => 'Outline',
                )
            ),
            array (
                'key' => 'field_componentbutton_style',
                'label' => 'Style',
                'name' => 'style',
                'type' => 'select',
                'choices' => array(
                    'primary' => 'Primary',
                    'secondary' => 'Secondary',
                    'light' => 'Light',
                    'dark' => 'Dark',
                )
            ),
            array (
                'key' => 'field_componentbutton_icon',
                'label' => 'Add Icon',
                'name' => 'icon',
                'type' => 'true_false',
            ),
            array (
                'key' => 'field_componentbutton_icon_prefix',
                'label' => 'Prefix Icon',
                'name' => 'icon_prefix',
                'type' => 'true_false',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_componentbutton_icon',
                            'operator' => '==',
                            'value' => 1,
                        )
                    )
                )
            ),
            array (
                'key' => 'field_componentbutton_icon_custom_icon',
                'label' => 'Custom Icon',
                'name' => 'icon_custom',
                'type' => 'text',
                'instructions' => 'Add your Font Awesome icon classes here to override the default icon.',
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_componentbutton_icon',
                            'operator' => '==',
                            'value' => 1,
                        )
                    )
                )
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/component-button',
                ),
            ),
        ),
    ));

}