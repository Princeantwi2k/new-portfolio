<?php
// custom post types
/**
 * Registers portfolio post type
 * @since  1.0.0
 */
add_action( 'init', 'mellow_register_portfolio_posttype' );
function mellow_register_portfolio_posttype() {
	
    global $mellow_theme_mod;
	$portfolio_slug = '';
    $portfolio_slug = isset($mellow_theme_mod['mellow_portfolio_slug_text']) ? $mellow_theme_mod['mellow_portfolio_slug_text'] : 'portfolio';

	$labels = array(
		'name'               	=> _x( 'Portfolio', 'post type general name', 'mellow' ),
		'singular_name'      	=> _x( 'Portfolio Item', 'post type singular name', 'mellow' ),
		'all_items'          	=> __( 'Portfolio Items', 'mellow' ),
		'add_new'            	=> __( 'Add New', 'mellow' ),
		'add_new_item'       	=> __( 'Add New Portfolio Item', 'mellow' ),
		'edit_item'          	=> __( 'Edit Portfolio Item', 'mellow' ),
		'new_item'           	=> __( 'New Portfolio Item', 'mellow' ),
		'view_item'          	=> __( 'View Portfolio Item', 'mellow' ),
		'search_items'       	=> __( 'Search Portfolio Items', 'mellow' ),
		'not_found'          	=> __( 'No Portfolio Items found', 'mellow' ),
		'not_found_in_trash'	=> __( 'No Portfolio Items found in Trash', 'mellow' ),
    );
	$args = array(
		'labels'          	=> $labels,
	    'public'          	=> true,  
        'show_ui'         	=> true,  
        'capability_type'	=> 'post',  
        'hierarchical'    	=> false,  
        'can_export'      	=> true,
        'has_archive'     	=> false,
		'menu_icon'       	=> 'dashicons-portfolio',
        'rewrite'         	=> array( 'slug'	=> $portfolio_slug ),
        'supports'        	=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);
	register_post_type( 'dtr_portfolio', $args );
}

/**
 * Register custom taxonomy for portfolio items.
 * @since  1.0.0
 */
add_action( 'init', 'mellow_register_portfolio_taxonomy' );
function mellow_register_portfolio_taxonomy() {
    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'mellow' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'mellow' ),
        'search_items'      => __( 'Search Portfolio Categories', 'mellow' ),
        'all_items'         => __( 'All Portfolio Categories', 'mellow' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'mellow' ),
		'view_item'         => __( 'View Portfolio Category', 'mellow' ),
        'parent_item'       => __( 'Parent Portfolio Category', 'mellow' ),
        'parent_item_colon'	=> __( 'Parent Portfolio Category:', 'mellow' ),
        'update_item'       => __( 'Update Portfolio Category', 'mellow' ),
        'add_new_item'      => __( 'Add New Portfolio Category', 'mellow' ),
        'new_item_name'     => __( 'New Portfolio Category Name', 'mellow' ),
    );
    $args = array(
        'hierarchical'	=> true,
        'labels'       	=> $labels,
        'show_ui'      	=> true,
        'rewrite'      	=> true,
    );
    register_taxonomy( 'dtr_portfoliotags', array( 'dtr_portfolio' ), $args );
}

/**
 * Registers testimonial post type
 * @since  1.0.0
 */
add_action( 'init', 'mellow_register_testimonial_posttype' );
function mellow_register_testimonial_posttype() {

    global $mellow_theme_mod;
	$testimonial_slug = '';
    $testimonial_slug = isset($mellow_theme_mod['mellow_testimonial_slug_text']) ? $mellow_theme_mod['mellow_testimonial_slug_text'] : 'testimonial';

	$labels = array(
		'name'               => _x( 'Testimonial', 'post type general name', 'mellow' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'mellow' ),
		'all_items'          => __( 'Testimonials', 'mellow' ),
		'add_new'            => __( 'Add New', 'mellow' ),
		'add_new_item'       => __( 'Add New Testimonial', 'mellow' ),
		'edit_item'          => __( 'Edit Testimonial', 'mellow' ),
		'new_item'           => __( 'New Testimonial', 'mellow' ),
		'view_item'          => __( 'View Testimonial', 'mellow' ),
		'search_items'       => __( 'Search Testimonials', 'mellow' ),
		'not_found'          => __( 'No Testimonials found', 'mellow' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash', 'mellow' ),
    );
	$args = array(
		'labels'          => $labels,
	    'public'          => true,
        'show_ui'         => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'has_archive'     => false,
		'menu_icon'       => 'dashicons-star-filled',
        'rewrite'         => array( 'slug'	=> $testimonial_slug ),
        'supports'        => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'dtr_testimonial', $args );
}