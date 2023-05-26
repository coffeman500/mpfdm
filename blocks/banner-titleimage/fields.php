<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_banner_titleimage',
        'title' => 'Banner Title Image Split',
        'fields' => array (
            array (
                'key' => 'field_banner_titleimage_breadcrumbs',
                'label' => 'Display Breadcrumbs',
                'name' => 'breadcrumbs',
                'type' => 'true_false',
                'default_value' => 1,
            ),
            array (
                'key' => 'field_banner_titleimage_content',
                'label' => 'Banner Content',
                'name' => 'banner_content',
                'type' => 'wysiwyg'
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/banner-titleimage',
                ),
            ),
        ),
    ));

}