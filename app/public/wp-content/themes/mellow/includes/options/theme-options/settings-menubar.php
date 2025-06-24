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
		'title'      => esc_html__( 'Menu', 'mellow' ),
		'id'         => 'mellow_menu_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'    => 'mellow_info_menu_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Main Menu - Font Settings', 'mellow' ),
			),
            array(
				'id'                => 'mellow_menu_typo',
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
				'output'            => array( '.main-navigation .sf-menu li a' ),
			),
            array(
				'id'    => 'mellow_info_menu_dropdown_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Dropdown - Font Settings', 'mellow' ),
			),
            array(
				'id'                => 'mellow_menu_dpd_typo',
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
				'output'            => array( '.main-navigation .sf-menu li li a' ),
			),
            array(
				'id'    => 'mellow_info_default_menu_colors',
				'type'  => 'info',
                'title' => esc_html__( 'Default Menu Color Settings', 'mellow' ),
                'desc' =>  wp_kses( __('<strong>This is menu ---> on page load</strong>', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            array(
				'id'       => 'mellow_default_menu_link_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Link colors', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-menu-default .sf-menu li a' ),
			),
            array(
				'id'          => 'mellow_default_menu_active_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Active Link Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-default .sf-menu li.current-menu-item a, .dtr-menu-default .sf-menu li.current-menu-ancestor > a, .dtr-menu-default .sf-menu .active'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
			array(
				'id'          => 'mellow_default_menu_link_icon_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Icon For Link With Dropdown Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-default .sf-menu>li.menu-item-has-children>a::after'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_default_menu_dpd_bg_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown - Background Color', 'mellow' ),
                'output'      => array(
					'background-color' => '.dtr-menu-default .sf-menu ul',
				),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_default_menu_dpd_link_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-default .sf-menu li li a, .dtr-menu-default .sf-menu .sub-menu li.current-menu-item li a, .dtr-menu-default .sf-menu li.current-menu-item li a, .dtr-menu-default .sf-menu ul li.current-menu-item a, .dtr-menu-default .sf-menu li li.current-menu-ancestor > a:hover'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_default_menu_dpd_hover_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Hover / Active Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-default .sf-menu .sub-menu li.current-menu-item li a:hover, .dtr-menu-default .sf-menu .sub-menu li.current-menu-item a, .dtr-menu-default .sf-menu li li.current-menu-ancestor > a, .dtr-menu-default .sf-menu ul li a:hover, .dtr-menu-default .sf-menu ul li:hover > a, .dtr-menu-default .sf-menu ul li:hover > a::after, .dtr-menu-default .sf-menu > li li.menu-item-has-children a:hover'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),

            // info
            array(
				'id'    => 'mellow_info_alt_menu_color_settings',
				'type'  => 'info',
                'title' => esc_html__( 'Alt Menu Color Settings', 'mellow' ),
                'desc' =>  wp_kses( __('<strong>This is menu ---> on page scroll</strong>', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
             array(
				'id'       => 'mellow_alt_menu_link_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Link colors', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-menu-alt .sf-menu li a' ),
			),
            array(
				'id'          => 'mellow_alt_menu_active_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Active Link Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-alt .sf-menu li.current-menu-item a, .dtr-menu-alt .sf-menu li.current-menu-ancestor > a, .dtr-menu-alt .sf-menu .active'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
			array(
				'id'          => 'mellow_alt_menu_link_icon_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Icon For Link With Dropdown Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-alt .sf-menu>li.menu-item-has-children>a::after'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_alt_menu_dpd_bg_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown - Background Color', 'mellow' ),
                'output'      => array(
					'background-color' => '.dtr-menu-alt .sf-menu ul',
				),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_alt_menu_dpd_link_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-alt .sf-menu li li a, .dtr-menu-alt .sf-menu .sub-menu li.current-menu-item li a, .dtr-menu-alt .sf-menu li.current-menu-item li a, .dtr-menu-alt .sf-menu ul li.current-menu-item a, .dtr-menu-alt .sf-menu li li.current-menu-ancestor > a:hover'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_alt_menu_dpd_hover_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Hover / Active Color', 'mellow' ),
                'output'      => array(
                    'color' => '.dtr-menu-alt .sf-menu .sub-menu li.current-menu-item li a:hover, .dtr-menu-alt .sf-menu .sub-menu li.current-menu-item a, .dtr-menu-alt .sf-menu li li.current-menu-ancestor > a, .dtr-menu-alt .sf-menu ul li a:hover, .dtr-menu-alt .sf-menu ul li:hover > a, .dtr-menu-alt .sf-menu ul li:hover > a::after, .dtr-menu-alt .sf-menu > li li.menu-item-has-children a:hover'
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
        ),
	)
);