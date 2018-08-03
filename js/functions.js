/* Makes all of our centered image bleed off the page. */
(function($) {
    $('figure.wp-caption.aligncenter').removeAttr("style");
    $('figure.wp-caption.aligncenter').addClass("centered-image");
    $('img.aligncenter').wrap('<figure class="centered-image" />');
    //$('.post-thumbnail').wrap('<figure class="centered-image" />');
})(jQuery);
