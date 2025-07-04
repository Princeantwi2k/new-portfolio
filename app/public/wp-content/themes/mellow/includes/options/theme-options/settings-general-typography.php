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
		'title'      => esc_html__( 'General Typography', 'mellow' ),
		'id'         => 'mellow_general_typography_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            // body
            array(
				'id'    => 'mellow_info_body_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Body Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_body_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Body Font', 'mellow' ),
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
				'output'            => array( 'body' ),
			),
            array(
				'id'       => 'mellow_body_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_body_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),

            // h1
            array(
				'id'    => 'mellow_info_h1_typo',
				'type'  => 'info',
                'title' => esc_html__( 'H1 Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_h1_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'H1', 'mellow' ),
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
				'output'            => array( 'h1, .elementor-widget-heading h1.elementor-heading-title' ),
			),
            array(
				'id'       => 'mellow_h1_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h1_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // h2
            array(
				'id'    => 'mellow_info_h2_typo',
				'type'  => 'info',
                'title' => esc_html__( 'H2 Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_h2_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'H2', 'mellow' ),
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
				'output'            => array( 'h2, .elementor-widget-heading h2.elementor-heading-title' ),
			),
            array(
				'id'       => 'mellow_h2_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h2_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // h3
            array(
				'id'    => 'mellow_info_h3_typo',
				'type'  => 'info',
                'title' => esc_html__( 'H3 Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_h3_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'H3', 'mellow' ),
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
				'output'            => array( 'h3, .elementor-widget-heading h3.elementor-heading-title' ),
			),
            array(
				'id'       => 'mellow_h3_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h3_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // h4
            array(
				'id'    => 'mellow_info_h4_typo',
				'type'  => 'info',
                'title' => esc_html__( 'H4 Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_h4_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'H4', 'mellow' ),
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
				'output'            => array( 'h4, .elementor-widget-heading h4.elementor-heading-title' ),
			),
            array(
				'id'       => 'mellow_h4_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h4_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // h5
            array(
				'id'    => 'mellow_info_h5_typo',
				'type'  => 'info',
                'title' => esc_html__( 'H5 Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_h5_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'H5', 'mellow' ),
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
				'output'            => array( 'h5, .elementor-widget-heading h5.elementor-heading-title' ),
			),
            array(
				'id'       => 'mellow_h5_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h5_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // h6
            array(
				'id'    => 'mellow_info_h6_typo',
				'type'  => 'info',
                'title' => esc_html__( 'H6 Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_h6_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'H6', 'mellow' ),
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
				'output'            => array( 'h6, .elementor-widget-heading h6.elementor-heading-title' ),
			),
            array(
				'id'       => 'mellow_h6_font_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h6_line_height',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            // info
            array(
				'id'    => 'mellow_info_sm_headings',
				'type'  => 'info',
                'title' => esc_html__( 'Heading Sizes For Small Screens', 'mellow' ),
				'desc'  =>  wp_kses( __('Set only if required', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            // h1
            array(
				'id'       => 'mellow_h1_size_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H1 - Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h1_lh_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H1 - Line Height', 'mellow' ),
				'default'  => '',
			),
            // h2
            array(
				'id'       => 'mellow_h2_size_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H2 - Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h2_lh_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H2 - Line Height', 'mellow' ),
				'default'  => '',
			),
            // h3
            array(
				'id'       => 'mellow_h3_size_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H3 - Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h3_lh_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H3 - Line Height', 'mellow' ),
				'default'  => '',
			),
            // h4
            array(
				'id'       => 'mellow_h4_size_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H4 - Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h4_lh_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H4- Line Height', 'mellow' ),
				'default'  => '',
			),
            // h5
            array(
				'id'       => 'mellow_h5_size_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H5 - Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h5_lh_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H5 - Line Height', 'mellow' ),
				'default'  => '',
			),
            // h6
             array(
				'id'       => 'mellow_h6_size_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H6 - Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_h6_lh_mobile',
				'type'     => 'text',
				'title'    => esc_html__( 'H6 - Line Height', 'mellow' ),
				'default'  => '',
			),
		),
	)
);