import './scrollspy-sidebar.js';
import './cookie-handler.js';
import './phone-link-handler.js';

/**
 * Applies a class to the header on page scroll
 * Used by sticky-nav
 * 
 */
jQuery(window).scroll(function() {
    if (window.scrollY >= 100) {
        jQuery('#wrapper-navbar').addClass('header-scrolled');
    } else {
        jQuery('#wrapper-navbar').removeClass('header-scrolled');
    }
});