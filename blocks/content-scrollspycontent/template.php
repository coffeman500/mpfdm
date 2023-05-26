<?php
/**
 * 
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'content-scrollspycontent';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}

// Get the office for contact links
$offices = get_posts(array('post_type' => 'office'));

if (count($offices) > 0) {
    $phone = mpfdm_get_office_information($offices[0]->ID, 'phone')             ?: false;
    $email = mpfdm_get_office_information($offices[0]->ID, 'email')             ?: false;
    $gmap_link = mpfdm_get_office_information($offices[0]->ID, 'gmap_link')     ?: false;
}

?>

<div class="<?php echo $class_names; ?>">
    <div class="row gx-xl-5 gx-xxl-7">

        <div class="scrollspy-sidebar-wrapper col-12 col-lg-4">
            <div id="scrollspy-sidebar">
                <div id="scrollspy-sidebar-headers" class="list-group"></div>
                    <div class="scrollspy-sidebar-cta">

                        <div class="row align-items-center justify-content-end">
                            <div class="col-auto">
                                <h3>Contact Us</h3>
                            </div>
                            <?php if (count($offices) > 0) { ?>

                                <?php if ($email) { ?>
                                <div class="col-auto">
                                    <a href="mailto:<?php echo $email; ?>"><i class="fa fa-solid fa-envelope"></i></a>
                                </div>
                                <?php } ?>

                                <?php if ($phone) { ?>
                                <div class="col-auto">
                                    <a href="tel:<?php echo $phone; ?>"><i class="fa fa-solid fa-phone"></i></a>
                                </div>
                                <?php } ?>
                                
                                <?php if ($gmap_link) { ?>
                                <div class="col-auto">
                                    <a href="<?php echo $gmap_link; ?>" target="_blank"><i class="fa fa-solid fa-location-dot"></i></a>
                                </div>
                                <?php } ?>

                            <?php } ?>
                        </div>
                    
                </div>
            </div>
        </div>

        <div class="scrollspy-content col-12 col-lg-8 col-xl">
            <InnerBlocks />
        </div>

    </div>
</div>