<?php
/**
 * Redux Settings
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Align / On / Off', 'mellow' ),
		'id'         => 'mellow_pagetitle_misc_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'    => 'mellow_info_pagetitle_align',
				'type'  => 'info',
                'title' => esc_html__( 'Text Align', 'mellow' ),
			),
            array(
				'id'       => 'mellow_page_title_section_align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Align', 'mellow' ),
				'options'  => array(
					'text-left'   => esc_html__( 'Left', 'mellow' ),
					'text-right'  =>  esc_html__( 'Right', 'mellow' ),
                    'text-center' => esc_html__( 'Center', 'mellow' ),
				),
				'default'  => 'text-center',
			),
            array(
				'id'    => 'mellow_info_pagetitle_pages',
				'type'  => 'info',
                'title' => esc_html__( 'For Pages', 'mellow' ),
			),
            array(
				'id'       => 'mellow_enable_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_page_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'mellow' ),
				'default'  => true,
			),

            array(
				'id'    => 'mellow_info_pagetitle_archives',
				'type'  => 'info',
                'title' => esc_html__( 'For Archives Pages', 'mellow' ),
			),
            array(
				'id'       => 'mellow_enable_archive_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_archive_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_archive_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'mellow' ),
				'default'  => true,
			),

            array(
				'id'    => 'mellow_info_pagetitle_posts',
				'type'  => 'info',
                'title' => esc_html__( 'For Single Posts', 'mellow' ),
			),
            array(
				'id'       => 'mellow_enable_single_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_single_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_single_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'mellow' ),
				'default'  => true,
			),   
			array(
				'id'    => 'mellow_info_pagetitle_portfolio',
				'type'  => 'info',
                'title' => esc_html__( 'For Portfolio Single Post', 'mellow' ),
			),
            array(
				'id'       => 'mellow_enable_portfolio_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'mellow' ),
				'default'  => true,
			),            
            array(
				'id'       => 'mellow_enable_portfolio_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'mellow' ),
				'default'  => true,
			),           
            array(
				'id'       => 'mellow_enable_portfolio_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'mellow' ),
				'default'  => true,
			),        
            array(
				'id'    => 'mellow_info_pagetitle_testimonial',
				'type'  => 'info',
                'title' => esc_html__( 'For Testimonial Single Post', 'mellow' ),
			),
            array(
				'id'       => 'mellow_enable_testimonial_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_testimonial_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_enable_testimonial_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'mellow' ),
				'default'  => true,
			),
        ),
	)
);