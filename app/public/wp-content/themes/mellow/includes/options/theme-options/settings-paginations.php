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
		'title'      => esc_html__( 'Paginations', 'mellow' ),
		'id'         => 'mellow_paginations_settings',
        'icon'       => 'dashicons dashicons-ellipsis',
		'subsection' => false,
		'fields'     => array(

            array(
				'id'       => 'mellow_blog_archive_pagination_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Archive Pages Pagination Style', 'mellow' ),
				'options'  => array(
					'numbered' 	=> esc_html__('Default - Numbered', 'mellow'),
		            'nextprev'	=> esc_html__('Prev / Next', 'mellow'),
				),
				'default'  => 'numbered',
			),

            array(
				'id'   => 'mellow_info_numbered_pager',
				'type' => 'info',
                'title'    => esc_html__( 'Archive - Number / Arrow Pager', 'mellow' ),
			),
            array(
				'id'          => 'mellow_archive_pager_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-number-nav__item a, .page-numbers.current, .dtr-arrow-nav__item a, .post-page-numbers',
				),
			),
			array(
				'id'          => 'mellow_archive_pager_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-number-nav__item a, .page-numbers.current, .dtr-arrow-nav__item a, .post-page-numbers',
				),
			),
            array(
				'id'          => 'mellow_archive_pager_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-number-nav__item a, .page-numbers.current, .dtr-arrow-nav__item a, .post-page-numbers',
				),
			),
            array(
				'id'          => 'mellow_archive_pager_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover / Active: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-number-nav .page-numbers.current, .dtr-number-nav__item a:hover,
.dtr-arrow-nav__item a:hover, .post-page-numbers:hover, .post-page-numbers.current',
				),
			),
			array(
				'id'          => 'mellow_archive_pager_hover_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover / Active: Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-number-nav .page-numbers.current, .dtr-number-nav__item a:hover,
.dtr-arrow-nav__item a:hover, .post-page-numbers:hover, .post-page-numbers.current',
				),
			),
            array(
				'id'          => 'mellow_archive_pager_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Hover / Active: Text Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-number-nav .page-numbers.current, .dtr-number-nav__item a:hover,
.dtr-arrow-nav__item a:hover, .post-page-numbers:hover, .post-page-numbers.current',
				),
			),
            array(
				'id'   => 'mellow_info_pager_single_post',
				'type' => 'info',
                'title'    => esc_html__( 'Single Post Pagination', 'mellow' ),
			),
			array(
				'id'       => 'mellow_prev_nav_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Previous Nav Text', 'mellow' ),
				'default'  => esc_html__( 'Previous', 'mellow' ),
			),
            array(
				'id'       => 'mellow_next_nav_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Next Nav Text', 'mellow' ),
				'default'  => esc_html__( 'Next', 'mellow' ),
			),
			array(
				'id'                => 'mellow_single_post_pager_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Font', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
				'letter-spacing'    => true,
                'font-size'         => true,
                'line-height'       => true,
				'text-transform'    => true,
                'units'             => 'px',
                'color'             => false,
				'output'            => array( '.dtr-single-post-nav a' ),
			),         
            array(
				'id'       => 'mellow_single_post_pager_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-single-post-nav a' ),
			),
            array(
				'id'                => 'mellow_single_post_pager_title_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Post Title in Pager', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
				'letter-spacing'    => true,
                'font-size'         => true,
                'line-height'       => true,
				'text-transform'    => true,
                'units'             => 'px',
                'color'             => false,
				'output'            => array( '.dtr-single-nav__post-title' ),
			),
            array(
				'id'       => 'mellow_single_post_pager_title_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Post Title in Pager - Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.dtr-single-nav__post-title' ),
			),
			array(
				'id'          => 'mellow_single_post_pager_icon_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Icon Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-single-nav__icon',
				),
			),
			array(
				'id'          => 'mellow_single_post_pager_icon_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Icon Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-single-nav__icon',
				),
			),
			array(
				'id'          => 'mellow_single_post_pager_icon_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Icon Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-single-nav__icon',
				),
			),
			array(
				'id'          => 'mellow_single_post_pager_icon_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'On hover: Icon Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-single-nav__prev:hover .dtr-single-nav__icon, .dtr-single-nav__next:hover .dtr-single-nav__icon',
				),
			),
			array(
				'id'          => 'mellow_single_post_pager_icon_hover_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'On hover: Icon Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-single-nav__prev:hover .dtr-single-nav__icon, .dtr-single-nav__next:hover .dtr-single-nav__icon',
				),
			),
			array(
				'id'          => 'mellow_single_post_pager_hover_icon_color',
				'type'        => 'color',
				'title'       => esc_html__( 'On hover: Icon Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-single-nav__prev:hover .dtr-single-nav__icon, .dtr-single-nav__next:hover .dtr-single-nav__icon',
				),
			),
		),
	)
);