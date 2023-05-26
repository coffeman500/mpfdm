<?php
/**
 * WP Reviews Pro review slider section
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'content-wpreviewsslider';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Default values
$title = get_field('title');
$sliderShortcode = get_field('slider_shortcode');
$badgeShortcode = get_field('badge_shortcode');

?>

<div class="<?php echo $class_names; ?>">
	<div class="content-wpreviewsslider-inner">

		<div class="content-wpreviewsslider-header align-items-end row gy-3">

			<?php if ($title) { ?>
			<div class="content-wpreviewsslider-header-title col-auto">
				<h2><?php echo $title; ?></h2>
			</div>
			<?php } ?>

			<?php if ($badgeShortcode) { ?>
			<div class="content-wpreviewsslider-header-badge d-none d-lg-block col-auto">
				<?php echo do_shortcode($badgeShortcode); ?>
			</div>
			<?php } ?>
			
		</div>

		<div class="content-wpreviewsslider-slider">

			<?php if ($sliderShortcode) {
				echo do_shortcode($sliderShortcode);
			} ?>

		</div>

	</div>
</div>