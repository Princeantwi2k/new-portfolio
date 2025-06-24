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
		'id'         => 'mellow_footer_general_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'mellow_footer_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Footer Section', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'   => 'mellow_info_main_footer_row',
				'type' => 'info',
                'title'    => esc_html__( 'Main Footer Columns Row', 'mellow' ),
			),
            array(
				'id'       => 'mellow_footer_columns_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Main Footer Columns Row', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_footer_columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Columns', 'mellow' ),
				'options'  => array(
                    '1'	=> esc_html__( 'Single Column', 'mellow' ),
		            '2'	=> esc_html__( 'Two Equal Columns', 'mellow' ),
		            '3'	=> esc_html__( 'Three Equal Columns', 'mellow' ),
                    '4'	=> esc_html__( 'Four Equal Columns', 'mellow' ),
                    '5'	=> esc_html__( '6 + 3 + 3', 'mellow' ),
                    '6'	=> esc_html__( '3 + 6 + 3', 'mellow' ),
                    '7'	=> esc_html__( '4 + 5 + 3', 'mellow' ),
                    '8'	=> esc_html__( '4 + 3 + 2 + 3', 'mellow' ),
				),
				'default'  => '4',
			),
            array(
				'id'            => 'mellow_footer_main_padding',
				'type'          => 'spacing',
                'title'         => esc_html__( 'Padding', 'mellow' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,
                'left'          => false,
				'display_units' => true,
				'output'        => array( '.dtr-footer-row' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
			array(
				'id'       => 'mellow_footer_main_sm_top_padding',
				'type'     => 'text',
				'title'    => esc_html__( 'Padding - Top - For Small Screens', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 50px', 'mellow' ),
				'default'  => '',
			),
			array(
				'id'       => 'mellow_footer_main_sm_bottom_padding',
				'type'     => 'text',
				'title'    => esc_html__( 'Padding - Bottom - For Small Screens', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 50px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'   => 'mellow_info_copyright_row',
				'type' => 'info',
                'title'    => esc_html__( 'Copyright Settings', 'mellow' ),
			),
            array(
				'id'       => 'mellow_copyright_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Copyright', 'mellow' ),
				'default'  => true,
			),
			array(
				'id'       => 'mellow_copyright_columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Columns', 'mellow' ),
				'options'  => array(
                    '1'	=> esc_html__( 'Single Column', 'mellow' ),
		            '2'	=> esc_html__( 'Two Equal Columns', 'mellow' ),
		            '3'	=> esc_html__( 'Three Equal Columns', 'mellow' ),
				),
				'default'  => '1',
			),
			array(
                'id'       => 'mellow_copyright_1_text_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Text Align - First Column', 'mellow' ),
                'options'  => array(
                    'text-align-default'   => esc_html__( 'Left', 'mellow' ),
                    'text-right'	=> esc_html__( 'Right', 'mellow' ),
					'text-center'	=> esc_html__( 'Center', 'mellow' ),
                ),
                'default'  => 'text-align-default',
            ),
			array(
                'id'       => 'mellow_copyright_2_text_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Text Align - Second Column', 'mellow' ),
                'options'  => array(
                    'text-align-default'   => esc_html__( 'Left', 'mellow' ),
                    'text-right'	=> esc_html__( 'Right', 'mellow' ),
					'text-center'	=> esc_html__( 'Center', 'mellow' ),
                ),
                'default'  => 'text-center',
            ),
			array(
                'id'       => 'mellow_copyright_3_text_align',
                'type'     => 'select',
                'title'    => esc_html__( 'Text Align - Third Column', 'mellow' ),
                'options'  => array(
                    'text-align-default'   => esc_html__( 'Left', 'mellow' ),
                    'text-right'	=> esc_html__( 'Right', 'mellow' ),
					'text-center'	=> esc_html__( 'Center', 'mellow' ),
                ),
                'default'  => 'text-right',
            ),
            array(
				'id'            => 'mellow_copyright_padding',
				'type'          => 'spacing',
                'title'         => esc_html__( 'Padding', 'mellow' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,
                'left'          => false,
				'display_units' => true,
				'output'        => array( '.dtr-copyright' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
		),
	)
);