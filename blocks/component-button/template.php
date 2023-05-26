<?php
/**
 * Button component
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'component-button';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Build defaults
$button = get_field('button');
$type = get_field('type');
$style = get_field('style');
$icon = (get_field('icon')) ? "btn-icon" : "";
$buttonClasses = "btn {$type}{$style} {$icon}";

$iconPrefix = (get_field('icon_prefix'))    ? "" : "postfix-icon";
$icon = (get_field('icon_custom'))          ? get_field('icon_custom') : "fa-solid fa-arrow-right";
$iconHtml = (get_field('icon'))             ? "<i class='{$icon} {$iconPrefix}'></i>" : "";

if (get_field('icon'))

?>

<div class="<?php echo $class_names; ?>">
    <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="<?php echo $buttonClasses; ?>">
        <?php if (get_field('icon') && get_field('icon_prefix')) echo $iconHtml; ?>
        <?php echo htmlspecialchars_decode($button['title']); ?>
        <?php if (get_field('icon') && !get_field('icon_prefix')) echo $iconHtml; ?>
    </a>
</div>