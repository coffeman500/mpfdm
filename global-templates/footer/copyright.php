<?php
/**
 * Loads the 4 footer sidebar widgets in a 4 column layout
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$byline = (get_field('custom_footer_byline', 'options', false)) ?: 'Website designed and maintained by <a class="text-reset" href="https://www.painfreedentalmarketing.com/" target="_blank">Pain Free Dental Marketing</a>.';
$offices = get_posts(array('post_type' => 'office'));

if (get_field('disable_footer_byline', 'options')) $byline = '';

?>

<div class="footer-copyright">
    <div class="container container-maxwrap">
        <div class="footer-copyright-inner">
            <div class="row align-items-center gy-3">

                <div class="footer-copyright-byline col-12 col-md">
                    <p>&#169;<?php echo date('Y'); ?> <?php echo get_bloginfo(); ?>. All rights reserved. <?php echo $byline; ?></p>
                </div>

                <div class="footer-copyright-social col-12 col-md-auto text-center">
                <?php
                if (count($offices) == 1) 
                { // Only show if there's one office
                ?>
                    <?php echo mpfdm_get_office_social($offices[0]->ID); ?>
                <?php 
                } ?> 
                </div>

            </div>            
        </div>
    </div>
</div>