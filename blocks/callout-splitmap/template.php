<?php
/**
 * Section that shows a map embed, split with content
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'callout-splitmap';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Default values
$mapEmbed = get_field('map') ?: "";

?>

<div class="<?php echo $class_names; ?>">
    <div class="row g-0 callout-splitmap-row">

        <div class="callout-splitmap-map col-12 col-lg-6 col-xl-7">
            <?php echo $mapEmbed; ?>
        </div>

        <div class="callout-splitmap-content col-12 col-lg-6 col-xl-5">
            <div class="callout-splitmap-content-inner">
                <InnerBlocks />
            </div>  
        </div>

    </div>
</div>