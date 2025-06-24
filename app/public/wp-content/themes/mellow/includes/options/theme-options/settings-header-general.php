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
		'id'         => 'mellow_header_general_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            // info
            array(
				'id'    => 'mellow_info_header_layout',
				'type'  => 'info',
                'title' => esc_html__( 'Global - Default Header Layout', 'mellow' ),
				'desc'  => wp_kses( __('<strong>This will be applied all over the site</strong>', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            // layout
            array(
				'id'       => 'mellow_header_layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Change - Header Layout', 'mellow' ),
				'options'  => array(
                    'header-v1'	=> esc_html__( 'Style 1 - Classic', 'mellow' ),
		            'header-v2'	=> esc_html__( 'Style 2 - Left Menu', 'mellow' ),
		            'header-v3'	=> esc_html__( 'Style 3 - Top Fixed', 'mellow' ),
					'header-v4'	=> esc_html__( 'Style 4 - Space Between', 'mellow' ),
				),
				'default'  => 'header-v1',
			),
            // info
            array(
				'id'    => 'mellow_enable_header_elements',
				'type'  => 'info',
                'title' => esc_html__( 'Enable / Disable Header elements', 'mellow' ),
                'desc'  => wp_kses( __('Elements are - <strong>available / unavailable</strong> as per the - <strong>Header Variation - selected</strong>', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            array(
				'id'       => 'mellow_header_menubar_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Menubar', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_header_button_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Button in Header', 'mellow' ),
				'default'  => false,
			),
            array(
				'id'       => 'mellow_header_search_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Search Icon', 'mellow' ),
				'default'  => false,
			),
			array(
				'id'            => 'mellow_header_search_mleft',
				'type'          => 'spacing',
				'output'        => array( '.dtr-search-modal-trigger' ),
				'mode'          => 'margin',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'top'           => false,
                'bottom'        => false,
				'display_units' => true,
				'title'         => esc_html__( 'Margin Left/ Right to Search Icon', 'mellow' ),
				'desc'          => esc_html__( 'Provide only if required, like in case hiding widget area.', 'mellow' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
            array(
				'id'       => 'mellow_topbar_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Topbar', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'    => 'mellow_info_header_widgets',
				'type'  => 'info',
                'title'  => wp_kses( __('Header widgets areas are placed as per header variation.<br>Header widgets will show up only if widgets are added in resp  widget area. Add widgets in respective widget area if required', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
                  'desc' => wp_kses( sprintf( __('<a href="%s" target="_blank">Click to add widgets</a>', 'mellow'), esc_url( admin_url( '/widgets.php' ) ) ), array( 'a' => array( 'href' => array(), 'class' => array(), 'target' => array() ), )),
			),

            array(
				'id'       => 'mellow_header_widget_area_one_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Header Widget Area - One', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_header_widget_area_two_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Header Widget Area - Two', 'mellow' ),
				'default'  => true,
			),
            array(
				'id'       => 'mellow_header_widget_area_three_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Header Widget Area - Three', 'mellow' ),
				'default'  => true,
			),
		),
	)
);