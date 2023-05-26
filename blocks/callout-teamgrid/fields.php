<?php 
/**
 * Register ACF fields for the block
 * 
 */
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
        'key' => 'group_acf_callout_teamgrid',
        'title' => '',
        'fields' => array (
            array (
                'key' => 'field_callout_teamgrid_display_titles',
                'label' => 'Display Titles',
                'name' => 'display_titles',
                'type' => 'true_false',
                'default_value' => 1,
            ),
            array (
                'key' => 'field_callout_teamgrid_team_role',
                'label' => 'Display role',
                'name' => 'team_role',
                'type' => 'taxonomy',
                'taxonomy' => 'team_role',
            ),
            array (
                'key' => 'field_callout_teamgrid_grid_classes',
                'label' => 'Grid Classes',
                'name' => 'grid_classes',
                'type' => 'text',
                'default_value' => 'col-12 col-md-6 col-lg-4',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/callout-teamgrid',
                ),
            ),
        ),
    ));

}