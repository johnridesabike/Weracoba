<?php
/**
 * Weracoba Theme Customizer
 *
 * @package Weracoba
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function weracoba_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'weracoba_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'weracoba_customize_partial_blogdescription',
		) );
	}

    $wp_customize->add_section('weracoba_options', array(
        'title'    => __( 'Weracoba Options', 'weracoba' ),
        'priority' => 120,
    ));
    
    /*
    * Sets the portfolio category options
    */

    $wp_customize->add_setting( 'cat_1', array(
        'default'        => 'uncategorized',
        'capability'     => 'edit_theme_options',
    ));
    $wp_customize->add_control( 'cat_1', array(
        'settings' => 'cat_1',
        'label'   => __( 'Portfolio Category', 'weracoba' ),
        'section' => 'weracoba_options',
        'type'    => 'select',
        'choices' => get_categories_select()
    ));
}
add_action( 'customize_register', 'weracoba_customize_register' );

/* 
* @link https://josephfitzsimmons.com/adding-a-select-box-with-categories-into-wordpress-theme-customizer/
*/
function get_categories_select() {
    $teh_cats = get_categories();
    $results;
    $count = count($teh_cats);
    for ($i=0; $i < $count; $i++) {
        if (isset($teh_cats[$i]))
            $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
        else
            $count++;
    }
    return $results;
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function weracoba_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function weracoba_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function weracoba_customize_preview_js() {
	wp_enqueue_script( 'weracoba-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'weracoba_customize_preview_js' );
