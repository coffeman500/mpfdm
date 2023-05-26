<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="index-wrapper">

    <div class="index-header bg-pattern">
        <div class="index-header-inner">
            <h1>Blog</h1>
            <h4>Our Latest Dental News</h4>
        </div>
    </div>

	<div class="container my-5" id="content" tabindex="-1">

        <main class="site-main row gy-4 gx-lg-4" id="main">

            <?php
            if ( have_posts() ) {
                // Start the Loop.
                while ( have_posts() ) {
                    the_post();
                    
                    /*
                        * Include the Post-Format-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                        */
                    get_template_part( 'loop-templates/content', get_post_format() );
                }
            } else {
                get_template_part( 'loop-templates/content', 'none' );
            }
            ?>

        </main>

        <?php
        // Display the pagination component.
        understrap_pagination();
        ?>

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
