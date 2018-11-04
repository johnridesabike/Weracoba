/* makes the header fixed when scrolling */
jQuery(window).scroll(function() {
    var topHead = jQuery(window).scrollTop();
    if (topHead >= 30) {
        jQuery(".global-header").addClass("fixed-header");
        jQuery(".site").addClass("sticky-top");
    } else {
        jQuery(".global-header").removeClass("fixed-header");
        jQuery(".site").removeClass("sticky-top");
    }
});