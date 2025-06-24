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
		'title'      => esc_html__( 'Single Post', 'mellow' ),
		'id'         => 'mellow_blog_single_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
                'id'   => 'mellow_info_single_post_layout',
                'type' => 'info',
                'title'    => esc_html__( 'Single Post Layout', 'mellow' ),
                'subtitle' => esc_html__( 'Change only if some other layout is required for all single posts', 'mellow' ),
            ),
            // page layout
            array(
                'id'       => 'mellow_single_post_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Change Layout', 'mellow' ),
                'subtitle' => esc_html__( 'If need different layout just for any specific post(s), can be done in the settings of respective post.', 'mellow' ),
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
                'id'   => 'mellow_info_single_enable_elements',
                'type' => 'info',
                'title'    => esc_html__( 'Enable / Disable Elements', 'mellow' ),
            ),
            array(
                'id'       => 'mellow_single_image_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Featured Image', 'mellow' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mellow_single_image_corner',
                'type'     => 'select',
                'title'    => esc_html__( 'Featured Image Corners', 'mellow' ),
                'options'  => array(
                    'dtr-radius--rounded'   => esc_html__( 'Rounded Corners', 'mellow' ),
                    'dtr-radius--default'	=> esc_html__( 'Default', 'mellow' ),
                ),
                'default'  => 'dtr-radius--rounded',
            ),
            array(
                'id'       => 'mellow_single_date_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Date', 'mellow' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mellow_single_author_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Author', 'mellow' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mellow_single_category_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Category', 'mellow' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mellow_single_comment_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Comment Number', 'mellow' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mellow_single_tags_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'mellow' ),
                'default'  => true,
            ),
            array(
				'id'       => 'mellow_date_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Date Title', 'mellow' ),
				'default'  => esc_html__( '', 'mellow' ),
			),
            array(
				'id'       => 'mellow_tags_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Tags Title', 'mellow' ),
				'default'  => esc_html__( 'Tags:', 'mellow' ),
			),
            array(
				'id'       => 'mellow_author_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Author Title', 'mellow' ),
				'default'  => esc_html__( '', 'mellow' ),
			),
            array(
                'id'   => 'mellow_info_social_share',
                'type' => 'info',
                'title'    => esc_html__( 'Social Share', 'mellow' ),
            ),
            array(
                'id'       => 'mellow_social_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Share', 'mellow' ),
                'default'  => true,
            ),
            array(
				'id'       => 'mellow_share_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Share Title', 'mellow' ),
				'default'  => esc_html__( '', 'mellow' ),
			),
            array(
                'id'       => 'mellow_twitter_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Twitter in Share', 'mellow' ),
                'default'  => true,
            ),
            array(
				'id'       => 'mellow_twitter_handle_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Handle Text', 'mellow' ),
				'default'  => '',
			),
            array(
                'id'       => 'mellow_facebook_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Facebook in Share', 'mellow' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mellow_pinterest_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Pinterest in Share', 'mellow' ),
                'default'  => true,
            ),
            array(
                'id'       => 'mellow_googleplus_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Google in Share', 'mellow' ),
                'default'  => false,
            ),
            array(
                'id'       => 'mellow_linkedin_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Linkedin in Share', 'mellow' ),
                'default'  => false,
            ),

		),
	)
);