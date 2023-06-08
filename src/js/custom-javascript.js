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

/**
 * Closes the offcanvas nav when an item is selected that doesn't change page location
 * 
 */
var myOffcanvas = document.getElementById('navbarNavOffcanvas');
var bsOffcanvas = new window.BootstrapOffcanvas(myOffcanvas);
jQuery('.offcanvas-body a').on('click', function() {
    if ( jQuery(this).hasClass('dropdown-toggle') || !jQuery(this).parent().hasClass('current-menu-item') ) return;
    bsOffcanvas.hide();
});