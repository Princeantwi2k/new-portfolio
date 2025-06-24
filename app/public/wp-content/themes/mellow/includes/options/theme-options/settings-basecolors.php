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
		'title'      => esc_html__( 'Theme Base Colors', 'mellow' ),
		'id'         => 'mellow_themebase_colors',
        'icon'       => 'dashicons dashicons-admin-appearance',
		'desc'       => '',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'    => 'mellow_info_main_base_colors',
				'type'  => 'info',
                'title' => esc_html__( 'Main Base Colors', 'mellow' ),
                'subtitle' => esc_html__( 'Used for backgrounds', 'mellow' ),
			),
            // color one
            array(
                'id'                => 'mellow_base_color_primary',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Dark', 'mellow' ),
                'options'       => array(
                    'show_buttons' => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,
            ),
            // color three
            array(
                'id'                => 'mellow_base_color_tertiary',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Semi Dark', 'mellow' ),
                'options'           => array(
                    'show_buttons'  => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,
            ),
            // color two
            array(
                'id'                => 'mellow_base_color_secondary',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Light', 'mellow' ),
                'options'           => array(
                    'show_buttons'  => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,
            ),
            array(
				'id'       => 'mellow_info_border_colors',
				'type'     => 'info',
                'title'    => esc_html__( 'Common Border Color', 'mellow' ),
			),
            array(
                'id'                => 'mellow_borders_color',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Main Border Color', 'mellow' ),
                'options'       => array(
                    'show_buttons' => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,
            ),
             array(
				'id'       => 'mellow_info_common_text_colors',
				'type'     => 'info',
                'title'    => esc_html__( 'Basic Text Colors', 'mellow' ),
                'subtitle' => esc_html__( 'If needed, can be overridden individually for body, headings, links etc. in respective section.', 'mellow' ),
			),
            array(
				'id'          => 'mellow_text_color_one',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color - Dark', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_text_color_two',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color - Light', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'mellow_text_color_three',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color - Gray', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
			),
            // ends
		),
	)
);