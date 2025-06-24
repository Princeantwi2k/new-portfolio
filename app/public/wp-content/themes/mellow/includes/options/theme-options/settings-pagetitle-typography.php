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
		'title'      => esc_html__( 'Typography', 'mellow' ),
		'id'         => 'mellow_pagetitle_typography_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'                => 'mellow_page_title_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Page Title / Archives Page Title', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
				'letter-spacing'    => true,
                'font-size'         => false,
                'line-height'       => false,
				'text-transform'    => true,
                'units'             => 'px',
				'output'            => array( '.dtr-page-title' ),
			),
            array(
				'id'       => 'mellow_page_title_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_page_title_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // info
            array(
				'id'    => 'mellow_info_sm_page_title',
				'type'  => 'info',
                'title' => esc_html__( 'Page Title / Archives Page Title - Sizes For Small Screens', 'mellow' ),
				'desc'  =>  wp_kses( __('Set only if required', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            array(
				'id'       => 'mellow_sm_page_title_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_sm_page_title_lh',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // info
            array(
				'id'    => 'mellow_info_breadcrumb_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Breadcrumb - Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_breadcrumb_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Font', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
				'letter-spacing'    => true,
                'font-size'         => true,
                'line-height'       => true,
				'text-transform'    => true,
                'units'             => 'px',
				'output'            => array( '.dtr-breadcrumb-wrapper, .dtr-breadcrumb-wrapper a' ),
			),
            array(
				'id'       => 'mellow_breadcrumb_link_color',
				'type'     => 'link_color',
				'title'    => '',
                'active'   => false,
				'output'   => array( '.dtr-breadcrumb-wrapper a' ),
			),

		),
	)
);