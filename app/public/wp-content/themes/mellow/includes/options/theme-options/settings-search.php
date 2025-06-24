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
		'title'      => esc_html__( 'Search Settings', 'mellow' ),
		'id'         => 'mellow_search_settings',
        'icon'       => 'dashicons dashicons-search',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'       => 'mellow_search_form_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Form Field Text', 'mellow' ),
				'default'  => esc_html__('Search...', 'mellow'),
			),
            array(
				'id'       => 'mellow_search_modal_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Modal Search Title', 'mellow' ),
				'default'  => esc_html__('What you are looking for?', 'mellow'),
			),
        ),
	)
);