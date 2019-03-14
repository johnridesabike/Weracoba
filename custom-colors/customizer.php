<?php
/**
 * Custom Colors Customizer
 *
 * @package weracoba
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function weracoba_colors_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Primary color.
	 */
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => 'default',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'weracoba_sanitize_color_option',
		)
	);

	$wp_customize->add_control(
		'primary_color',
		array(
			'type'     => 'radio',
			'label'    => __( 'Primary Color', 'weracoba' ),
			'choices'  => array(
				'default' => _x( 'Default', 'primary color', 'weracoba' ),
				'custom'  => _x( 'Custom', 'primary color', 'weracoba' ),
			),
			'section'  => 'colors',
			'priority' => 5,
		)
	);

	// Add primary color hue setting and control.
	$wp_customize->add_setting(
		'primary_color_hue',
		array(
			'default'           => 199,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color_hue',
			array(
				'description' => __( 'Apply a custom color for buttons, links, featured images, etc.', 'weracoba' ),
				'section'     => 'colors',
				'mode'        => 'hue',
			)
		)
	);
}
add_action( 'customize_register', 'weracoba_colors_customize_register' );

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function weracoba_customize_color_preview_js() {
	wp_enqueue_script( 'weracoba-customize-preview', get_theme_file_uri( '/js/color-customize-preview.js' ), array( 'customize-preview' ), '20181231', true );
}
add_action( 'customize_preview_init', 'weracoba_customize_color_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function weracoba_panels_js() {
	wp_enqueue_script( 'weracoba-customize-controls', get_theme_file_uri( '/js/color-customize-controls.js' ), array(), '20181231', true );
}
add_action( 'customize_controls_enqueue_scripts', 'weracoba_panels_js' );

/**
 * Sanitize custom color choice.
 *
 * @param string $choice Whether image filter is active.
 *
 * @return string
 */
function weracoba_sanitize_color_option( $choice ) {
	$valid = array(
		'default',
		'custom',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'default';
}
