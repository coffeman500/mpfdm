<?php
/**
 * Solid striped content with an image that overflows the container
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'content-overflowimage';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Field defaults
$image = get_field('image') ?: array('url' => 'https://placehold.co/992x750', 'alt' => 'Placeholder Image');

?>

<div class="<?php echo $class_names; ?>">
    <div class="row content-overflowimage-row">

        <div class="content-overflowimage-image col-12 col-lg-6">
            <div class="content-overflowimage-underlay overlay"></div>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>
        
        <div class="content-overflowimage-content col-12 col-lg-6">
            <div class="content-overflowimage-content-inner">
                <InnerBlocks/>
            </div>
        </div>

    </div>
</div>