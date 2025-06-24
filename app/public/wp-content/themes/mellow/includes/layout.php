<?php
/**
 * Layouts
 */
// Layout Classes
if ( ! function_exists( 'mellow_get_layout_class' ) ) {
	function mellow_get_layout_class() {

		// Vars
		$class = 'dtr-fullwidth';

		// Single Post Layout
		if ( is_single() ) {
			$mellow_single_post_layout = mellow_get_theme_option( 'mellow_single_post_layout', 'dtr-right-sidebar' );
			$page_setting = get_post_meta( get_the_ID(), '_mellow_page_layout_meta', true );
			if ( $page_setting !== '' ) {
				$class = $page_setting;
			} else {
				$class = $mellow_single_post_layout;
			}
		}

		// Blog / Archive Layout
		$mellow_blog_layout = mellow_get_theme_option( 'mellow_blog_layout', 'dtr-right-sidebar' );
		if ( is_archive() || is_author() || is_home() ) {
			$class = $mellow_blog_layout;
		}

        // Page Layout
		if ( is_page() ) {
			if ( class_exists( 'Redux_Framework_Plugin' )  ){
				$mellow_page_layout = mellow_get_theme_option( 'mellow_page_layout' );
			} else {
				$mellow_page_layout = 'dtr-right-sidebar';
			}
			$page_setting = get_post_meta( get_the_ID(), '_mellow_page_layout_meta', true );
			if ( $page_setting !== '' ) {
				$class = $page_setting;
			} else {
				$class = $mellow_page_layout;
			}
		}

		return $class;
	}
}