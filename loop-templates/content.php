<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('col-12 col-lg-6 col-xl-4'); ?> id="post-<?php the_ID(); ?>">

    <div class="card">
        <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>" class="card-img-top" alt="<?php the_title(); ?>">

        <div class="card-body">
            <h3 class="card-title"><?php the_title(); ?></h3>
            <p class="card-text"><?php the_excerpt(); ?></p>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
