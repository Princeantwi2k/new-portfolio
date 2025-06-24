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
		'title'      => esc_html__( 'Main Blog Page / Archives', 'mellow' ),
		'id'         => 'mellow_blog_general_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'mellow_blog_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Page Title Text', 'mellow' ),
				'default'  => esc_html__( 'Blog', 'mellow' ),
			),
            // info
            array(
				'id'   => 'mellow_info_blog_page_layout',
				'type' => 'info',
                'title'    => esc_html__( 'Blog Main Page and Archives Pages Layout', 'mellow' ),
			),
            // page layout
            array(
                'id'       => 'mellow_blog_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Change Layout', 'mellow' ),
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
                'default' => 'dtr-right-sidebar',
            ),
            array(
				'id'   => 'mellow_info_blog_posts_layout',
				'type' => 'info',
                'title'    => esc_html__( 'Posts Layout Style', 'mellow' ),
				'desc' => wp_kses( __('Choose how posts are arranged on blog and archives pages', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
             array(
				'id'       => 'mellow_blog_entry_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Change - Posts Layout Style', 'mellow' ),
				'options'  => array(
					'dtr-blog-default' 				=> esc_html__('Default', 'mellow'),
		            'dtr-blog-grid-masonry'			=> esc_html__('Masonry Grid - 2 column', 'mellow'),
                    'dtr-blog-grid-fitrows'			=> esc_html__('Grid - 2 column', 'mellow'),
                    'dtr-blog-grid-masonry-3col'	=> esc_html__('Masonry Grid - 3 column', 'mellow'),
                    'dtr-blog-grid-fitrows-3col'    => esc_html__('Grid - 3 column', 'mellow'),
				),
				'default'  => 'dtr-blog-default',
			  ),
			  array(
                'id'       => 'mellow_blog_entry_corner',
                'type'     => 'select',
                'title'    => esc_html__( 'Corner Style', 'mellow' ),
                'options'  => array(
                    'dtr-radius--rounded'   => esc_html__( 'Rounded Corners', 'mellow' ),
                    'dtr-radius--default'	=> esc_html__( 'Default', 'mellow' ),
                ),
                'default'  => 'dtr-radius--rounded',
             ),
              array(
				'id'   => 'mellow_info_blog_enable_elements',
				'type' => 'info',
                'title'    => esc_html__( 'Enable / Disable Elements', 'mellow' ),
                'subtitle' => esc_html__( 'Will work for elements on blog and archive pages. Settings for single posts are separate.', 'mellow' ),
			  ),
              array(
				'id'       => 'mellow_archive_image_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Featured Image', 'mellow' ),
				'default'  => true,
			  ),
              array(
				'id'       => 'mellow_blog_page_date_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Date', 'mellow' ),
				'default'  => true,
			  ),
              array(
				'id'       => 'mellow_blog_page_author_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Author', 'mellow' ),
				'default'  => true,
			  ),
              array(
				'id'       => 'mellow_blog_page_category_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Category', 'mellow' ),
				'default'  => true,
			  ),
              array(
				'id'       => 'mellow_blog_page_excerpt_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Excerpt', 'mellow' ),
				'default'  => true,
			  ),
              array(
				'id'       => 'mellow_get_archive_excerpt_length',
				'type'     => 'text',
				'title'    => esc_html__( 'Excerpt Length', 'mellow' ),
				'subtitle' => wp_kses( __('If excerpt is provided in excerpt box it will be displayed by default irrespective of excerpt length settings<br><br><strong>40 or any other number&nbsp;&nbsp;</strong> - To show that much words<br><strong>1&nbsp;&nbsp;&nbsp;&nbsp;</strong> - For complete post content<br><strong>999</strong> - For upto more tag - Default', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
				'validate' => array( 'numeric' ),
				'default'  => '999',
			  ),
              array(
				'id'       => 'mellow_read_more_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Read more link', 'mellow' ),
				'default'  => true,
			  ),
              array(
				'id'       => 'mellow_read_more_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Read more link text', 'mellow' ),
				'default'  => esc_html__( 'Continue Reading', 'mellow' ),
			  ),

		),
	)
);