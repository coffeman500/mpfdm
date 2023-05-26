<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_callout_postgrid',
        'title' => 'Callout Post Grid',
        'fields' => array (
            array (
                'key' => 'field_callout_postgrid_title',
                'label' => 'Main Section Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Our Posts',
            ),
            array (
                'key' => 'field_callout_postgrid_display_type',
                'label' => 'Display type',
                'name' => 'display_type',
                'type' => 'select',
                'choices' => Array(
                    'specific' => 'Specified posts',
                    'children' => 'All children of specified post',
                    'siblings' => 'All siblings of the current post'
                ),
            ),
            array (
                'key' => 'field_callout_postgrid_posts',
                'label' => 'Post(s)',
                'name' => 'posts',
                'type' => 'post_object',
                'multiple' => 1,
                'required' => 1,
            ),
            array (
                'key' => 'field_callout_postgrid_post_limit',
                'label' => 'Post Limit',
                'name' => 'post_limit',
                'type' => 'number',
                'instructions' => 'Limit the amount of posts to display, -1 for no limit',
                'default_value' => -1,
            ),
            array (
                'key' => 'field_callout_postgrid_post_order',
                'label' => 'Post Order',
                'name' => 'post_order',
                'type' => 'select',
                'choices' => Array(
                    'title' => 'Title',
                    'date' => 'Date',
                    'menu_order' => 'Menu Order'
                ),
            ),
            array (
                'key' => 'field_callout_postgrid_post_order_type',
                'label' => 'Post Order Type',
                'name' => 'post_order_type',
                'type' => 'select',
                'choices' => Array(
                    'DESC' => 'Descending',
                    'ASC' => 'Ascending',
                ),
            ),
            array (
                'key' => 'field_callout_postgrid_hide_excerpt',
                'label' => 'Hide excerpt',
                'name' => 'hide_excerpt',
                'type' => 'true_false',
            ),
            array (
                'key' => 'field_callout_postgrid_overlay_color',
                'label' => 'Overlay background color',
                'name' => 'overlay_color',
                'type' => 'text',
                'wrapper' => array( 'width' => '33%' ),
            ),
            array (
                'key' => 'field_callout_postgrid_overlay_opacity',
                'label' => 'Overlay opacity',
                'name' => 'overlay_opacity',
                'type' => 'number',
                'min' => 0,
                'max' => 1,
                'default_value' => 1,
                'wrapper' => array( 'width' => '33%' ),
            ),
            array (
                'key' => 'field_callout_postgrid_overlay_type',
                'label' => 'Overlay blend mode',
                'name' => 'overlay_type',
                'type' => 'select',
                'wrapper' => array( 'width' => '33%' ),
                'choices' => array(
                    'normal' => 'Normal',
                    'multiply' => 'Multiply',
                    'difference' => 'Difference',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'soft-light' => 'Soft Light',
                    'hard-light' => 'Hard Light',
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/callout-postgrid',
                ),
            ),
        ),
    ));

}