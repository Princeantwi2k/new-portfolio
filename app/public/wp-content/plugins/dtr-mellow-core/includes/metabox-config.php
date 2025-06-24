<?php
/**
 * Include and setup custom metaboxes and fields.
 */
add_action( 'cmb2_admin_init', 'mellow_metaboxes' );
/**
 * Hook in and add a metabox
 */
function mellow_metaboxes() {

	// Prefix
	$prefix = '_mellow_';

	/**
	 * Testimonial Settings
	 */
	$mellow_testimonial_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'testimonial-settings-metabox',
		'title'         => esc_html__( 'Testimonial Settings', 'mellow' ),
		'object_types'  => array( 'dtr_testimonial' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );

    $mellow_testimonial_metabox->add_field( array(
		'name'	=> esc_html__( 'Client Name', 'mellow' ),
		'id'   	=> $prefix . 'testimonial_client_name',
		'type'	=> 'text',
	) );

    $mellow_testimonial_metabox->add_field( array(
		'name'	=> esc_html__( 'Client Designation', 'mellow' ),
		'id'   	=> $prefix . 'testimonial_client_designation',
		'type'	=> 'text',
	) );

	// Page Layout
	$page_layout = array(
		'' 					=> esc_html__( 'Default', 'mellow' ),
		'dtr-fullwidth'		=> esc_html__( 'No Sidebar', 'mellow' ),
		'dtr-right-sidebar'	=> esc_html__( 'Right Sidebar', 'mellow' ),
		'dtr-left-sidebar' 	=> esc_html__( 'Left Sidebar', 'mellow' ),
	);

	// Page Header Background image styles
	$page_header_bg_image_style = array(
		'repeat'	=> esc_html__( 'Repeat', 'mellow' ),
		'stretched'	=> esc_html__( 'Stretched', 'mellow' ),
		'fixed'		=> esc_html__( 'Fixed', 'mellow' ),
	);

	/**
	 * Page Settings
	 */
	$mellow_page_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'page-settings-metabox',
		'title'         => esc_html__( 'Page Settings', 'mellow' ),
		'object_types'  => array( 'page', 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );

	$mellow_page_metabox->add_field( array(
		'id'   		=> $prefix . 'page_layout_meta',
		'name' 		=> esc_html__( 'Sidebar Position', 'mellow' ),
		'type' 		=> 'select',
		'options'	=> $page_layout,
	) );

	/**
	 * Page Header
	 */
	$mellow_page_header_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'page-header-metabox',
		'title'         => esc_html__( 'Page Title Section Style', 'mellow' ),
		'object_types'	=> array( 'page', 'post' ), // Post type
		'context'    	=> 'normal',
		'priority'   	=> 'high',
	) );

	$mellow_page_header_metabox->add_field( array(
		'name' => esc_html__( 'Page Title Background Image - Upload or enter URL', 'mellow' ),
		'id'   =>  $prefix . 'page_header_bg_image',
		'type' => 'file',
	) );

	$mellow_page_header_metabox->add_field( array(
		'id'   		=> $prefix . 'page_header_bg_image_style',
		'name' 		=> esc_html__( 'Page Title Background Style', 'mellow' ),
		'type' 		=> 'select',
		'options'	=> $page_header_bg_image_style,
	) );

	/**
	 * Portfolio
	 */
	$mellow_portfolio_post_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'portfolio-post-metabox',
		'title'         => esc_html__( 'Portfolio Grid Settings', 'mellow' ),
		'object_types'	=> array( 'dtr_portfolio' ), // Post type
		'context'    	=> 'side',
		'priority'   	=> 'high',
	) );

	$mellow_portfolio_post_metabox->add_field( array(
		'name'	=> esc_html__( 'If - Link to Heading in Portfolio Element - Needs to be External - Other than its linked single post', 'mellow' ),
		'desc'  => __('Give link here', 'mellow'),
		'id'   	=> $prefix . 'portfolio_external_link_url',
		'type'	=> 'text',
	) );

} // mellow_metaboxes