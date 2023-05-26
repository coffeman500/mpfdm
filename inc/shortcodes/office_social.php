<?php
/**
 * Shortcode for retrieving office social media
 * 
 * @param Array $atts : And array of attributes passed to the shortcode
 * @param String $content
 * 
 * @return String HTML
 */
function mpfdm_office_social_shortcode($atts, $content)
{
    // Attribute defaults
    $atts = shortcode_atts(array(
        'office_id' => false,
        'classes' => '',
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

    // Pass all the information off to the info function
    $output = mpfdm_get_office_social(
        $office->ID,
        $atts['classes'],
    );

    return $output;

}
add_shortcode('office_social', 'mpfdm_office_social_shortcode');