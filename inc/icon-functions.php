<?php
/**
 * SVG icons related functions.
 * 
 * Almost all of this was copied from TwentyNinetween.
 *
 * @package Weracoba
 * @since 0.1
 */

/**
 * Gets the SVG code for a given icon.
 *
 * @param string $icon The icon name.
 * @param int    $size The icon size in pixels.
 */
function weracoba_get_icon_svg( $icon, $size = 24 ) {
	return Weracoba_SVG_Icons::get_svg( 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given social icon.
 *
 * @param string $icon The icon name.
 * @param int    $size The icon size in pixels.
 */
function weracoba_get_social_icon_svg( $icon, $size = 24 ) {
	return Weracoba_SVG_Icons::get_svg( 'social', $icon, $size );
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 *
 * @param string $uri  The social link uri.
 * @param int    $size The icon size in pixels.
 */
function weracoba_get_social_link_svg( $uri, $size = 24 ) {
	return Weracoba_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $title       Menu item title.
 * @param  WP_Post $item        Menu item object.
 * @param  array   $args        wp_nav_menu() arguments.
 * @param  int     $depth       Depth of the menu.
 * @return string  $item_output The menu item output with social icon.
 */
function weracoba_nav_menu_social_icons( $title, $item, $args, $depth ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social-menu' === $args->menu->slug ) {
		$svg = weracoba_get_social_link_svg( $item->url, 16 );
		if ( empty( $svg ) ) {
			$svg = weracoba_get_icon_svg( 'link', 16 );
		}
		$title = $svg . ' ' . $title;
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'weracoba_nav_menu_social_icons', 10, 4 );
