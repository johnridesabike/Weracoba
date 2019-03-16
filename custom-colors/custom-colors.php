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

/**
 * Convert HSL to HEX colors
 *
 * @param int  $h Hue.
 * @param int  $s Saturation.
 * @param int  $l Lightness.
 * @param bool $to_hex Returns hexadecimal color if true, returns RGB color if false.
 */
function weracoba_hsl_hex( $h, $s, $l, $to_hex = true ) {

	$h /= 360;
	$s /= 100;
	$l /= 100;

	$r = $l;
	$g = $l;
	$b = $l;
	$v = ( $l <= 0.5 ) ? ( $l * ( 1.0 + $s ) ) : ( $l + $s - $l * $s );
	if ( $v > 0 ) {
		$m;
		$sv;
		$sextant;
		$fract;
		$vsf;
		$mid1;
		$mid2;

		$m       = $l + $l - $v;
		$sv      = ( $v - $m ) / $v;
		$h      *= 6.0;
		$sextant = floor( $h );
		$fract   = $h - $sextant;
		$vsf     = $v * $sv * $fract;
		$mid1    = $m + $vsf;
		$mid2    = $v - $vsf;

		switch ( $sextant ) {
			case 0:
				$r = $v;
				$g = $mid1;
				$b = $m;
				break;
			case 1:
				$r = $mid2;
				$g = $v;
				$b = $m;
				break;
			case 2:
				$r = $m;
				$g = $v;
				$b = $mid1;
				break;
			case 3:
				$r = $m;
				$g = $mid2;
				$b = $v;
				break;
			case 4:
				$r = $mid1;
				$g = $m;
				$b = $v;
				break;
			case 5:
				$r = $v;
				$g = $m;
				$b = $mid2;
				break;
		}
	}
	$r = round( $r * 255, 0 );
	$g = round( $g * 255, 0 );
	$b = round( $b * 255, 0 );

	if ( $to_hex ) {

		$r = ( $r < 15 ) ? '0' . dechex( $r ) : dechex( $r );
		$g = ( $g < 15 ) ? '0' . dechex( $g ) : dechex( $g );
		$b = ( $b < 15 ) ? '0' . dechex( $b ) : dechex( $b );

		return "#$r$g$b";

	}

	return "rgb($r, $g, $b)";
}

/**
 * Calculate a complementary Hue.
 *
 * @param int $h the Hue.
 */
function weracoba_complementary_hue( $h ) {
	$h = $h + 120;
	if ( 360 < $h ) {
		$h = $h - 360;
	}
	return $h;
}
