<?php
/**
 * Displays a full height banner image behind a section for content
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'banner-fullheight';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Get fields and set defaults
$content = get_field('content')                     ?: "<h1>Lorem Ipsum</h1><h3>Lorem Ipsum</h3>";

$desktopBackground = get_field('image_desktop')     ?: Array( "url" => "https://placehold.co/1920x960", "alt" => "Change me." );
$mobileBackground = get_field('image_mobile')       ?: Array( "url" => "https://placehold.co/992x800", "alt" => "Change me." );

$button1 = get_field('button_1')                    ?: false;
$button2 = get_field('button_2')                    ?: false;

$overlayColor = get_field('overlay_color')          ?: false;
$overlayOpacity = get_field('overlay_opacity')      ?: 1;
$overlayType = get_field('overlay_type')            ?: 'normal';
?>

<style>
    .banner-fullheight {
        background-image: url('<?php echo $mobileBackground['url']; ?>');
    }
    @media all and (min-width: 992px) {
        .banner-fullheight {
            background-image: url('<?php echo $desktopBackground['url']; ?>');
        }
    }
</style>

<div class="<?php echo $class_names; ?>">
    <?php if ($overlayColor) { echo "<div class='overlay' style='background:{$overlayColor};opacity:{$overlayOpacity};mix-blend-mode:{$overlayType};'></div>"; } ?>
    <div class="banner-fullheight-wrapper container">

        <div class="banner-fullheight-content">
            <InnerBlocks/>

            <?php if ($button1 || $button2) { ?>
            <div class="banner-fullheight-content-buttons">
                <?php if ($button1) { ?>
                    <?php echo mpfdm_get_acf_button($button1); ?>
                <?php } ?>
                <?php if ($button2) { ?>
                    <?php echo mpfdm_get_acf_button($button2, 'btn btn-outline-light'); ?>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

    </div>
</div>