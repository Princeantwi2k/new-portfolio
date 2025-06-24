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
		'title'      => esc_html__( '404 Page', 'mellow' ),
		'id'         => 'mellow_error_page_settings',
        'icon'       => 'dashicons dashicons-external',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'       => 'mellow_404_subtext',
				'type'     => 'text',
				'title'    => esc_html__( '404 Sub Text', 'mellow' ),
				'default'  => esc_html__('Oops...', 'mellow'),
			),
            array(
				'id'       => 'mellow_404_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Text', 'mellow' ),
				'default'  => esc_html__('We are sorry, but something went wrong.', 'mellow'),
			),
            array(
				'id'       => 'mellow_404_link_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Back to Home Link Text', 'mellow' ),
				'default'  => esc_html__('Back To Home', 'mellow'),
			),
        ),
	)
);