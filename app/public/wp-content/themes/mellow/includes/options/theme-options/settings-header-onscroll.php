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
		'title'      => esc_html__( 'Header: On Scroll', 'mellow' ),
		'id'         => 'mellow_header_onscroll_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'mellow_onscroll_header_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Enable Header On Scroll', 'mellow' ),
                'subtitle' => esc_html__( 'Except for top fixed header variaion', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_onscroll_header_background_color',
				'type'     => 'background',
				'output'   => array(
					'background-color' => '#dtr-header-global.header-fixed',
				),
				'title'    => esc_html__( 'Background', 'mellow' ),
			),
            // spacings
			array(
				'id'            => 'mellow_onscroll_header_padding',
				'type'          => 'spacing',
				'output'        => array( '#dtr-header-global.header-fixed' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
				'display_units' => true,
                'right'         => false,
                'left'          => false,
				'title'         => esc_html__( 'Padding - Top & Bottom', 'mellow' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
        ),
	)
);