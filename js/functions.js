/*jslint browser: true*/
/*global window, document */

/**
 * Make the header fixed when scrolling.
 * This doesn't work on IE older than 10... for now.
 */
(function () {
    "use strict";
    function scrollTop() {
        return document.body.scrollTop || document.documentElement.scrollTop;
    }
    var lastScrollTop = scrollTop();
    window.onscroll = function () {
        var newScrollTop = scrollTop(),
            header = document.getElementById("global-header"),
            page = document.getElementById("page"),
            nav = document.getElementById("site-navigation");
        if (newScrollTop >= 30) {
            header.classList.add('fixed-header');
            page.classList.add('sticky-top');
        } else {
			header.classList.remove('fixed-header');
			page.classList.remove('sticky-top');
        }
        // Make the header reappear if hidden on small screens
        if (newScrollTop < lastScrollTop) {
            header.classList.add('header-visible');
            page.classList.add('header-visible');
        } else {
            // Don't hide the header if the menu is open on small screens
            if (!nav.classList.contains('toggled')) {
                header.classList.remove('header-visible');
                page.classList.remove('header-visible');
            }
        }
        lastScrollTop = newScrollTop;
    };
}());