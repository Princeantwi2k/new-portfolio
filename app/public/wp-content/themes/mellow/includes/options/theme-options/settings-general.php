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
		'id'         => 'mellow_general_settings',
        'icon'       => 'el el-cogs',
		'subsection' => false,
		'fields'     => array(           
			// body bg
			array(
				'id'          => 'mellow_body_background_color',
				'type'        => 'color_rgba',
				'title'       => esc_html__( 'Body Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
                'options'       => array(
                    'show_buttons' => false,
                ),
				'output'      => array(
					'background-color' => 'body',
				),
			),
			// info
			array(
				'id'   => 'mellow_info_custom_cursor',
				'type' => 'info',
                'title'    => esc_html__( 'Custom Styled Cursor', 'mellow' ),
			),
            array(
				'id'       => 'mellow_enable_custom_cursor',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Custom Styled Cursor', 'mellow' ),
				'default'  => true,
			),
			array(
				'id'          => 'mellow_custom_cursor_color',
				'type'        => 'color_rgba',
				'title'       => esc_html__( 'Cursor Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
                'options'       => array(
                    'show_buttons' => false,
                ),
				'output'      => array(
					'background-color' => '.dtr-cursor',
				),
			),
			// info
            array(
				'id'   => 'mellow_info_page_padding',
				'type' => 'info',
                'title'    => '',
				'desc' => wp_kses( __('<strong>Keep these blank</strong> unless required to change theme defaults.', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            // padding to pages
			array(
				'id'            => 'mellow_padding_pages',
				'type'          => 'spacing',
				'output'        => array( '#dtr-main-wrapper' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,
                'left'          => false,
				'display_units' => true,
				'title'         => esc_html__( 'Padding to Non Elementor Pages', 'mellow' ),
				'desc'          => esc_html__( 'This will work only for Non Eementor pages', 'mellow' ),
				'default'       => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				),
			),
            // padding to single posts
			array(
				'id'            => 'mellow_padding_posts',
				'type'          => 'spacing',
				'output'        => array( '.single.single-post #dtr-main-wrapper' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,
                'left'          => false,
				'display_units' => true,
				'title'         => esc_html__( 'Padding to Single Posts', 'mellow' ),
				'desc'          => esc_html__( 'This will work for single posts', 'mellow' ),
				'default'       => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				),
			),
            // padding to elementor posts
            array(
				'id'            => 'mellow_padding_elementor_posts',
				'type'          => 'spacing',
				'output'        => array( '.elementor-default.elementor-page.single-post #dtr-main-wrapper' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,
                'left'          => false,
				'display_units' => true,
				'title'         => esc_html__( 'Padding to Elementor Single Posts', 'mellow' ),
				'desc'          => esc_html__( 'This will work for single posts edited with elementor', 'mellow' ),
				'default'       => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				),
			),
            // info
            array(
				'id'   => 'mellow_info_page_layout',
				'type' => 'info',
                'title'    => esc_html__( 'Global - Default Page Layout', 'mellow' ),
				'desc' => wp_kses( __('<strong>It is advisable to keep it default i.e. Full Width.</strong> Change only if some other layout is required all over the site.', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            // page layout
            array(
                'id'       => 'mellow_page_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Change - Default Page Layout', 'mellow' ),
                'subtitle' => wp_kses( __('If need different layout just for any specific page(s), can be done in the settings of respective page.', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),

                'options'  => array(
                    'dtr-fullwidth'  => array(
                        'alt' => esc_html__( 'Full Width', 'mellow' ),
                        'img' => get_template_directory_uri() . '/assets/images/full-width.png',
                    ),
                    'dtr-right-sidebar'  => array(
                        'alt' => esc_html__( 'Right Sidebar', 'mellow' ),
                        'img' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                    ),
                    'dtr-left-sidebar'  => array(
                        'alt' => esc_html__( 'Left Sidebar', 'mellow' ),
                        'img' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                    ),

                ),
                'default' => 'dtr-fullwidth',
            ),
			// info
			array(
				'id'   => 'mellow_info_xl_container_width',
				'type' => 'info',
				'title'    => esc_html__( 'Container Width For Large Screens', 'mellow' ),
			),
			array(
				'id'       => 'mellow_xl_container_width',
				'type'     => 'text',
				'title'    => esc_html__( 'Width', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px. Provide only if necessary. Leave blank otherise.', 'mellow' ),
				'desc'     => esc_html__( 'Default: 1340px', 'mellow' ),
				'default'  => '',
			),
            // info
            array(
				'id'   => 'mellow_info_page_misc',
				'type' => 'info',
                'title'    => esc_html__( 'Others', 'mellow' ),
			),
            // comments on pages
            array(
				'id'       => 'mellow_enable_page_comments',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Comments on pages', 'mellow' ),
				'default'  => true,
			),
		),
	)
);