<?php
/**
 * Shortcode for retrieving office information
 * 
 * @param Array $atts : And array of attributes passed to the shortcode
 * @param String $content
 * 
 * @return String HTML
 */
function mpfdm_office_information_shortcode($atts, $content)
{
    // Attribute defaults
    $atts = shortcode_atts(array(
        'type' => 'phone',
        'prefix' => '',         // HTML prefix
        'postfix' => '',        // HTML postfix
        'prefix_icon' => '',    // Icon classes for prefixing
        'postfix_icon' => '',   // Icon classes for postfixing
        'linked' => false,       // Whether or not to apply a link
        'link_classes' => '',   // Extra link classes to apply, `linked` must be true
        'office_id' => false,   // Office ID
    ), $atts);
    
    // Retrieve office by id provided, or first available
    if ($atts['office_id'] === false) {
        $offices = get_posts(array(
            'post_type' => 'office',
            'fields' => 'ids'
        ));
        $atts['office_id'] = $offices[0];
    }
    $office = get_post($atts['office_id']);

    // Check return before continuing
    if ($office === null) return 'No office found for ID';

    // Set default link classes on certain types
    if (($atts['type'] == 'phone' || $atts['type'] == 'email' || $atts['type'] == 'address' || $atts['type'] == 'full_address') && $atts['link_classes'] == '') {
        $atts['link_classes'] = 'text-reset text-decoration-none';
    }

    // Create the icons if needed
    $prefixIcon = (!$atts['prefix_icon'] == '') ? "<i class='prefix-icon {$atts['prefix_icon']}'></i>" : "";
    $postfixIcon = (!$atts['postfix_icon'] == '') ? "<i class='postfix-icon {$atts['postfix_icon']}'></i>" : "";

    if ($prefixIcon || $postfixIcon) {
        $atts['link_classes'] .= " btn-icon";
    }

    $atts['prefix'] = $prefixIcon . $atts['prefix'];
    $atts['postfix'] .= $postfixIcon;
    
    // Pass all the information off to the info function
    $output = mpfdm_get_office_information(
        $office->ID, 
        $atts['type'], 
        $atts['linked'], 
        $atts['link_classes'], 
        $atts['prefix'], 
        $atts['postfix']
    );

    return $output;

}
add_shortcode('office_info', 'mpfdm_office_information_shortcode');