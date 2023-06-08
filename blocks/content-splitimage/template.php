<?php
/**
 * Full width content section with a 50/50 split the content and image
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'content-splitimage';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Value defaults
$image = get_field('image')                         ?: Array( "url" => "https://placehold.co/992x750", "alt" => "Change me." );

$contentOrder = (get_field('flip_positions'))       ? "order-lg-2" : "order-lg-1";
$imageOrder = (get_field('flip_positions'))         ? "order-lg-1" : "order-lg-2";
$imagePositionX = get_field('image_postition_x')    ?: 'center';
$imagePositionY = get_field('image_postition_y')    ?: 'center';
?>

<div class="<?php echo $class_names; ?>">
    <div class="row g-0 content-splitimage-row">

        <div class="content-splitimage-content col-12 col-lg-6 <?php echo $contentOrder; ?>">
            <div class="content-splitimage-content-inner">
                <InnerBlocks/>
            </div>
        </div>

        <div class="content-splitimage-image col-12 col-lg-6 <?php echo $imageOrder; ?>" style="background-image:url('<?php echo $image['url']; ?>');background-position:<?php echo $imagePositionX; ?> <?php echo $imagePositionY; ?>"></div>

    </div>
</div>