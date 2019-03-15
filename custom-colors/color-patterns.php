<?php
/**
 * Color Patterns
 * This code based on WordPress' Weracoba theme.
 *
 * @package weracoba
 */

/**
 * Generate the CSS for the current primary color.
 */
function weracoba_custom_colors_css() {

	$primary_color = $weracoba_default_hue;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = absint( get_theme_mod( 'primary_color_hue', $weracoba_default_hue ) );
	}

	/**
	 * Filter Weracoba default saturation level.
	 *
	 * @param int $saturation Color saturation level.
	 */
	$saturation = apply_filters( 'weracoba_custom_colors_saturation', 95 );
	$saturation = absint( $saturation ) . '%';

	/**
	 * Filter Weracoba default selection saturation level.
	 *
	 * @param int $saturation_selection Selection color saturation level.
	 */
	$saturation_selection = absint( apply_filters( 'weracoba_custom_colors_saturation_selection', 50 ) );
	$saturation_selection = $saturation_selection . '%';

	/**
	 * Filter Weracoba default lightness level.
	 *
	 * @param int $lightness Color lightness level.
	 */
	$lightness = apply_filters( 'weracoba_custom_colors_lightness', 25 );
	$lightness = absint( $lightness ) . '%';

	/**
	 * Filter Weracoba default hover lightness level.
	 *
	 * @param int $lightness_hover Hover color lightness level.
	 */
	$lightness_hover = apply_filters( 'weracoba_custom_colors_lightness_hover', 40 );
	$lightness_hover = absint( $lightness_hover ) . '%';

	/**
	 * Filter Weracoba default selection lightness level.
	 *
	 * @param int $lightness_selection Selection color lightness level.
	 */
	$lightness_selection = apply_filters( 'weracoba_custom_colors_lightness_selection', 90 );
	$lightness_selection = absint( $lightness_selection ) . '%';

	$theme_css = '
		/*
		 * Set the text color for:
		 * 1: Elements
		 * 2: Typography
		 * 3: Menus
		 * 4: Widgets
		 * 5: Blocks
		 */
		/* 1 */
		a,
		a:visited,
		/* 2 */
		.has-link-color,
		/* 3 */
		.menu-toggle,
		/* 4 */
		a[rel="tag"]:hover,
		a[rel="tag"]:focus,
		a[rel="tag"]:active,
		a.tag-cloud-link:hover,
		a.tag-cloud-link:focus,
		a.tag-cloud-link:active,
		/* 5 */
		.is-style-outline {
			color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' ); 
		}

		/*
		 * Set the background color for:
		 * 1. Elements
		 * 2. Post and pages
		 * 3. Blocks
		 * 4. Plugins
		 */
		/* 1 */
		hr,
		.button-link__link,
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		/* 2 */
		.tab-head,
		/* 3 */
		.wp-block-button__link,
		.wp-block-file .wp-block-file__button,
		/* 4 */
		#infinite-handle#infinite-handle span button:active,
		#infinite-handle#infinite-handle span button:focus,
		#infinite-handle#infinite-handle span button:hover {
			background-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' ); 
		}

		/*
		 * Set the hover text color for:
		 * 1: Elements
		 * 2: Menus
		 * 3: Posts and pages
		 * 4: Blocks
		 */
		/* 1 */
		a:hover,
		a:focus,
		a:active,
		/* 2 */
		.main-navigation:hover > a,
		.main-navigation.focus > a, 
		.main-navigation .menu-item:focus > a,
		.main-navigation .menu-item.focus > a,
		.main-navigation .menu :hover > a,
		.main-navigation .menu .hover > a,
		.main-navigation .menu a:hover,
		.main-navigation .menu a.hover,
		/* 3 */
		.entry-title__link:active,
		.entry-title__link:focus,
		.entry-title__link:hover,
		.aside-permalink:active,
		.aside-permalink:focus,
		.aside-permalink:hover,
		/* 4 */
		.is-style-outline .wp-block-button__link:hover,
		.is-style-outline .wp-block-button__link:focus,
		.is-style-outline .wp-block-button__link:active {
			color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness_hover . ' );
		}

		/*
		 * Set the hover background color for:
		 * 1: Elements
		 * 2: Posts and pages
		 * 3: Blocks
		 * 4: Plugins
		 */
		/* 1 */
		.button-link__link:hover,
		.button-link__link:active,
		.button-link__link:focus,
		button:hover,
		button:active,
		button:focus,
		input[type="button"]:hover,
		input[type="button"]:active,
		input[type="button"]:focus,
		input[type="reset"]:hover,
		input[type="reset"]:active,
		input[type="reset"]:focus,
		input[type="submit"]:hover,
		input[type="submit"]:active,
		input[type="submit"]:focus,
		/* 2 */
		.tab-head [rel~="tag"]:active,
		.tab-head [rel~="tag"]:focus,
		.tab-head [rel~="tag"]:hover,
		.tab-head [rel~="category"]:active,
		.tab-head [rel~="category"]:focus,
		.tab-head [rel~="category"]:hover,
		.excerpt-entry .featured-image__link:hover::before,
		.excerpt-entry .featured-image__link:focus::before,
		.excerpt-entry .featured-image__link:active::before,
		/* 3 */
		.wp-block-button__link:hover,
		.wp-block-button__link:active,
		.wp-block-button__link:focus,
		.wp-block-file .wp-block-file__button:hover,
		.wp-block-file .wp-block-file__button:active,
		.wp-block-file .wp-block-file__button:focus {
			background-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness_hover . ' );
		}

		/*
		 * Set the border color for:
		 * 1: Elements
		 * 2: Menus
		 */
		/* 1 */
		* {
			border-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' ); 
		}
		/* 2 */
		.post-page-numbers.current,
		.page-numbers.current,
		.current_page_item > a,
		.current-menu-item > a,
		.current_page_ancestor > a,
		.current-menu-ancestor > a {
			border-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness_hover . ' );
		}
	';

	$editor_css = '
		/*
		 * Set colors for:
		 * - links
		 * - blockquote
		 * - pullquote (solid color)
		 * - buttons
		 */
		.editor-block-list__layout .editor-block-list__block a,
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:hover .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:focus .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:active .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__textlink {
			color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' ); /* base: #0073a8; */
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-quote:not(.is-large):not(.is-style-large),
		.editor-styles-wrapper .editor-block-list__layout .wp-block-freeform blockquote {
			border-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' ); /* base: #0073a8; */
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-pullquote.is-style-solid-color:not(.has-background-color) {
			background-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' ); /* base: #0073a8; */
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__button,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:focus,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover {
			background-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' ); /* base: #0073a8; */
		}

		/* Hover colors */
		.editor-block-list__layout .editor-block-list__block a:hover,
		.editor-block-list__layout .editor-block-list__block a:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__textlink:hover {
			color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness_hover . ' ); /* base: #005177; */
		}

		/* Do not overwrite solid color pullquote or cover links */
		.editor-block-list__layout .editor-block-list__block .wp-block-pullquote.is-style-solid-color a,
		.editor-block-list__layout .editor-block-list__block .wp-block-cover a {
			color: inherit;
		}
		';

	if ( function_exists( 'register_block_type' ) && is_admin() ) {
		$theme_css = $editor_css;
	}

	/**
	 * Filters Weracoba custom colors CSS.
	 *
	 * @param string $css           Base theme colors CSS.
	 * @param int    $primary_color The user's selected color hue.
	 * @param string $saturation    Filtered theme color saturation level.
	 */
	return apply_filters( 'weracoba_custom_colors_css', $theme_css, $primary_color, $saturation );
}
