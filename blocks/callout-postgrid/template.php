<?php
/**
 * Displays posts in a grid format. Pulling the excerpt and featured image from each
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'callout-postgrid';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Get values and set defaults
$title = get_field('title')                         ?: false;
$posts = get_field('posts');
$currentPost = get_post($post_id);
$postLimit = get_field('post_limit')                ?: -1;
$displayType = get_field('display_type')            ?: 'specific';
$hideExcerpt = get_field('hide_excerpt')            ?: false;

$postOrder = get_field('post_order')                ?: 'title';
$postOrderType = get_field('post_order_type')       ?: 'DESC';

$overlayColor = get_field('overlay_color')          ?: false;
$overlayOpacity = get_field('overlay_opacity')      ?: 1;
$overlayType = get_field('overlay_type')            ?: 'normal';

// Change post array to contain the children of the specified post
if ($displayType == 'children') { 
    $posts = get_posts(Array(
        'numberposts' => -1,
        'post_parent' => $posts[0]->ID,
        'post_type' => 'any',
        'order' => $postOrderType,
        'orderby' => $postOrder,
    ));
} 
// Change post array to contain the siblings of the current post
if ($displayType == 'siblings') { 
    $posts = get_posts(Array(
        'numberposts' => -1,
        'post_parent' => $currentPost->post_parent,
        'post_type' => 'any',
        'exclude' => Array($post_id),
        'order' => $postOrderType,
        'orderby' => $postOrder,
    ));
} 

?>

<?php if ($posts) { ?>
<div class="<?php echo $class_names; ?>">
    <div class="callout-postgrid-inner">

        <?php if ($title) { ?>
        <h2 class="callout-postgrid-title"><?php echo $title; ?></h2>
        <?php } ?>

        <div class="row gy-5 gx-lg-5 callout-postgrid-row">
            <?php 
            $postcount = 0;
            foreach ($posts as $post) { ?>
            
            <div class="callout-postgrid-post col-12 col-md-6 col-lg-4">
                <div class="callout-postgrid-post-inner">

                    <div class="callout-postgrid-post-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post, 'large'); ?>');">
                        <?php if ($overlayColor) { echo "<div class='overlay' style='background:{$overlayColor};opacity:{$overlayOpacity};mix-blend-mode:{$overlayType};'></div>"; } ?>
                        <h3 class="callout-postgrid-post-title"><?php echo $post->post_title; ?></h3>
                    </div>

                    <?php if (!$hideExcerpt) { ?>
                    <div class="callout-postgrid-post-excerpt">
                        <?php echo $post->post_excerpt; ?>
                    </div>
                    <?php } ?>

                    <div class="callout-postgrid-post-button">
                        <a href="<?php echo get_permalink($post->ID); ?>" class="btn btn-secondary btn-icon">More About <?php echo $post->post_title; ?> <i class="fa-solid fa-arrow-right postfix-icon"></i></a>
                    </div>

                </div>
            </div>

            <?php 
                $postcount++;
                if ($postLimit == $postcount) break;
            } ?>
        </div>
    </div>
</div>
<?php } ?>