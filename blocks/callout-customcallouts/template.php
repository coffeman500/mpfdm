<?php
/**
 * Full width content section with a 50/50 split the content and image
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'callout-customcallouts';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}

// Defaults
$title = get_field('title') ?: "";
$grid_classes = get_field('grid_classes') ?: "";
$callouts = get_field('callouts') ?: [];

?>

<div class="<?php echo $class_names; ?>">
    <div class="callout-customcallouts-inner">

        <h2 class="callout-customcallouts-title"><?php echo $title; ?></h2>

        <div class="row gy-4 callout-customcallouts-row">
            <?php foreach ($callouts as $callout) { ?>
            <div class="callout-customcallouts-callout <?php echo $grid_classes; ?>">
                <div class="callout-customcallouts-callout-inner">

                    <?php if ($callout['image']) { ?>
                    <div class="callout-customcallouts-callout-image">
                        <img src="<?php echo $callout['image']['url']; ?>" alt="<?php echo $callout['image']['alt']; ?>" />
                    </div>
                    <?php } ?>

                    <?php if ($callout['content']) { ?>
                    <div class="callout-customcallouts-callout-content">
                        <?php echo $callout['content']; ?>
                    </div>
                    <?php } ?>

                    <?php if ($callout['button']) { ?>
                    <div class="callout-customcallouts-callout-button">
                        <?php echo mpfdm_get_acf_button($callout['button'], $callout['button_classes']); ?>
                    </div>
                    <?php } ?>

                </div>
            </div>
            <?php } ?>
        </div>

    </div>
</div>