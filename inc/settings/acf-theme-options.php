<?php
/**
 * Set up and register theme general options page using ACF
 * 
 */



/**
 * Register the options page
 */
if(function_exists('acf_add_options_page')) 
{
    acf_add_options_page();
} 



/**
 * Register fields
 * 
 */
if(function_exists('acf_add_local_field_group'))
{
    // General theme settings
    acf_add_local_field_group(array(
        'key' => 'group_general_settings',
        'title' => 'Theme Settings',
        'fields' => array (
            /**
             * General settings tab
             */
            array (
                'key' => 'field_general_tab',
                'label' => 'General',
                'name' => 'general_tab',
                'type' => 'tab',
                'placement' => 'left',
            ),
            array ( // Contact link
                'key' => 'field_general_contact_link',
                'label' => 'General Contact Link',
                'name' => 'general_contact_link',
                'type' => 'link',
            ),
            array ( // Disable single staff pages
                'key' => 'field_disable_staff_pages',
                'label' => 'Disable individual staff pages',
                'name' => 'disable_staff_pages',
                'type' => 'true_false',
                'wrapper' => array(
                    'width' => '100%',
                ),
            ),
            array ( // Disable theme footer byline
                'key' => 'field_disable_footer_byline',
                'label' => 'Disable Footer Byline',
                'instructions' => 'Enable this setting to remove the `designed and mainted by` line in the footer',
                'name' => 'disable_footer_byline',
                'type' => 'true_false',
            ),
            array ( // Custom Footer Byline
                'key' => 'field_custom_footer_byline',
                'label' => 'Custom Footer Byline',
                'instructions' => 'Any text entered here will override the footer Byline',
                'name' => 'custom_footer_byline',
                'type' => 'wysiwyg',
            ),
            /**
             * Scripts tab
             */
            array (
                'key' => 'field_scripts_tab',
                'label' => 'Scripts',
                'name' => 'scripts_tab',
                'type' => 'tab',
                'placement' => 'left',
            ),
            array ( // Tag manager script
                'key' => 'field_tag_manager_script',
                'label' => 'Google Tag Manager Script',
                'name' => 'tag_manager_script',
                'type' => 'textarea',
            ),
            array ( // Header scripts
                'key' => 'field_header_scripts',
                'label' => 'Additional Header Scripts',
                'name' => 'header_scripts',
                'type' => 'textarea',
            ),
            array ( // Footer scripts
                'key' => 'field_footer_scripts',
                'label' => 'Additional Footer Scripts',
                'name' => 'footer_scripts',
                'type' => 'textarea',
            ),
            /**
             * Pop-up modal settings tab
             */
            array (
                'key' => 'field_popupmodal_tab',
                'label' => 'Pop-up Modal',
                'name' => 'popupmodal_tab',
                'type' => 'tab',
                'placement' => 'left',
            ),
            array ( // Pop-up expiration datetime
                'key' => 'field_popupmodal_expiration',
                'label' => 'Pop-up modal expiration datetime',
                'name' => 'popupmodal_expiration',
                'display_format' => 'm/d/Y g:i a',
                'return_format' => 'm/d/Y g:i a',
                'type' => 'date_time_picker',
            ),
            array ( // Pop-up title
                'key' => 'field_popupmodal_title',
                'label' => 'Pop-up modal title',
                'name' => 'popupmodal_title',
                'type' => 'text',
            ),
            array ( // Pop-up content
                'key' => 'field_popupmodal_content',
                'label' => 'Pop-up modal content',
                'name' => 'popupmodal_content',
                'type' => 'wysiwyg',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
                ),
            ),
        ),
    ));
}