<?php
/**
 * Callout bar at the bottom of mobile devices
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Default values
$offices = get_posts(array('post_type' => 'office'));
$contactLink = get_field('general_contact_link', 'options');
?>

<?php if (count($offices) == 1) { ?>
<div class="callout-mobilebar d-md-none">
    <div class="row g-0">

        <div class="callout-mobilebar-col col-4 position-relative">
            <i class="fa-solid fa-calendar-check me-1"></i> Book
            <a href="<?php echo $contactLink['url']; ?>" target="<?php echo $contactLink['target']; ?>" class="stretched-link"></a>
        </div>
        <div class="callout-mobilebar-col col-4 position-relative">
            <i class="fa-solid fa-diamond-turn-right me-1"></i> Drive
            <a href="<?php echo mpfdm_get_office_information($offices[0]->ID, 'gmap_link'); ?>" target="_blank" class="stretched-link"></a>
        </div>
        <div class="callout-mobilebar-col col-4 position-relative">
            <i class="fa-solid fa-phone-flip me-1"></i> Call
            <a href="tel:<?php echo mpfdm_get_office_information($offices[0]->ID, 'phone'); ?>" class="stretched-link"></a>
        </div>

    </div>
</div>
<?php } ?>