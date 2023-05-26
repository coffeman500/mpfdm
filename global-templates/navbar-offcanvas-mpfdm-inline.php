<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Get the office CPTs
$offices = get_posts(array('post_type' => 'office'));
$contactLink = get_field('general_contact_link', 'options');
?>

<nav id="main-nav" class="mpfdm-navbar-inline mpfdm-navbar navbar navbar-expand-lg navbar-light" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>

	<div class="container container-bigwrap">

        <div class="navbar-main-logo col col-lg-2 col-xl-3 col-xxl-auto">
            <!-- Your site branding in the menu -->
            <?php get_template_part( 'global-templates/navbar-branding' ); ?>
        </div>

        <div class="col-auto">
            <button
                class="navbar-toggler ms-2"
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

        <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="navbarNavOffcanvas">

            <div class="offcanvas-header justify-content-between align-items-center">
                <h3 class="m-0"><?php echo mpfdm_get_office_information(false, 'name'); ?></h3>
                <button
                    class="btn-close text-reset"
                    type="button"
                    data-bs-dismiss="offcanvas"
                    aria-label="<?php esc_attr_e( 'Close menu', 'understrap' ); ?>"
                ></button>
            </div><!-- .offcancas-header -->

            <div class="d-none d-lg-block d-xxl-none">
                <?php get_template_part( 'global-templates/navbar-topmenu-type2' ); ?>
            </div>

            <!-- The WordPress Menu goes here -->
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'primary',
                    'container_class' => 'offcanvas-body',
                    'container_id'    => '',
                    'menu_class'      => 'navbar-nav flex-grow-1',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'depth'           => 2,
                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                )
            );
            ?>

            <div class="offcanvas-footer p-5 text-center d-lg-none">
                <?php get_template_part( 'global-templates/navbar-branding' ); ?>
            </div>

        </div><!-- .offcanvas -->

        <div class="col-auto d-none d-lg-flex navbar-inline-buttons">
            <a href="<?php echo mpfdm_get_office_information($offices[0]->ID, 'gmap_link'); ?>" target="_blank" class="btn btn-outline-dark navbar-inline-button-address d-none d-xxl-block"><?php echo mpfdm_get_office_information($offices[0]->ID, 'street_address'); ?><br/><?php echo mpfdm_get_office_information($offices[0]->ID, 'city'); ?>, <?php echo mpfdm_get_office_information($offices[0]->ID, 'state'); ?> <?php echo mpfdm_get_office_information($offices[0]->ID, 'zip'); ?></a>
            <a href="tel:<?php echo mpfdm_get_office_information($offices[0]->ID, 'phone'); ?>" class="btn btn-primary btn-icon navbar-inline-button-phone"><i class="fa-solid fa-phone"></i> <?php echo mpfdm_get_office_information($offices[0]->ID, 'phone'); ?></a>
        </div>

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->