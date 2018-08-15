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
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function weracoba_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Weracoba, use a find and replace
		 * to change 'weracoba' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'weracoba', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        add_image_size( 'weracoba-index-image', 500, 220, true );
        add_image_size( 'weracoba-fp-thumb', 480, 270, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'weracoba' ),
            'menu-2' => esc_html__( 'Social', 'weracoba' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		/*add_theme_support( 'custom-background', apply_filters( 'weracoba_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
        */
		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        /**
        * Add support for Gutenberg wide blocks.
        *
        * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#opt-in-features
        */
        add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'weracoba_setup' );

/**
 * Exclude a category from all WordPress loops
 *
 * @link https://github.com/taniarascia/wp-functions#exclude-a-category-from-wordpress-loops
 */

function weracoba_exclude_posts( $query ) {
    global $wp_query;

    // Hard coded category ID, but can be dynamic: esc_attr(get_option('your-cat-id'));
    $excluded_cat_id = 25;

    // add category ID to existing, avoid overwritting it
    $cat[] = $query->get( 'cat' );
    $cat[] = "-" . $excluded_cat_id;

    $query->set( 'cat', $cat );
}
//add_action( 'pre_get_posts', 'weracoba_exclude_posts' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function weracoba_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'weracoba_content_width', 640 );
}
add_action( 'after_setup_theme', 'weracoba_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function weracoba_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'weracoba' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'A sidebar to be displayed alongside the blog posts.', 'weracoba' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Post Sidebar', 'weracoba' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'A minimal sidebar that appears alongside posts.', 'weracoba' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'weracoba' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Widgets here will be shown on all pages.', 'weracoba' ),
        'class'         => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'weracoba_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function weracoba_scripts() {
	wp_enqueue_style( 'weracoba-style', get_stylesheet_uri() );

    wp_enqueue_style( 'google-fonts', "https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700,700i|Lato");

	wp_enqueue_script( 'weracoba-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20180711', true );

	wp_enqueue_script( 'weracoba-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'weracoba-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'weracoba_scripts' );

/**
 * Registers an editor stylesheet for the theme.
 */
function weracoba_editor_styles() {
    wp_enqueue_style( 'mytheme-block-editor-styles', get_theme_file_uri( '/style-editor.css' ), false, '1.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'weracoba_editor_styles' );


/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

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
