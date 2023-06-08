<?php
/**
 * Hero banner slideshow, utilizes Bootstrap's Carousel functionality
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'banner-heroslider';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Default Values
$slides = get_field('slides')                       ?: [];
$interval = get_field('interval')                   ?: 5000;

$overlayColor = get_field('overlay_color')          ?: false;
$overlayOpacity = get_field('overlay_opacity')      ?: 1;
$overlayType = get_field('overlay_type')            ?: 'normal';

?>

<style>
<?php foreach ($slides as $k => $slide) { ?>

    .sID-<?php echo $slide['image']['title']; ?> {
        background-image: url('<?php echo $slide['image']['sizes']['large']; ?>');
    } 
    @media all and (min-width: 992px) {
        .sID-<?php echo $slide['image']['title']; ?> {
            background-image: url('<?php echo $slide['image']['url']; ?>');
        } 
    }

<?php } ?>
</style>

<div class="<?php echo $class_names; ?><?php if ($is_preview) { echo " banner-heroslider-preview"; } ?>" <?php if ($is_preview) { echo "style='background-image:url(" . $slides[0]['image']['url'] . ");'"; } ?>>
    <div id="heroSlider" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="<?php echo $interval; ?>">
        <?php if (!$is_preview) { ?> 
        <div class="carousel-indicators">
            <?php foreach ($slides as $k => $slide) { ?>
                <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="<?php echo $k; ?>" <?php if ($k == 0) { echo 'class="active" aria-current="true"'; } ?> aria-label="Slide <?php echo $k; ?>"></button>
            <?php } ?>
        </div>
        <?php } ?>

        <div class="carousel-inner">
            <?php if ($overlayColor) { echo "<div class='overlay' style='background:{$overlayColor};opacity:{$overlayOpacity};mix-blend-mode:{$overlayType};'></div>"; } ?>

            <?php foreach ($slides as $k => $slide) { ?>
                <div class="carousel-item sID-<?php echo $slide['image']['title']; ?><?php if ($k == 0) { echo ' active'; } ?>"></div>
            <?php } ?>

            <div class="carousel-content container">
                <InnerBlocks/>
            </div>
        </div>
    </div>
</div>