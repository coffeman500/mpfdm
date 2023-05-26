<?php
/**
 * Navbar topmenu containing calls to action and office information
 *
 * This navbar display differently based on how many Offices the website has:
 *  1: Address, Appointment Request, Phone number
 *  2: Office nickname & office phone, Office nickname & office phone, Appointment request
 *  3+: Our locations link, Appointment reqeust
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$offices = get_posts(array('post_type' => 'office'));
$contactLink = get_field('general_contact_link', 'options');
?>

<div class="navbar-topmenu">
    <div class="row gx-4 gy-2 align-items-center justify-content-end">

    <?php
    if (count($offices) == 1) 
    { // 1 Office
    ?>

        <div class="col-auto navbar-topmenu-address">
            <a href="<?php echo mpfdm_get_office_information($offices[0]->ID, 'gmap_link'); ?>" target="_blank" class="text-reset text-decoration-none"><i class="fa-solid fa-location-dot"></i> <?php echo mpfdm_get_office_information($offices[0]->ID, 'full_address'); ?></a>
        </div>

    <?php } 
    else if (count($offices) == 2)
    { // 2 Offices
    ?>

    <?php } 
    else if (count($offices) >= 3)
    { // 3+ Offices
    ?>

    <?php }
    ?>

    </div>
</div>