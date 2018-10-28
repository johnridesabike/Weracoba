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

/**
 * Determines if post thumbnail can be displayed.
 * Copied from Twenty Nineteen
 * @link https://github.com/WordPress/twentynineteen/blob/master/inc/template-functions.php#L124
 */
function weracoba_can_show_post_thumbnail() {
	return apply_filters( 'weracoba_can_show_post_thumbnail', 
                         ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Filters the default archive titles.
 */
function weracoba_get_the_archive_title($title) {
    $asploded = explode(":", $title);
    if ( count($asploded) > 1 ) {
        return $asploded[1];
    } else {
        return $title;
    }
}
add_filter( 'get_the_archive_title', 'weracoba_get_the_archive_title' );