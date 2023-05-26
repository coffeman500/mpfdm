<?php
/**
 * 
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'content-splitcarousel';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Default values
$content = get_field('content')     ?: "";
$slides = get_field('slides')       ?: Array();
?>

<div class="<?php echo $class_names; ?>">
    <div class="content-splitcarousel-inner">
        <div class="content-splitcarousel-row row">

            <div class="content-splitcarousel-content col-12 col-lg-5">
                <div class="content-splitcarousel-content-inner">
                    <?php echo $content; ?>
                </div>
            </div>
            <div class="content-splitcarousel-carousel col-12 col-lg-7">
                <div class="content-splitcarousel-carousel-inner">
                    
                    <div id="content-splitcarousel-carousel-container" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-indicators">
                            <?php foreach ($slides as $k => $slide) { ?>
                                <button type="button" data-bs-target="#content-splitcarousel-carousel-container" data-bs-slide-to="<?php echo $k; ?>"<?php if ($k === 0) { echo ' class="active" '; } ?> aria-current="true" aria-label="Slide <?php echo $k; ?>"></button>
                            <?php } ?>
                        </div>

                        <div class="carousel-inner">
                            <?php foreach ($slides as $k => $slide) { ?>
                                <?php if ($is_preview && $k >= 1) break; ?>

                                <div class="carousel-item<?php if ($k == 0) { echo " active"; } ?>">
                                    <img src="<?php echo $slide['slide']['url']; ?>" class="d-block w-100" alt="<?php echo $slide['slide']['alt']; ?>">
                                </div>
                            <?php } ?>
                        </div>

                        <div class="content-splitcarousel-nav content-splitcarousel-previous" data-bs-target="#content-splitcarousel-carousel-container" data-bs-slide="prev">
                            <div class="content-splitcarousel-nav-inner">
                                <i class="fa-solid fa-arrow-left"></i>
                            </div>
                        </div>
                        <div class="content-splitcarousel-nav content-splitcarousel-next" data-bs-target="#content-splitcarousel-carousel-container" data-bs-slide="next">
                            <div class="content-splitcarousel-nav-inner">
                                <i class="fa-solid fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>