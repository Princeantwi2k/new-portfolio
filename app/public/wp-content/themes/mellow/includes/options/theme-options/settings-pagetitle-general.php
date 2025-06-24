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
		'title'      => esc_html__( 'General Settings', 'mellow' ),
		'id'         => 'mellow_page_title_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'    => 'mellow_info_pagetitle_section_general',
				'type'  => 'info',
                'title' => esc_html__( 'Page Title Section Styles', 'mellow' ),
			),
            array(
				'id'       => 'mellow_page_title_background',
				'type'     => 'background',
				'output'   => array(
					'background-color' => '.dtr-page-title--section',
				),
				'title'    => esc_html__( 'Background', 'mellow' ),
			),
            array(
				'id'          => 'mellow_page_title_overlay_background',
				'type'        => 'color_rgba',
				'title'       => esc_html__( 'Overlay Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
                'options'       => array(
                    'show_buttons' => false,
                ),
				'output'      => array(
					'background-color' => '.dtr-page-title__overlay',
				),
			),
            // spacings
			array(
				'id'            => 'mellow_page_title_padding',
				'type'          => 'spacing',
				'output'        => array( '.dtr-page-title--section' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,
                'left'          => false,
				'display_units' => true,
				'title'         => esc_html__( 'Padding - Top & Bottom', 'mellow' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
            //border
            array(
				'id'       => 'mellow_page_title_border',
				'type'     => 'border',
				'title'    => esc_html__( 'Border', 'mellow' ),
				'output'   => array( '.dtr-page-title--section' ),
                'all'      => false,
                'left'     => false,
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
			),
			array(
				'id'       => 'mellow_page_title_sm_top_padding',
				'type'     => 'text',
				'title'    => esc_html__( 'Padding - Top - For Small Screens', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 50px', 'mellow' ),
				'default'  => '',
			),
			array(
				'id'       => 'mellow_page_title_sm_bottom_padding',
				'type'     => 'text',
				'title'    => esc_html__( 'Padding - Bottom - For Small Screens', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 50px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'    => 'mellow_info_breadcrumb_general',
				'type'  => 'info',
                'title' => esc_html__( 'Breadcrumb', 'mellow' ),
			),
            array(
				'id'       => 'mellow_breadcrumb_plugin',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Breadcrumb via which plugin', 'mellow' ),
				'options'  => array(
					'yoast-breadcrumb'  => esc_html__( 'Yoast SEO', 'mellow' ),
					'navxt-breadcrumb'  => esc_html__( 'Breadcrumb NavXT', 'mellow' ),
				),
				'default'  => 'yoast-breadcrumb',
			),
            array(
				'id'            => 'mellow_breadcrumb_bottom_margin',
				'type'          => 'spacing',
				'output'        => array( '.dtr-breadcrumb-wrapper' ),
				'mode'          => 'margin',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'top'           => true,
                'right'         => false,
                'bottom'        => false,
                'left'         => false,
				'display_units' => true,
				'title'         => esc_html__( 'Margin Top', 'mellow' ),
				'default'       => array(
					'units'          => 'px',
				),
			),

        ),
	)
);