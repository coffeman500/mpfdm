<?php
/**
 * Full-Width group of buttons
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'content-buttongroup';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Get fields and set defaults
$buttons = get_field('buttons')     ?: [];
$style = get_field('style')         ?: 'light';
?>

<div class="<?php echo $class_names; ?> <?php echo $class_names . '-' . $style; ?>">
    
    <div class="row g-0 content-buttongroup-buttons">
        <?php foreach ($buttons as $button) { ?>
        <a href="<?php echo $button['button']['url']; ?>" class="content-buttongroup-button<?php echo ($button['highlight'] ? ' highlight-button' : ''); ?> col-12 col-md-6 col-lg flex-grow-1 btn btn-outline-<?php echo $style; ?>" target="<?php echo $button['button']['target']; ?>">
            <?php echo $button['button']['title']; ?>
        </a>
        <?php } ?>
    </div>

</div>