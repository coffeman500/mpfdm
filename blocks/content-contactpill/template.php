<?php
/**
 * Contact form and content in container on background with rounded corners
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'content-contactpill';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}

// Defaults
$content = get_field('content');
$contactFormShortcode = get_field('shortcode')  ?: false;
?>

<div class="<?php echo $class_names; ?>">
    <div class="content-contactpill-inner">
        <div class="content-contactpill-inner-wrapper">
            <div class="content-contactpill-row gx-xl-5 row">

                <div class="content-contactpill-content col-12 col-lg-6 col-xl-5">
                    <?php echo $content; ?>
                </div>
                <div class="content-contactpill-form col-12 col-lg-6 col-xl-7">
                    <div class="content-contactpill-form-inner">
                        <?php if ($contactFormShortcode) { 
                            echo do_shortcode($contactFormShortcode);
                        } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>