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

/**
 * Filters the default archive titles.
 *
 * @param string $title the archive title.
 */
function weracoba_get_the_archive_title( $title ) {
	$asploded = explode( ':', $title );
	if ( count( $asploded ) > 1 ) {
		return $asploded[1]; // Removes the "Category: " or "Tag: " from the title.
	} elseif ( is_search() ) {
		/* translators: %s: search phrase */
		return sprintf( __( 'Search Results for &#8220;%s&#8221;', 'weracoba' ), get_search_query() );
	} elseif ( is_404() ) {
		return __( 'Oops! That page can&rsquo;t be found.', 'weracoba' );
	} else {
		return $title;
	}
}
add_filter( 'get_the_archive_title', 'weracoba_get_the_archive_title' );
