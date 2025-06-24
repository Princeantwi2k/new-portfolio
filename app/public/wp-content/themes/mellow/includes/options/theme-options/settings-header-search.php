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
		'title'      => esc_html__( 'Search In Header', 'mellow' ),
		'id'         => 'mellow_header_search_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'mellow_header_search_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Icon Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-search-modal-trigger' ),
			),
            array(
				'id'    => 'mellow_info_headersearch_style',
				'type'  => 'info',
                'title' => esc_html__( 'Search Icon on - Header On Page Scroll', 'mellow' ),
			),
           array(
				'id'       => 'mellow_stheader_search_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Icon Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.header-fixed .dtr-search-modal-trigger' ),
			),

        ),
	)
);