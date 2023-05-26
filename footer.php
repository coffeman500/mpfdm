<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$offices = get_posts(array('post_type' => 'office'));
?>

<div id="wrapper-footer">
    <?php get_template_part('global-templates/footer/quadcolumn'); ?>

    <?php get_template_part('global-templates/footer/copyright'); ?>
</div>

<?php get_template_part('global-templates/modal', 'popupmodal'); ?>

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php get_template_part('global-templates/callout', 'mobilebar'); ?>

<?php the_field('footer_scripts', 'options'); ?>
<?php wp_footer(); ?>

</body>

</html>

