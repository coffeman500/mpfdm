<?php
/**
 * Title banner with breadcrumbs and image
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'banner-titleimage';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Default Values
$post = get_post($post_id);
$image = get_the_post_thumbnail_url($post_id, 'large')  ?: "https://placehold.co/992x992";
$content = get_field('banner_content')                  ?: false;
$displayBreadcrumbs = get_field('breadcrumbs')          ?: false;
?>

<div class="<?php echo $class_names; ?>">
    <div class="banner-titleimage-inner">
        <div class="banner-titleimage-row row g-0">

            <div class="banner-titleimage-content col-12 col-md-6">
                <div class="banner-titleimage-content-inner">
                    
                    <?php if ($displayBreadcrumbs) { ?>
                    <div class="banner-titleimage-content-breadcrumbs">
                        <?php echo mpfdm_get_page_breadcrumbs($post_id); ?>
                    </div>
                    <?php } ?>

                    <h1><?php echo $post->post_title; ?></h1>

                    <?php if ($content) { ?>
                    <div class="banner-titleimage-content-blurb">
                        <?php echo $content; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="banner-titleimage-image col-12 col-md-6" style="background-image:url('<?php echo $image; ?>');"></div>

        </div>
    </div>
</div>