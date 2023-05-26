/**
 * Custom scripts for scrollspy-sidebar functionality
 * 
 */

if (jQuery('#scrollspy-sidebar').length > 0) initializeScrollspyHeaders();

/**
 * Loops through all H3s in the content and applies anchors to them
 * as well as generating the scrollspy headers and inserting them into the dom
 */
function initializeScrollspyHeaders() 
{
    jQuery('body').attr({
        'data-bs-spy': 'scroll',
        'data-bs-target': '#scrollspy-sidebar-headers',
        'data-bs-offset': '200',
        'tabindex': '0',
    });

    jQuery('h3', '.scrollspy-content').each(function(index) {
        let title = jQuery(this).html();

        jQuery(this).attr('id', `title${index}`);

        jQuery('#scrollspy-sidebar-headers').append(
            jQuery('<a>')
                .addClass('list-group-item list-group-item-action')
                .attr({
                    'href': '#' + `title${index}`
                })
                .html(title)
        );
    });

}

/**
 * Overrides default bootstrap scrolling for anchor links because the default doesn't work properly
 * 
 */
jQuery('#scrollspy-sidebar-headers').on('click', 'a', function(e) {
    e.preventDefault();
    jQuery([document.documentElement, document.body]).animate({
        scrollTop: jQuery(jQuery(this).attr('href')).offset().top - 150
    }, 500);
});