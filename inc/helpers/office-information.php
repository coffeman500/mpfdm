<?php
/**
 * Helper functions related to getting and formatting office data
 * To be used in inline output, and shortcode functions
 * 
 */

/**
 * Retrieves and returns an office's full address, with optional modifications
 * 
 * @param Interger $office_id
 * @param Boolean $linked
 * @param String $classes
 * @param String $prefix
 * @param String $postfix
 * 
 * @return String HTML
 */
function mpfdm_get_office_address($office_id, $linked = false, $classes = '', $prefix = '', $postfix = '')
{
    $output = get_post_meta($office_id, 'mpfdm_office_address', true) . ', ' .
            get_post_meta($office_id, 'mpfdm_office_city', true) . ', ' .
            get_post_meta($office_id, 'mpfdm_office_state', true) . ' ' .
            get_post_meta($office_id, 'mpfdm_office_zip', true);

    $officeMapLink = get_post_meta($office_id, 'mpfdm_office_gmap_link', true);

    $linkPrefix = ($linked) ? "<a class='{$classes}' target='_blank' href='{$officeMapLink}'>" : "";
    $linkPostfix = ($linked) ? "</a>" : "";

    return $linkPrefix . $prefix . $output . $postfix . $linkPostfix;
}



/**
 * Retrieves and returns an office's phone number, with optional modifications
 * 
 * @param Interger $office_id
 * @param Boolean $linked
 * @param String $classes
 * @param String $prefix
 * @param String $postfix
 * 
 * @return String HTML
 */
function mpfdm_get_office_phone($office_id, $linked = false, $classes = '', $prefix = '', $postfix = '')
{
    $output = get_post_meta($office_id, 'mpfdm_office_phone', true);

    $linkPrefix = ($linked) ? "<a class='{$classes}' href='tel:{$output}'>" : "";
    $linkPostfix = ($linked) ? "</a>" : "";

    return $linkPrefix . $prefix . $output . $postfix . $linkPostfix;
}



/**
 * Retrieves and returns an office's email, with optional modifications
 * 
 * @param Interger $office_id
 * @param Boolean $linked
 * @param String $classes
 * @param String $prefix
 * @param String $postfix
 * 
 * @return String HTML
 */
function mpfdm_get_office_email($office_id, $linked = false, $classes = '', $prefix = '', $postfix = '')
{
    $output = get_post_meta($office_id, 'mpfdm_office_email', true);

    $linkPrefix = ($linked) ? "<a class='{$classes}' target='_blank' href='mailto:{$output}'>" : "";
    $linkPostfix = ($linked) ? "</a>" : "";

    return $linkPrefix . $prefix . $output . $postfix . $linkPostfix;
}



/**
 * Retrieves office social media, and formats it according to specifications
 * 
 * @param Integer $office_id
 * @param String $type
 * @param Boolean $link_only
 * @param String $custom_icon
 * 
 * @return String HTML
 */
function mpfdm_get_office_social($office_id, $classes = '')
{
    $socialArray = get_field('social_media', $office_id);

    if (!isset($socialArray) || $socialArray == false || count($socialArray) === 0) return 'No social profiles found for office ID';

    // Build HTML output
    $output = "<div class='office-social'>";
    foreach ($socialArray as $sm)
    {
        $output .= "<a class='office-social-link {$classes}' href='{$sm['link']}' target='_blank'>{$sm['icon']}</a>";
    }
    $output .= "</div>";

    return $output;
}



/**
 * Retrieves a formatted set of office hours
 * 
 * @param Integer $office_id
 * @param String $classes
 * 
 * @return String HTML
 */
function mpfdm_get_office_hours($office_id, $classes = '') 
{
    $hoursArray = get_field('office_hours', $office_id);

    if (!isset($hoursArray) || count($hoursArray) === 0) return 'No hours found for office ID';

    // Build HTML output
    $output = "<div class='office-hours {$classes}'>";
    foreach ($hoursArray as $day)
    {
        $output .= "<div class='row'>";
            $output .= "<div class='col'>";
                $output .= "<span class='office-hours-label'>{$day['label']}</span>";
            $output .= "</div>";
            $output .= "<div class='col-auto'>";
                $output .= "<span class='office-hours-hours'>{$day['hours']}</span>";
            $output .= "</div>";
        $output .= "</div>";
    }
    $output .= "</div>";

    return $output;
}



/**
 * General information return
 * 
 * @param Integer $office_id
 * @param String $type
 * @param Boolean $linked
 * @param String $classes
 * @param String $prefix
 * @param String $postfix
 * 
 * @return String
 */
function mpfdm_get_office_information($office_id = false, $type = null, $linked = false, $classes = '', $prefix = '', $postfix = '')
{
    // Retrieve office by id provided, or first available
    if ($office_id === false) {
        $offices = get_posts(array(
            'post_type' => 'office',
            'fields' => 'ids'
        ));
        if (count($offices) === 0) return "No offices set";
        $office_id = $offices[0];
    }

    switch (strtolower($type))
    {
        case 'name':
            return get_post_meta($office_id, 'mpfdm_office_shortname', true);
        case 'address':
        case 'full_address':
            return mpfdm_get_office_address($office_id, $linked, $classes, $prefix, $postfix);
        case 'street_address':
            return get_post_meta($office_id, 'mpfdm_office_address', true);
        case 'city':
            return get_post_meta($office_id, 'mpfdm_office_city', true);
        case 'state':
            return get_post_meta($office_id, 'mpfdm_office_state', true);
        case 'city-state':
            return mpfdm_get_office_information($office_id, 'mpfdm_office_city') . ", " . mpfdm_get_office_information($office_id, 'mpfdm_office_state');
        case 'zip':
            return get_post_meta($office_id, 'mpfdm_office_zip', true);
        case 'phone':
            return mpfdm_get_office_phone($office_id, $linked, $classes, $prefix, $postfix);
        case 'email':
            return mpfdm_get_office_email($office_id, $linked, $classes, $prefix, $postfix);
        case 'gmap_link':
            return get_post_meta($office_id, 'mpfdm_office_gmap_link', true); 
        case 'gmap_embed':
            return get_post_meta($office_id, 'mpfdm_office_gmap_embed', true);
        case 'hours':
            return mpfdm_get_office_hours($office_id, $classes);
        default:
            $postMetaSearch = get_post_meta($office_id, $type, true);
            $postMetaResponse = ($postMetaSearch == '') ? "No value found" : $postMetaSearch;
            return $postMetaResponse;
    }
}