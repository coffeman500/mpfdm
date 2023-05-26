<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_content_contactpill',
        'title' => 'Contact Form Pill',
        'fields' => array (
            array (
                'key' => 'field_content_contactpill_content',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
            ),
            array (
                'key' => 'field_content_contactpill_form_shortcode',
                'label' => 'Contact Form Shortcode',
                'name' => 'shortcode',
                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/content-contactpill',
                ),
            ),
        ),
    ));

}