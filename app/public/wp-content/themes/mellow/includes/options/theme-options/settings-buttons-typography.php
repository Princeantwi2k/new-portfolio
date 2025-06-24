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
		'title'      => esc_html__( 'Links / Buttons Typography', 'mellow' ),
		'id'         => 'mellow_button_typography_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            // links
            array(
				'id'    => 'mellow_info_link_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Text Link', 'mellow' ),
			),
            array(
				'id'       => 'mellow_default_link_color',
				'type'     => 'link_color',
				'title'    => '',
                'active'   => false,
				'output'   => array( 'a' ),
			),
             // buttons
            array(
				'id'       => 'mellow_info_button_typo',
				'type'     => 'info',
                'title'    => esc_html__( 'Buttons Typography', 'mellow' ),
			),
            array(
				'id'                => 'mellow_button_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Font Settings', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
                'color'             => false,
				'letter-spacing'    => true,
				'text-transform'    => true,
                'units'             => 'px',
				'output'            => array( '.dtr-btn, button, .wp-block-button__link, .dtr-form-btn, .dtr-form .dtr-btn, input[type="submit"], input[type="reset"], button[type="submit"], #submit' ),
			),
            array(
				'id'          => 'mellow_button_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-btn, button, .wp-block-button__link, .dtr-form-btn, .dtr-form .dtr-btn, input[type="submit"], input[type="reset"], button[type="submit"], #submit',
				),
			),
            array(
				'id'          => 'mellow_button_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-btn:hover, button:hover, .wp-block-button__link:hover, .dtr-form-btn:hover, .dtr-form .dtr-btn:hover, input[type="submit"]:hover, input[type="reset"]:hover, button[type="submit"]:hover, #submit:hover',
				),
			),
            array(
				'id'       => 'mellow_button_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Font Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-btn, button, .wp-block-button__link, .dtr-form-btn, .dtr-form .dtr-btn, input[type="submit"], input[type="reset"], button[type="submit"], #submit' ),
			),
		),
	)
);