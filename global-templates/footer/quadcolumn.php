<?php
/**
 * Loads the 4 footer sidebar widgets in a 4 column layout
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="footer-quadcolumn">
    <div class="container container-maxwrap">
        
        <div class="row gy-5 gx-lg-5 gx-xxl-6">

            <?php if (is_active_sidebar('footer1')) { ?>
            <div class="fa1 footer-area col-12 col-md-6 col-xl-4 col-xxl-auto">
                <div class="fa-inner">
                    <?php dynamic_sidebar('footer1'); ?>
                </div>
            </div>
            <?php } ?>

            <?php if (is_active_sidebar('footer2')) { ?>
            <div class="fa2 footer-area order-3 order-lg-2 col-12 col-md-6 col-xl">
                <div class="fa-inner">
                    <?php dynamic_sidebar('footer2'); ?>
                </div>
            </div>
            <?php } ?>

            <?php if (is_active_sidebar('footer3')) { ?>
            <div class="fa3 footer-area order-4 order-lg-3 col-12 col-md-6 col-xl">
                <div class="fa-inner">
                    <?php dynamic_sidebar('footer3'); ?>
                </div>
            </div>
            <?php } ?>

            <?php if (is_active_sidebar('footer4')) { ?>
            <div class="fa4 footer-area order-2 order-lg-4 col-12 col-md-6 col-xl-3">
                <div class="fa-inner">
                    <?php dynamic_sidebar('footer4'); ?>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>
</div>