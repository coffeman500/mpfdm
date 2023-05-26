<?php
/**
 * Initializes themes widgets
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function mpfdm_widgets_init() {

    // Unregister parent sidebars we're not going to use
    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('footerfull');

    // Register footer sidebars
    register_sidebar(
        array(
            'name'          => 'Footer 1',
            'id'            => 'footer1',
            'description'   => 'Footer column widget',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Footer 2',
            'id'            => 'footer2',
            'description'   => 'Footer column widget',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Footer 3',
            'id'            => 'footer3',
            'description'   => 'Footer column widget',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Footer 4',
            'id'            => 'footer4',
            'description'   => 'Footer column widget',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}
add_action( 'widgets_init', 'mpfdm_widgets_init', 11 );