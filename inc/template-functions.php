<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Weracoba
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function weracoba_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
		$classes[] = 'archive-view';
	}

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( is_page() ) {
		$classes[] = 'no-sidebar';
    } elseif ( is_active_sidebar( 'sidebar-1' ) && ! is_singular() ) {
		$classes[] = 'has-sidebar';
    } elseif ( is_active_sidebar( 'sidebar-2' ) && is_singular() ) {
        $classes[] = 'has-sidebar';
	} else {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'weracoba_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function weracoba_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'weracoba_pingback_header' );
