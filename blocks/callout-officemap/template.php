<?php
/**
 * Full width office map meant for a single office location
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'callout-officemap';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Get first office available
$officeId = get_field('office');
?>

<div class="<?php echo $class_names; ?>">
    <div class="callout-officemap-inner">

        <div class="callout-officemap-content bg-white rounded shadow">
            <h2>Visit Us</h2>
            <p><?php echo mpfdm_get_office_information($officeId, 'name'); ?> is located at</p>
            <h4><?php echo mpfdm_get_office_information($officeId, 'address', true, 'text-reset text-decoration-none'); ?></h4>
        </div>

        <?php echo mpfdm_get_office_information($officeId, 'gmap_embed'); ?>

    </div>
</div>