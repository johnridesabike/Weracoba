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

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @param   array $args Arguments for tag cloud widget.
 * @return  array The filtered arguments for tag cloud widget.
 */
function weracoba_widget_tag_cloud_args( $args ) {
	$args['largest']   = 1.4;
	$args['smallest']  = 0.9;
	$args['unit']      = 'em';
	$args['format']    = 'flat';
	$args['separator'] = ', ';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'weracoba_widget_tag_cloud_args' );

/**
 * Customize comments
 *
 * @param array $fields the default fields.
 */
function weracoba_comment_form_default_fields( $fields ) {
	// Replace the * in each field with plain language instead.
	foreach ( $fields as &$field ) {
		$field = str_replace(
			'<span class="required">*</span>',
			'<span class="required">' . esc_html__( '(required)', 'weracoba' ) . '</span>',
			$field
		);
	}
	// Add some SVGs.
	$fields['author'] = str_replace(
		'<p class="comment-form-author"><label for="author">',
		'<p class="comment-form-author"><label for="author">' . weracoba_get_icon_svg( 'person' ) . ' ',
		$fields['author']
	);
	$fields['email']  = str_replace(
		'<p class="comment-form-email"><label for="email">',
		'<p class="comment-form-email"><label for="email">' . weracoba_get_social_icon_svg( 'mail' ) . ' ',
		$fields['email']
	);
	$fields['url']    = str_replace(
		'<p class="comment-form-url"><label for="url">',
		'<p class="comment-form-url"><label for="url">' . weracoba_get_icon_svg( 'link' ) . ' ',
		$fields['url']
	);
	return $fields;
}
add_filter( 'comment_form_default_fields', 'weracoba_comment_form_default_fields' );

/**
 * Remove the "*" warning at the top.
 *
 * @param array $fields the default fields.
 */
function weracoba_comment_form_defaults( $fields ) {
	$fields['comment_notes_before'] = '<p class="comment-notes"><span id="email-notes">' . __( 'Your email address will not be published.', 'weracoba' ) . '</span></p>';
	return $fields;
}
add_filter( 'comment_form_defaults', 'weracoba_comment_form_defaults' );

/**
 * Change the [...] to something better
 *
 * @param string $more_string The default string for more.
 */
function weracoba_excerpt_more( $more_string ) {
	/* return '... <a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="excerpt-more">' . __( 'read more', 'weracoba' ) . '</a>'; */
	return '&hellip;';
}
add_filter( 'excerpt_more', 'weracoba_excerpt_more' );
