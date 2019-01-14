<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Weracoba
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function weracoba_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'type'				=> 'click',
		'footer-widgets'	=> array( 'footer-1', 'sidebar-1' ),
		'container' 		=> 'main',
		'render'    		=> 'weracoba_infinite_scroll_render',
		'footer'    		=> 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'weracoba-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'after_setup_theme', 'weracoba_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 * https://jetpack.com/support/infinite-scroll/
 */
function weracoba_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		$format = get_post_format() ? : 'excerpt';
		get_template_part( 'template-parts/content', $format );
	}
}
