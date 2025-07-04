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
		'title'      => esc_html__( 'Blog Typography', 'mellow' ),
		'id'         => 'mellow_blog_typography_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(

            array(
				'id'    => 'mellow_info_archive_posts_typo',
				'type'  => 'info',
                'title' => esc_html__( 'For Posts on - Blog Main Page / Archives Pages', 'mellow' ),
			),
            array(
				'id'                => 'mellow_archive_post_title_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Post Title', 'mellow' ),
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
				'output'            => array( '.dtr-archive-post-title, .dtr-archive-post-title a' ),
			),
            array(
				'id'                => 'mellow_archive_meta_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Meta', 'mellow' ),
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
				'output'            => array( '.dtr-entry-meta, .wp-block-latest-posts__post-author, .wp-block-latest-posts__post-date' ),
			),
            array(
				'id'          => 'mellow_archive_meta_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Meta: Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-entry-meta, .dtr-entry-meta a, .wp-block-latest-posts__post-author, .wp-block-latest-posts__post-date',
				),
			),
            array(
				'id'          => 'mellow_archive_meta_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Meta: Hover Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-entry-meta a:hover',
				),
			),
			// category
			array(
				'id'                => 'mellow_archive_cat_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Category', 'mellow' ),
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
                'color'             => true,
				'output'            => array( '.dtr-entry-meta .dtr-meta-category a' ),
			),
			array(
				'id'          => 'mellow_archive_cat_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category: Hover Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-entry-meta . dtr-meta-category a:hover',
				),
			),
			array(
				'id'          => 'mellow_archive_cat_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-entry-meta .dtr-meta-category a',
				),
			),
            array(
				'id'          => 'mellow_archive_cat_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category Hover: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-entry-meta .dtr-meta-category a:hover',
				),
			),
			array(
				'id'          => 'mellow_archive_cat_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category: Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-entry-meta .dtr-meta-category a',
				),
			),
            array(
				'id'          => 'mellow_archive_cat_hover_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category Hover: Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-entry-meta .dtr-meta-category a:hover',
				),
			),
			//archive cat
            array(
				'id'    => 'mellow_info_single_post_typo',
				'type'  => 'info',
                'title' => esc_html__( 'For : Single Post', 'mellow' ),
			),
            array(
				'id'                => 'mellow_single_post_title_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Post Title', 'mellow' ),
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
				'output'            => array( '.dtr-single-post-title.dtr-page-title' ),
			),
            array(
				'id'                => 'mellow_single_meta_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Meta', 'mellow' ),
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
				'output'            => array( '.dtr-single-meta' ),
			),
            array(
				'id'          => 'mellow_single_meta_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Meta: Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-single-meta, .dtr-single-meta .dtr-meta-item a',
				),
			),
            array(
				'id'          => 'mellow_single_meta_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Meta: Hover Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-single-meta .dtr-meta-item a:hover',
				),
			),		
			// single category
			array(
				'id'                => 'mellow_single_cat_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Category', 'mellow' ),
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
                'color'             => true,
				'output'            => array( '.dtr-single-meta .dtr-meta-category a' ),
			),
			array(
				'id'          => 'mellow_single_cat_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category: Hover Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-single-meta .dtr-meta-category a:hover',
				),
			),
			array(
				'id'          => 'mellow_single_cat_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-single-meta .dtr-meta-category a',
				),
			),
            array(
				'id'          => 'mellow_single_cat_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category Hover: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-single-meta .dtr-meta-category a:hover',
				),
			),
			array(
				'id'          => 'mellow_single_cat_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category: Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-single-meta .dtr-meta-category a',
				),
			),
            array(
				'id'          => 'mellow_single_cat_hover_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Category Hover: Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-single-meta .dtr-meta-category a:hover',
				),
			),
			//single cat	
            array(
				'id'    => 'mellow_info_sm_post_title',
				'type'  => 'info',
                'title' => esc_html__( 'Single Post Title - Sizes For Small Screens', 'mellow' ),
				'desc'  =>  wp_kses( __('Set only if required', 'mellow'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            array(
				'id'       => 'mellow_sm_post_title_size',
				'type'     => 'text',
				'title'    => esc_html__( 'Font Size', 'mellow' ),
				'subtitle' => esc_html__( 'Make sure to give unit like px,em,rem', 'mellow' ),
				'desc'     => esc_html__( 'Example: 16px', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'       => 'mellow_sm_post_title_lh',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Height', 'mellow' ),
				'default'  => '',
			),
            array(
				'id'    => 'mellow_info_single_meta_title',
				'type'  => 'info',
                'title' => esc_html__( 'All Meta titles', 'mellow' ),
                'subtitle' => esc_html__( 'This will work for titles to meta - date (e.g.published on), author (e.g. article by), tags and share', 'mellow' ),
			),
            array(
				'id'                => 'mellow_single_meta_title_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Font Settings', 'mellow' ),
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
				'output'            => array( '.dtr-meta-title' ),
			),
            array(
				'id'    => 'mellow_info_comment_section',
				'type'  => 'info',
                'title' => esc_html__( 'Comment Section', 'mellow' ),
			),
            array(
				'id'                => 'mellow_blog_comment_heading_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Comment Section Title', 'mellow' ),
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
				'output'            => array( '.comments-title, .comment-reply-title' ),
			),
            array(
				'id'          => 'mellow_blog_cancel_reply_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Cancel Reply Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '#cancel-comment-reply-link',
				),
			),
            array(
				'id'                => 'mellow_blog_comment_meta_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Comment Meta Data', 'mellow' ),
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
				'output'            => array( '.dtr-comment-date, .comment-edit-link' ),
			),
            array(
				'id'          => 'mellow_blog_comment_meta_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Comment Meta Data: Hover Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-comment-date:hover, .comment-edit-link:hover',
				),
			),
            array(
				'id'    => 'mellow_info_tags_settings',
				'type'  => 'info',
                'title' => esc_html__( 'Post Tags / Tagcloud Tags', 'mellow' ),
			),
            array(
				'id'                => 'mellow_tags_typo',
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
				'output'            => array( '.wp-block-tag-cloud a, .dtr-meta-tags a' ),
			),
            array(
				'id'       => 'mellow_tags_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Color', 'mellow' ),
                'active'   => false,
				'output'   => array( '.wp-block-tag-cloud a, .dtr-meta-tags a' ),
			),
			array(
				'id'          => 'mellow_tags_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.wp-block-tag-cloud a, .dtr-meta-tags a',
				),
			),
			array(
				'id'          => 'mellow_tags_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'On hover: Background Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.wp-block-tag-cloud a:hover, .dtr-meta-tags a:hover',
				),
			),
			array(
				'id'          => 'mellow_tags_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.wp-block-tag-cloud a, .dtr-meta-tags a',
				),
			),
			array(
				'id'          => 'mellow_tags_hover_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'On hover: Border Color', 'mellow' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.wp-block-tag-cloud a:hover, .dtr-meta-tags a:hover',
				),
			),
		),
	)
);