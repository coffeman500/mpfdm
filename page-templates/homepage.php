<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="homepage-wrapper">

    <div class="container">
        <?php
        while ( have_posts() ) {
            the_post();
            get_template_part( 'loop-templates/content', 'empty' );
        }
        ?>
    </div>

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
