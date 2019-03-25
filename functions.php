<?php
/**
 * Weracoba functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Weracoba
 */

if ( ! function_exists( 'weracoba_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function weracoba_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'weracoba', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 800, true );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'weracoba' ),
				'menu-2' => esc_html__( 'Social', 'weracoba' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'weracoba_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		* Add support for Gutenberg wide blocks.
		*
		* @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#opt-in-features
		*/
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		/**
		* Add support for post formats.
		*
		* @link https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array( 'aside' ) );

		/**
		 * Gutenberg fonts. See _variables.scss
		 *
		 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#block-font-sizes
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => __( 'X-Small', 'weracoba' ),
					'size' => 16,
					'slug' => 'xsmall',
				),
				array(
					'name' => __( 'Small', 'weracoba' ),
					'size' => 17.78,
					'slug' => 'small',
				),
				array(
					'name' => __( 'Normal', 'weracoba' ),
					'size' => 20,
					'slug' => 'normal',
				),
				array(
					'name' => __( 'Large', 'weracoba' ),
					'size' => 25,
					'slug' => 'large',
				),
				array(
					'name' => __( 'X-Large', 'weracoba' ),
					'size' => 30,
					'slug' => 'xlarge',
				),
				array(
					'name' => __( 'XX-Large', 'weracoba' ),
					'size' => 35,
					'slug' => 'xxlarge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'weracoba' ),
					'slug'  => 'primary',
					// 185 = $weracoba_default_hue in /custom-colors/custom-colors.php.
					// 95 = default saturation  in /custom-colors/color-patterns.php.
					// 25 = default lightness  in /custom-colors/color-patterns.php.
					'color' => weracoba_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 185 : get_theme_mod( 'primary_color_hue', 185 ), 95, 25 ),
				),
				array(
					'name'  => __( 'Primary Light', 'weracoba' ),
					'slug'  => 'primary-light',
					// 40 = default hover lightness  in /custom-colors/color-patterns.php.
					'color' => weracoba_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 185 : get_theme_mod( 'primary_color_hue', 185 ), 95, 40 ),
				),
				array(
					'name'  => __( 'Complementary', 'weracoba' ),
					'slug'  => 'complementary',
					'color' => weracoba_hsl_hex(
						weracoba_complementary_hue( 'default' === get_theme_mod( 'primary_color' ) ? 185 : get_theme_mod( 'primary_color_hue', 185 ) ),
						95,
						25
					),
				),
				array(
					'name'  => __( 'Complementary Light', 'weracoba' ),
					'slug'  => 'complementary-light',
					'color' => weracoba_hsl_hex(
						weracoba_complementary_hue( 'default' === get_theme_mod( 'primary_color' ) ? 185 : get_theme_mod( 'primary_color_hue', 185 ) ),
						95,
						40
					),
				),
				array(
					'name'  => __( 'Dark Gray', 'weracoba' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'weracoba' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'weracoba' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		/**
		 * We're not using theme styles.
		 */
		/* add_theme_support( 'wp-block-styles' ); */
	}
endif;
add_action( 'after_setup_theme', 'weracoba_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function weracoba_content_width() {
	// _variables.scss: $size-max-width
	// Jetpack's CDN will resize images based on this setting.
	// Gallery thumbnails will be sized based on this setting.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'weracoba_content_width', 1200 );
}
add_action( 'after_setup_theme', 'weracoba_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function weracoba_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer / Sidebar', 'weracoba' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__(
				'This will display above the footer, or on the sidebar of the archives page.',
				'weracoba'
			),
			'before_widget' => '<section id="%1$s" class="widget widget__main %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Colophon', 'weracoba' ),
			'id'            => 'footer-1',
			'description'   => esc_html__(
				'Widgets here will be shown at the very bottom of all pages.',
				'weracoba'
			),
			'class'         => '',
			'before_widget' => '<section id="%1$s" class="widget widget__footer %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Breadcrumbs', 'weracoba' ),
			'id'            => 'breadcrumbs-1',
			'description'   => esc_html__(
				'This is only for adding a widget with breadcrumb navigation (via a plugin).',
				'weracoba'
			),
			'class'         => '',
			'before_widget' => '<nav id="%1$s" class="widget widget__breadcrumbs has-ui-font %2$s">',
			'after_widget'  => '</nav>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'weracoba_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function weracoba_scripts() {
	wp_enqueue_style( 'weracoba-style', get_stylesheet_uri(), array(), '20190317', 'all' );
	wp_enqueue_style( 'weracoba-print-style', get_template_directory_uri() . '/style-print.css', array( 'weracoba-style' ), '20190217', 'print' );

	/* phpcs:ignore
	wp_enqueue_script( 'weracoba-functions', get_template_directory_uri() . '/js/functions.js', array(), '20181105', true );
	*/

	wp_enqueue_script( 'weracoba-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'weracoba-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'weracoba_scripts' );

/**
 * Implement the Custom Header feature.
 */
/** Not using this right now.
require get_template_directory() . '/inc/custom-header.php';
*/

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-weracoba-svg-icons.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom color additions.
 */

require get_template_directory() . '/custom-colors/custom-colors.php';
