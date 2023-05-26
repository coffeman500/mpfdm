<?php
/**
 * Displays team members in a grid fashion
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Block main classes
$class_names = 'callout-teamgrid';
if ( ! empty( $block['className'] ) ) {
    $class_names .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_names .= ' align' . $block['align'];
}

// Default values
$displayTitles = get_field('display_titles')                ?: false;
$hideLinks = get_field('disable_staff_pages', 'options')     ?: false;
$roles = get_field('team_role')                             ?: array();
$gridClasses = get_field('grid_classes')                    ?: 'col-12 col-md-6 col-lg-4';

$members = get_posts(Array(
    'numberposts' => -1,
    'post_type' => 'team',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'tax_query' => array(
        array(
            'taxonomy' => 'team_role',
            'terms' => $roles,
            'field' => 'term_id',
        )
    ),
));

?>

<div class="<?php echo $class_names; ?>">
    <div class="callout-teamgrid-inner">
        <div class="row justify-content-center gy-5 gx-lg-6 callout-teamgrid-row">

            <?php foreach ($members as $member) { 
                $memberPhoto = get_the_post_thumbnail_url($member->ID, 'large') ?: "https://placehold.co/500x500?text={$member->post_title}"
                ?>

            <div class="callout-teamgrid-member <?php echo $gridClasses; ?>">
                <div class="callout-teamgrid-member-inner">

                    <div class="callout-teamgrid-member-image">
                        <img src="<?php echo $memberPhoto; ?>" alt="<?php echo $member->post_title; ?>" />
                    </div>
                    <div class="callout-teamgrid-member-content">
                        <h3 class="callout-teamgrid-member-name"><?php echo $member->post_title; ?></h3>

                        <?php if ($displayTitles && $title = get_post_meta($member->ID, 'mpfdm_team_member_title', true)) { ?>
                            <h4 class="callout-teamgrid-member-title"><?php echo $title; ?></h4>
                        <?php } ?>
                    </div>

                </div>

                <?php if (!$hideLinks) { ?>
                    <a class="stretched-link" href="<?php echo get_permalink($member->ID); ?>"></a>
                <?php } ?>
            </div>
            <?php } ?>

        </div>
    </div>
</div>