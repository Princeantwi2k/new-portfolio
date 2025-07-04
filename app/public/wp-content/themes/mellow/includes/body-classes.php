<?php
/**
 * Adds classes to the body tag
 *
 * @package MellowTheme
 * @version 1.0.0
 */
function mellow_body_classes( $classes ) {

	// Customizer styling class
	if ( is_customize_preview() ) {
		$classes[] = 'dtr-customizer';
	}

	// header class
	if( 'header-v2' == mellow_get_theme_option( 'mellow_header_layout', 'header-v1' ) ) {
		$classes[] = 'dtr-header-v2';
	} elseif( 'header-v3' == mellow_get_theme_option( 'mellow_header_layout', 'header-v1' ) ) {
		$classes[] = 'dtr-header-v3';
	} elseif( 'header-v4' == mellow_get_theme_option( 'mellow_header_layout', 'header-v1' ) ) {
		$classes[] = 'dtr-header-v4';
	} else {
		$classes[] = 'dtr-header-v1';
	}

	// header on scroll
	if( false == mellow_get_theme_option( 'mellow_onscroll_header_enable', true ) ) {
		$classes[] = 'hide-onscroll';
	} else {
		$classes[] = 'show-onscroll';
	}

	// Return classes
	return $classes;
}
add_filter( 'body_class', 'mellow_body_classes' );