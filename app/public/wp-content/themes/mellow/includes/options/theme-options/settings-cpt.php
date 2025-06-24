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
		'title'      => esc_html__( 'Custom Post Types', 'mellow' ),
		'id'         => 'mellow_cpt_settings',
        'icon'       => 'dashicons dashicons-admin-page',
		'subsection' => false,
		'fields'     => array(     
			array(
				'id'    => 'mellow_info_portfolio_cpt',
				'type'  => 'info',
                'title' => esc_html__( 'Portfolio Post', 'mellow' ),
			), 
            array(
				'id'       => 'mellow_portfolio_single_image',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Featured Image', 'mellow' ),
				'default'  => true, 
			),
			array(
                'id'       => 'mellow_portfolio_single_image_corner',
                'type'     => 'select',
                'title'    => esc_html__( 'Featured Image Corners', 'mellow' ),
                'options'  => array(
                    'dtr-radius--rounded'   => esc_html__( 'Rounded Corners', 'mellow' ),
                    'dtr-radius--default'	=> esc_html__( 'Default', 'mellow' ),
                ),
                'default'  => 'dtr-radius--rounded',
            ),
            array(
				'id'       => 'mellow_portfolio_slug_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Post Slug', 'mellow' ),
                'subtitle' => wp_kses( __('This will be reflected in post URL text.<br>On change it may give 404 error for portfolio posts.<br><br>Flushing permalinks will make it work<br>(Re-save the permalink structure under : WP Admin Menu / Settings / Permalink)', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
				'default'  => esc_html__('portfolio', 'mellow'),
			),     
            array(
				'id'    => 'mellow_info_testimonial_cpt',
				'type'  => 'info',
                'title' => esc_html__( 'Testimonial Post', 'mellow' ),
			),
            array(
				'id'       => 'mellow_testimonial_single_image',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Featured Image', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_testimonial_slug_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Testimonial Post Slug', 'mellow' ),
                'subtitle' => wp_kses( __('This will be reflected in post URL text.<br>On change it may give 404 error for testimonial single posts.<br><br>Flushing permalinks will make it work<br>(Re-save the permalink structure under : WP Admin Menu / Settings / Permalink)', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
				'default'  => esc_html__('testimonial', 'mellow'),
			),

        ),
	)
);