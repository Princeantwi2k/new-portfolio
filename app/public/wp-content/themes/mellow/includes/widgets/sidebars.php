<?php
/**
 * Registers widget areas.
 *
 * @package MellowTheme
 * @version 1.0.0
 */
if ( ! function_exists('mellow_widgets_init') ) {
	function mellow_widgets_init()  {

		// Blog Widgets
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Sidebar', 'mellow' ),
			'id'            => 'widgets-blog',
			'description'   => esc_html__( 'This area will be shown as a post sidebar. Widgets will be stacked in this column.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Header Widget Area - One

		register_sidebar( array(
			'name'          => esc_html__( 'Header Widget Area-One', 'mellow' ),
			'id'            => 'widget-header-one',
			'description'   => esc_html__( 'Widgets in this column will appear for : All Header Variations in Main header row right side.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Header Widget Widget - Two
		register_sidebar( array(
			'name'          => esc_html__( 'Header Widget Area-Two', 'mellow' ),
			'id'            => 'widget-header-two',
			'description'   => esc_html__( 'Widgets in this column will appear in : For Header Variations 1 / 2 in Topbar left side, and For Header Variation 4 in main header right side.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Header Widget Widget - Three
		register_sidebar( array(
			'name'          => esc_html__( 'Header Widget Area-Three', 'mellow' ),
			'id'            => 'widget-header-three',
			'description'   => esc_html__( 'Widgets in this column will appear in : For Header Variations 1 / 2 in Topbar right side.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Footer column 1
		register_sidebar( array(
			'name'          => esc_html__( 'Footer - Column 1', 'mellow' ),
			'id'            => 'footer-column-1',
			'description'   => esc_html__( 'Widgets in this column will appear in first footer column.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Footer column 2
		register_sidebar( array(
			'name'          => esc_html__( 'Footer - Column 2', 'mellow' ),
			'id'            => 'footer-column-2',
			'description'   => esc_html__( 'Widgets in this column will appear in second footer column.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Footer column 3
		register_sidebar( array(
			'name'          => esc_html__( 'Footer - Column 3', 'mellow' ),
			'id'            => 'footer-column-3',
			'description'   => esc_html__( 'Widgets in this column will appear in third footer column.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Footer column 4
		register_sidebar( array(
			'name'          => esc_html__( 'Footer - Column 4', 'mellow' ),
			'id'            => 'footer-column-4',
			'description'   => esc_html__( 'Widgets in this column will appear in fourth footer column.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Copyright column 1
		register_sidebar( array(
			'name'          => esc_html__( 'Copyright Column 1', 'mellow' ),
			'id'            => 'copyright-column-1',
			'description'   => esc_html__( 'Widgets in this column will appear in copyright section.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Copyright column 2
		register_sidebar( array(
			'name'          => esc_html__( 'Copyright Column 2', 'mellow' ),
			'id'            => 'copyright-column-2',
			'description'   => esc_html__( 'Widgets in this column will appear in copyright section.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Copyright column 3
		register_sidebar( array(
			'name'          => esc_html__( 'Copyright Column 3', 'mellow' ),
			'id'            => 'copyright-column-3',
			'description'   => esc_html__( 'Widgets in this column will appear in copyright section.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );

		// Page Widgets
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'mellow' ),
			'id'            => 'widgets-page',
			'description'   => esc_html__( 'This area will be shown as a page sidebar. Widgets will be stacked in this column.', 'mellow' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'mellow_widgets_init' );
}