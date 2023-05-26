<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_callout_customcallouts',
        'title' => 'Custom Callouts',
        'fields' => array (
            array (
                'key' => 'field_callout_customcallouts_title',
                'label' => 'Main Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Lorem Ipsum',
            ),
            array (
                'key' => 'field_callout_customcallouts_grid_classes',
                'label' => 'Grid Layout Classes',
                'name' => 'grid_classes',
                'type' => 'text',
                'default_value' => 'col-12 col-md-6 col-lg-4',
            ),
            array (
                'key' => 'field_callout_customcallouts_callouts',
                'label' => 'Callouts',
                'name' => 'callouts',
                'type' => 'repeater',
                'sub_fields' => array(
                    array (
                        'key' => 'field_callout_customcallouts_callout_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => 'No dimension requirements, just ensure all images are the same dimensions',
                    ),
                    array (
                        'key' => 'field_callout_customcallouts_callout_content',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                    ),
                    array (
                        'key' => 'field_callout_customcallouts_callout_button',
                        'label' => 'Button',
                        'name' => 'button',
                        'type' => 'link',
                    ),
                    array (
                        'key' => 'field_callout_customcallouts_callout_button_classes',
                        'label' => 'Button Classes',
                        'name' => 'button_classes',
                        'type' => 'text',
                        'default_value' => 'btn btn-primary',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/callout-customcallouts',
                ),
            ),
        ),
    ));

}