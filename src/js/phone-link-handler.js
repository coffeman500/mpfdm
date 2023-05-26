/**
 * Desktop copy functionality for phone numbers
 * 
 */
jQuery('a[href^="tel:"]').each(function() {
    jQuery(this).addClass('phone-link');
    jQuery(this).html('<span class="phone-link-content">' + jQuery(this).html() + '</span>');
    jQuery('<span>').addClass('phone-link-copied').html('Copied!').appendTo(jQuery(this));
});

jQuery('.phone-link').click(function(e) {
    if (window.innerWidth >= 992) {
        e.preventDefault();
        jQuery(this).addClass('phone-link-clicked');

        let phoneNumber = jQuery(this).attr('href').substring(4);
        console.log('test');
        try {
            navigator.clipboard.writeText(phoneNumber);
        } catch (e) {
            console.log(e);
        }

        setTimeout(() => {
            jQuery(this).removeClass('phone-link-clicked');
        }, 2000);
    }
});