<?php
/**
 * Weracoba color functions and definitions.
 *
 * @package Weracoba
 */

$weracoba_default_hue = 185;

/**
 * Enqueue supplemental block editor styles.
 */
function weracoba_editor_customizer_styles() {

	wp_enqueue_style( 'weracoba-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/custom-colors/color-patterns.php' );
		wp_add_inline_style( 'weracoba-editor-customizer-styles', weracoba_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'weracoba_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function weracoba_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/custom-colors/color-patterns.php' );

	$primary_color = $weracoba_default_hue;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', $weracoba_default_hue );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo weracoba_custom_colors_css(); /* phpcs:ignore */ ?>
	</style>
	<?php
}
add_action( 'wp_head', 'weracoba_colors_css_wrap' );

/**
 * Load customizer functions
 */
require get_template_directory() . '/custom-colors/customizer.php';
