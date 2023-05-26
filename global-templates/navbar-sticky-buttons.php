<?php
/**
 * Sticky nav
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$offices = get_posts(array('post_type' => 'office'));
$contactLink = get_field('general_contact_link', 'options');
?>

<div id="sticky-nav-mobile" class="d-lg-none navbar">
    <div class="container-fluid">
        <div class="row sticky-nav-mobile-row align-items-center">

            <div class="navbar-main-logo col">
                <!-- Your site branding in the menu -->
                <?php get_template_part( 'global-templates/navbar-branding' ); ?>
            </div>

            <div class="col-auto">
                <button
                    class="navbar-toggler ms-4"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#navbarNavOffcanvas"
                    aria-controls="navbarNavOffcanvas"
                    aria-expanded="false"
                    aria-label="<?php esc_attr_e( 'Open menu', 'understrap' ); ?>"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </div>
    </div>
</div>

<nav id="sticky-nav" class="mpfdm-navbar navbar navbar-expand-lg navbar-light d-none d-lg-block">
	<div class="container container-bigwrap">

        <div class="col-lg-auto">
            <!-- Your site branding in the menu -->
            <?php get_template_part( 'global-templates/navbar-branding' ); ?>
        </div>

        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'container_class' => 'navbar-nav col',
                'container_id'    => '',
                'menu_class'      => 'navbar-nav flex-grow-1',
                'fallback_cb'     => '',
                'menu_id'         => 'main-menu',
                'depth'           => 2,
                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
            )
        );
        ?>

        <div class="col-auto d-lg-flex navbar-inline-buttons">
            <a href="<?php echo mpfdm_get_office_information($offices[0]->ID, 'gmap_link'); ?>" target="_blank" class="btn btn-outline-dark navbar-inline-button-address d-none d-xxl-block"><?php echo mpfdm_get_office_information($offices[0]->ID, 'street_address'); ?><br/><?php echo mpfdm_get_office_information($offices[0]->ID, 'city'); ?>, <?php echo mpfdm_get_office_information($offices[0]->ID, 'state'); ?> <?php echo mpfdm_get_office_information($offices[0]->ID, 'zip'); ?></a>
            <a href="tel:<?php echo mpfdm_get_office_information($offices[0]->ID, 'phone'); ?>" class="btn btn-primary btn-icon navbar-inline-button-phone"><i class="fa-solid fa-phone"></i> <?php echo mpfdm_get_office_information($offices[0]->ID, 'phone'); ?></a>
        </div>

	</div><!-- .container -->
</nav><!-- #sticky-nav -->
