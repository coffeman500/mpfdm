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
$content = get_field('content')                 ?: "";
$button = get_field('button')                   ?: false;
$image = get_field('image')                     ?: Array( "url" => "https://placehold.co/992x750", "alt" => "Change me." );

$contentOrder = (get_field('flip_positions'))   ? "order-lg-2" : "order-lg-1";
$imageOrder = (get_field('flip_positions'))     ? "order-lg-1" : "order-lg-2";
?>

<div class="<?php echo $class_names; ?>">
    <div class="row g-0 content-splitimage-row">

        <div class="content-splitimage-content col-12 col-lg-6 <?php echo $contentOrder; ?>">
            <div class="content-splitimage-content-inner">
                <?php echo $content; ?>

                <?php if ($button) { ?>
                <div class="content-splitimage-content-button">
                    <?php echo mpfdm_get_acf_button($button, 'btn btn-primary btn-icon', '<i class="fa-solid fa-arrow-right postfix-icon"></i>'); ?>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="content-splitimage-image col-12 col-lg-6 <?php echo $imageOrder; ?>" style="background-image:url('<?php echo $image['url']; ?>');"></div>

    </div>
</div>