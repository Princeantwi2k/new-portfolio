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
		'title'      => esc_html__( 'Button In Header', 'mellow' ),
		'id'         => 'mellow_header_button_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'mellow_header_btn_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text', 'mellow' ),
				'default'  => esc_html__( 'Get In Touch', 'mellow' ),
			),
			array(
				'id'       => 'mellow_header_btn_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Link', 'mellow' ),
				'subtitle' => esc_html__( 'This must be a URL.', 'mellow' ),
				'default'  => '#',
			 ),
            array(
				'id'       => 'mellow_header_button_target',
				'type'     => 'select',
				'title'    => esc_html__( 'Open link in', 'mellow' ),
				'options'  => array(
                'self'    => esc_html__( 'Same Window', 'mellow' ),
		        'blank'   => esc_html__( 'New Window', 'mellow' ),
				),
				'default'  => 'self',
			),
			array(
				'id'       => 'mellow_header_btn_select_icon_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Icon', 'mellow' ),
				'options'  => array(
					'header_btn_no_icon'		=> esc_html__( 'None', 'mellow' ),
                    'header_btn_predef_icon'	=> esc_html__( 'Default Pre-defined Icon', 'mellow' ),
					'header_btn_custom_icon'	=> esc_html__( 'Custom Icon / Image Code', 'mellow' ),
				),
				'default'  => 'header_btn_no_icon',
			),
			array(
				'id'       => 'mellow_header_btn_icon_name',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Icon Type', 'mellow' ),
				'options'  => array(
					'icon-login-circle-fill'	=> esc_html__( 'Arrow', 'mellow' ),
                    'icon-mail-fill'	=> esc_html__( 'Mail', 'mellow' ),
					'icon-map-pin-2-line'	=> esc_html__( 'Map Pin', 'mellow' ),
					'icon-telephone-fill'	=> esc_html__( 'Call', 'mellow' ),
					'icon-send-plane-fill'	=> esc_html__( 'Plane', 'mellow' ),
					'icon-whatsapp-fill'	=> esc_html__( 'WhatsApp', 'mellow' ),
				),
				'required' => array( 'mellow_header_btn_select_icon_type', '=', 'header_btn_predef_icon' ),
				'default'  => 'icon-login-circle-fill',
			),
			array(
				'id'       => 'mellow_header_btn_icon_code',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Icon image / svg code', 'mellow' ),
				'required' => array( 'mellow_header_btn_select_icon_type', '=', 'header_btn_custom_icon' ),
				'default'  => esc_html__( 'I', 'mellow' ),
			),           
             array(
				'id'    => 'mellow_info_headerbtn_style',
				'type'  => 'info',
                'title' => esc_html__( 'Button Style', 'mellow' ),
			),
            array(
				'id'                => 'mellow_headerbtn_maintext_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Main Text - Font Settings', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
                'color'             => false,
				'letter-spacing'    => true,
				'text-transform'    => true,
                'units'             => 'px',
				'output'            => array( '.dtr-header-btn' ),
			),
            array(
				'id'       => 'mellow_headerbtn_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Font Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-header-btn' ),
			),
            array(
				'id'          => 'mellow_headerbtn_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-header-btn',
				),
			),
            array(
				'id'          => 'mellow_headerbtn_hover_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-header-btn:hover',
				),
			),          
			array(
				'id'          => 'mellow_headerbtn_icon_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Icon Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-header-btn .dtr-btn__icon',
				),
			),
			array(
				'id'          => 'mellow_headerbtn_hover_icon_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Icon Color On Button Hover', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-header-btn:hover .dtr-btn__icon',
				),
			),
        ),
	)
);