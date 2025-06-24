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
		'title'      => esc_html__( 'Footer Styles', 'mellow' ),
		'id'         => 'mellow_footer_style_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'    => 'mellow_info_styles_footer',
				'type'  => 'info',
                'title' => esc_html__( 'Complete Footer Section', 'mellow' ),
		    ),
            array(
				'id'       => 'mellow_footer_background',
				'type'     => 'background',
				'output'   => array(
					'background-color' => '.dtr-footer-section-wrap',
				),
				'title'    => esc_html__( 'Background', 'mellow' ),
			),
            array(
				'id'       => 'mellow_footer_border_top',
				'type'     => 'border',
				'title'    => esc_html__( 'Border Top', 'mellow' ),
				'output'   => array( '#dtr-footer-section' ),
                'all'      => false,
                'left'     => false,
                'top'      => true,
                'right'    => false,
                'bottom'   => false,
			),
            array(
				'id'    => 'mellow_info_styles_copyright',
				'type'  => 'info',
                'title' => esc_html__( 'Copyright', 'mellow' ),
		    ),
            array(
				'id'       => 'mellow_copyright_border_top',
				'type'     => 'border',
				'title'    => esc_html__( 'Border Top', 'mellow' ),
				'output'   => array( '.dtr-copyright' ),
                'all'      => false,
                'left'     => false,
                'top'      => true,
                'right'    => false,
                'bottom'   => false,
			),
			array(
				'id'    => 'mellow_info_footer_btn',
				'type'  => 'info',
                'title' => esc_html__( 'Button In Main Footer Columns', 'mellow' ),
		    ),
			array(
				'id'          => 'mellow_footer_button_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-footer-row .wp-block-button__link',
				),
			),
            array(
				'id'          => 'mellow_footer_button_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-footer-row .wp-block-button__link:hover',
				),
			),
            array(
				'id'       => 'mellow_footer_button_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Font Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-footer-row .wp-block-button__link' ),
			),
        ),
	)
);