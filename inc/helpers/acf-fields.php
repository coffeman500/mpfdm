<?php
/**
 * Helpers related to getting, displaying, and modifying ACF fields
 * 
 */

/**
 * Returns button html from ACF link array
 * 
 * @param Array : The ACF link Array
 * @param String : Optional string of classes to apply
 * @param String $icon : Optional icon to postfix
 * @return HTML
 */
 function mpfdm_get_acf_button($field, $classes = 'btn btn-primary', $icon = '')
 {
	return '<a class="' . $classes . '" href="' . $field['url'] . '" target="' . $field['target'] . '">' . $field['title'] . $icon . '</a>';
 }