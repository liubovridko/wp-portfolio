<?php
/**
 * Portfolio Theme Customizer
 *
 * @package Portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		 $wp_customize->selective_refresh->add_partial(
			  'blogname',
			  array(
					'selector'        => '.site-title a',
					'render_callback' => 'portfolio_customize_partial_blogname',
			  )
		 );
		 $wp_customize->selective_refresh->add_partial(
			  'blogdescription',
			  array(
					'selector'        => '.site-description',
					'render_callback' => 'portfolio_customize_partial_blogdescription',
			  )
		 );
	}

	// Add a new section for the Banner Button URL
	$wp_customize->add_section('banner_section', array(
		 'title'       => __('Banner Settings', 'portfolio'),
		 'description' => __('Settings for the banner section.', 'portfolio'),
		 'priority'    => 30,
	));

	// Add a setting for the Banner Button URL
	$wp_customize->add_setting('banner_button_url', array(
		 'default'           => '#',
		 'sanitize_callback' => 'esc_url_raw',
	));

	// Add a control to edit the Banner Button URL
	$wp_customize->add_control('banner_button_url', array(
		 'label'   => __('Banner Button URL', 'portfolio'),
		 'section' => 'banner_section',
		 'type'    => 'url',
	));
}
add_action( 'customize_register', 'portfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function portfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function portfolio_customize_preview_js() {
	wp_enqueue_script( 'portfolio-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'portfolio_customize_preview_js' );
