<?php
/**
 * Blog functions
 *
 * @package MellowTheme
 * @version 1.0.0
 */

/**
 * Modify tag cloud widget
 */
if ( ! function_exists( 'mellow_tag_cloud_widget' ) ) :
add_filter('wp_generate_tag_cloud', 'mellow_tag_cloud_widget',10,1);
function mellow_tag_cloud_widget($input){
  return preg_replace('/ style=("|\')(.*?)("|\')/','',$input);
}
endif;

/**
 * Blog classes
 */
if ( ! function_exists( 'mellow_blog_classes' ) ) :
	function mellow_blog_classes( $classes = NULL ) {
		if ( 'dtr-blog-grid-masonry' == mellow_get_theme_option( 'mellow_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-masonry';
		} elseif ( 'dtr-blog-grid-masonry-3col' == mellow_get_theme_option( 'mellow_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-3col dtr-blog-grid-masonry';
		} elseif ( 'dtr-blog-grid-fitrows-3col' == mellow_get_theme_option( 'mellow_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-3col dtr-blog-grid-fitrows';
		} elseif ( 'dtr-blog-grid-fitrows' == mellow_get_theme_option( 'mellow_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-fitrows';
		} elseif ( 'dtr-blog-left-thumb' == mellow_get_theme_option( 'mellow_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-left-thumb';
		} else {
			$classes = 'dtr-blog-default';
		}
		return $classes;
	}
endif;