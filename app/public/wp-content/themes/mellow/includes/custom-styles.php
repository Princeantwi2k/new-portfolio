<?php
/**
 * Custom styles through options panel
 *
 * @package MellowTheme
 * @version 1.0.0
 */
if ( ! function_exists( 'mellow_custom_inline_styles' ) ) :
	function mellow_custom_inline_styles() {
		wp_enqueue_style( 'mellow-inline-style', get_template_directory_uri() . '/assets/css/custom_script.css' );

		//variables
		$mellow_custom_css_output = $mellow_page_title_style =  $page_title_size = $page_title_lh = $sm_post_title_size = $sm_post_title_lh = $sm_page_title_size =  $sm_page_title_lh = $sm_page_title_size_output = $sm_post_title_size_output = $h1_mobile_size  = $h1_mobile_lh = $h2_mobile_size  = $h2_mobile_lh  = $h3_mobile_size  = $h3_mobile_lh = $h4_mobile_size  = $h4_mobile_lh = $h5_mobile_size  = $h5_mobile_lh = $h6_mobile_size  = $h6_mobile_lh = $base_color_primary = $base_color_secondary = $base_color_tertiary = $text_color_one = $text_color_two = $text_color_three = $border_color = $body_font_size = $body_line_height = $h1_font_size = $h1_line_height = $h2_font_size = $h2_line_height = $h3_font_size = $h3_line_height = $h4_font_size = $h4_line_height = $h5_font_size = $h5_line_height = $h6_font_size = $h6_line_height = $theme_base_colors_output = $page_title_sm_top_padding = $page_title_sm_bottom_padding = $footer_main_sm_top_padding = $footer_main_sm_bottom_padding = $xl_container_width = $sm_screen_output = $md_screen_output = $xl_screen_output = '';

        $base_color_primary    = mellow_get_theme_option( 'mellow_base_color_primary', '', 'rgba');
        $base_color_secondary  = mellow_get_theme_option( 'mellow_base_color_secondary', '', 'rgba');
        $base_color_tertiary   = mellow_get_theme_option( 'mellow_base_color_tertiary', '', 'rgba');
        $text_color_one   = mellow_get_theme_option( 'mellow_text_color_one', '', 'rgba');
        $text_color_two   = mellow_get_theme_option( 'mellow_text_color_two', '', 'rgba');
        $text_color_three = mellow_get_theme_option( 'mellow_text_color_three', '', 'rgba');
        $border_color     = mellow_get_theme_option( 'mellow_borders_color', '', 'rgba');
        $body_font_size   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_body_font_size' ));
        $body_line_height = wp_strip_all_tags(mellow_get_theme_option( 'mellow_body_line_height'));
        $h1_font_size     = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h1_font_size'));
        $h1_line_height   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h1_line_height'));
        $h2_font_size     = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h2_font_size'));
        $h2_line_height   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h2_line_height'));
        $h3_font_size     = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h3_font_size'));
        $h3_line_height   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h3_line_height'));
        $h4_font_size     = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h4_font_size'));
        $h4_line_height   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h4_line_height'));
        $h5_font_size     = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h5_font_size'));
        $h5_line_height   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h5_line_height'));
        $h6_font_size     = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h6_font_size'));
        $h6_line_height   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h6_line_height'));
        $page_title_size    = wp_strip_all_tags(mellow_get_theme_option( 'mellow_page_title_font_size'));
        $page_title_lh      = wp_strip_all_tags(mellow_get_theme_option( 'mellow_page_title_line_height'));
        $sm_post_title_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_sm_post_title_size'));
        $sm_post_title_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_sm_post_title_lh'));
        $sm_page_title_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_sm_page_title_size'));
        $sm_page_title_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_sm_page_title_lh'));
        $h1_mobile_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h1_size_mobile'));
        $h1_mobile_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h1_lh_mobile'));
        $h2_mobile_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h2_size_mobile'));
        $h2_mobile_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h2_lh_mobile'));
        $h3_mobile_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h3_size_mobile'));
        $h3_mobile_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h3_lh_mobile'));
        $h4_mobile_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h4_size_mobile'));
        $h4_mobile_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h4_lh_mobile'));
        $h5_mobile_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h5_size_mobile'));
        $h5_mobile_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h5_lh_mobile'));
        $h6_mobile_size = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h6_size_mobile'));
        $h6_mobile_lh   = wp_strip_all_tags(mellow_get_theme_option( 'mellow_h6_lh_mobile'));
        $xl_container_width = wp_strip_all_tags(mellow_get_theme_option( 'mellow_xl_container_width' ));
        $page_title_sm_top_padding = wp_strip_all_tags(mellow_get_theme_option( 'mellow_page_title_sm_top_padding' ));
        $page_title_sm_bottom_padding = wp_strip_all_tags(mellow_get_theme_option( 'mellow_page_title_sm_bottom_padding' ));
        $footer_main_sm_top_padding = wp_strip_all_tags(mellow_get_theme_option( 'mellow_footer_main_sm_top_padding' ));
        $footer_main_sm_bottom_padding = wp_strip_all_tags(mellow_get_theme_option( 'mellow_footer_main_sm_bottom_padding' ));

        //theme base colors
        if ( is_string($base_color_primary) && $base_color_primary != '' ) {
            $base_color_primary_output = '--dtr-base-color-dark: ' . $base_color_primary . ';';
        } else {
            $base_color_primary_output = '';
        }

        if ( is_string($base_color_secondary) && $base_color_secondary != '' ) {
            $base_color_secondary_output = '--dtr-base-color-light: ' . $base_color_secondary . ';';
        } else {
            $base_color_secondary_output = '';
        }

        if ( is_string($base_color_tertiary) && $base_color_tertiary != '' ) {
            $base_color_tertiary_output = '--dtr-base-color-semidark: ' . $base_color_tertiary . ';';
        } else {
            $base_color_tertiary_output = '';
        }

        if ( is_string($text_color_one) && $text_color_one != '' ) {
            $text_color_one_output = '--dtr-text-color-dark: ' . $text_color_one . ';';
        } else {
            $text_color_one_output = '';
        }

        if ( is_string($text_color_two) && $text_color_two != '' ) {
            $text_color_two_output = '--dtr-text-color-light: ' . $text_color_two . ';';
        } else {
            $text_color_two_output = '';
        }

        if ( is_string($text_color_three) && $text_color_three != '' ) {
            $text_color_three_output = '--dtr-text-color-gray: ' . $text_color_three . ';';
        } else {
            $text_color_three_output = '';
        }

        if ( is_string($border_color) && $border_color != '' ) {
            $border_color_output = '--dtr-border-color-main: ' . $border_color . ';';
        } else {
            $border_color_output = '';
        }

        //collective output
        if ( $base_color_primary != '' || $base_color_secondary != '' || $base_color_tertiary != '' || $text_color_one != '' || $text_color_two != '' || $border_color != '' ) {
        $theme_base_colors_output .= ':root { ' . $base_color_primary_output . $base_color_secondary_output . $base_color_tertiary_output . $text_color_one_output . $text_color_two_output . $text_color_three_output . $border_color_output . ' }';
        }

        //body
        if ( $body_font_size != '' && $body_line_height != '' ) {
            $body_font_size_output = 'body {font-size: ' . $body_font_size . ';line-height: ' . $body_line_height . ';}';
        } elseif ( $body_font_size != '' && $body_line_height == '' ) {
            $body_font_size_output = 'body {font-size: ' . $body_font_size . ';}';
        } elseif ( $body_font_size == '' && $body_line_height != '' ) {
            $body_font_size_output = 'body {line-height: ' . $body_line_height . ';}';
        } else {
            $body_font_size_output = '';
        }

        //h1
        if ( $h1_font_size != '' && $h1_line_height != '' ) {
            $h1_font_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_font_size . ';line-height: ' . $h1_line_height . ';}';
        } elseif ( $h1_font_size != '' && $h1_line_height == '' ) {
            $h1_font_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_font_size . ';}';
        } elseif ( $h1_font_size == '' && $h1_line_height != '' ) {
            $h1_font_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {line-height: ' . $h1_line_height . ';}';
        } else {
            $h1_font_size_output = '';
        }

        //h2
        if ( $h2_font_size != '' && $h2_line_height != '' ) {
            $h2_font_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_font_size . ';line-height: ' . $h2_line_height . ';}';
        } elseif ( $h2_font_size != '' && $h2_line_height == '' ) {
            $h2_font_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_font_size . ';}';
        } elseif ( $h2_font_size == '' && $h2_line_height != '' ) {
            $h2_font_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {line-height: ' . $h2_line_height . ';}';
        } else {
            $h2_font_size_output = '';
        }

        //h3
        if ( $h3_font_size != '' && $h3_line_height != '' ) {
            $h3_font_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_font_size . ';line-height: ' . $h3_line_height . ';}';
        } elseif ( $h3_font_size != '' && $h3_line_height == '' ) {
            $h3_font_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_font_size . ';}';
        } elseif ( $h3_font_size == '' && $h3_line_height != '' ) {
            $h3_font_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {line-height: ' . $h3_mobile_lh . ';}';
        } else {
            $h3_font_size_output = '';
        }

          //h4
        if ( $h4_font_size != '' && $h4_line_height != '' ) {
            $h4_font_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_font_size . ';line-height: ' . $h4_line_height . ';}';
        } elseif ( $h4_font_size != '' && $h4_line_height == '' ) {
            $h4_font_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_font_size . ';}';
        } elseif ( $h4_font_size == '' && $h4_line_height != '' ) {
            $h4_font_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {line-height: ' . $h4_line_height . ';}';
        } else {
            $h4_font_size_output = '';
        }

        //h5
        if ( $h5_font_size != '' && $h5_line_height != '' ) {
            $h5_font_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_font_size . ';line-height: ' . $h5_line_height . ';}';
        } elseif ( $h5_font_size != '' && $h5_line_height == '' ) {
            $h5_font_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_font_size . ';}';
        } elseif ( $h5_font_size == '' && $h5_line_height != '' ) {
            $h5_font_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {line-height: ' . $h5_line_height . ';}';
        } else {
            $h5_font_size_output = '';
        }

        //h6
        if ( $h6_font_size != '' && $h6_line_height != '' ) {
            $h6_font_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_font_size . ';line-height: ' . $h6_line_height . ';}';
        } elseif ( $h6_font_size != '' && $h6_line_height == '' ) {
            $h6_font_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_font_size . ';}';
        } elseif ( $h6_font_size == '' && $h6_line_height != '' ) {
            $h6_font_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {line-height: ' . $h6_line_height . ';}';
        } else {
            $h6_font_size_output = '';
        }

        //page title
        if ( $page_title_size != '' && $page_title_lh != '' ) {
            $page_title_size_output = '.dtr-page-title {font-size: ' . $page_title_size . ';line-height: ' . $page_title_lh . ';}';
        } elseif ( $page_title_size != '' && $page_title_lh == '' ) {
            $page_title_size_output = '.dtr-page-title {font-size: ' . $page_title_size . ';}';
        } elseif ( $page_title_size == '' && $page_title_lh != '' ) {
            $page_title_size_output = '.dtr-page-title {line-height: ' . $page_title_lh . ';}';
        } else {
            $page_title_size_output = '';
        }

        //sm post title
        if ( $sm_post_title_size != '' && $sm_post_title_lh != '' ) {
            $sm_post_title_size_output = '.dtr-single-post-title.dtr-page-title {font-size: ' . $sm_post_title_size . '!important;line-height: ' . $sm_post_title_lh . '!important;}';
        } elseif ( $sm_post_title_size != '' && $sm_post_title_lh == '' ) {
            $sm_post_title_size_output = '.dtr-single-post-title.dtr-page-title {font-size: ' . $sm_post_title_size . '!important;}';
        } elseif ( $sm_post_title_size == '' && $sm_post_title_lh != '' ) {
            $sm_post_title_size_output = '.dtr-single-post-title.dtr-page-title {line-height: ' . $sm_post_title_lh . '!important;}';
        } else {
            $sm_post_title_size_output = '';
        }

        //sm page title
        if ( $sm_page_title_size != '' && $sm_page_title_lh != '' ) {
            $sm_page_title_size_output = '.dtr-page-title {font-size: ' . $sm_page_title_size . '!important;line-height: ' . $sm_page_title_lh . '!important;}';
        } elseif ( $sm_page_title_size != '' && $sm_page_title_lh == '' ) {
            $sm_page_title_size_output = '.dtr-page-title {font-size: ' . $sm_page_title_size . '!important;}';
        } elseif ( $sm_page_title_size == '' && $sm_page_title_lh != '' ) {
            $sm_page_title_size_output = '.dtr-page-title {line-height: ' . $sm_page_title_lh . '!important;}';
        } else {
            $sm_page_title_size_output = '';
        }

        //h1 mobile
        if ( $h1_mobile_size != '' && $h1_mobile_lh != '' ) {
            $h1_mobile_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_mobile_size . '!important;line-height: ' . $h1_mobile_lh . '!important;}';
        } elseif ( $h1_mobile_size != '' && $h1_mobile_lh == '' ) {
            $h1_mobile_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_mobile_size . '!important;}';
        } elseif ( $h1_mobile_size == '' && $h1_mobile_lh != '' ) {
            $h1_mobile_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {line-height: ' . $h1_mobile_lh . '!important;}';
        } else {
            $h1_mobile_size_output = '';
        }

        //h2 mobile
        if ( $h2_mobile_size != '' && $h2_mobile_lh != '' ) {
            $h2_mobile_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_mobile_size . '!important;line-height: ' . $h2_mobile_lh . '!important;}';
        } elseif ( $h2_mobile_size != '' && $h2_mobile_lh == '' ) {
            $h2_mobile_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_mobile_size . '!important;}';
        } elseif ( $h2_mobile_size == '' && $h2_mobile_lh != '' ) {
            $h2_mobile_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {line-height: ' . $h2_mobile_lh . '!important;}';
        } else {
            $h2_mobile_size_output = '';
        }

        //h3 mobile
        if ( $h3_mobile_size != '' && $h3_mobile_lh != '' ) {
            $h3_mobile_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_mobile_size . '!important;line-height: ' . $h3_mobile_lh . '!important;}';
        } elseif ( $h3_mobile_size != '' && $h3_mobile_lh == '' ) {
            $h3_mobile_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_mobile_size . '!important;}';
        } elseif ( $h3_mobile_size == '' && $h3_mobile_lh != '' ) {
            $h3_mobile_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {line-height: ' . $h3_mobile_lh . '!important;}';
        } else {
            $h3_mobile_size_output = '';
        }

        //h4 mobile
        if ( $h4_mobile_size != '' && $h4_mobile_lh != '' ) {
            $h4_mobile_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_mobile_size . '!important;line-height: ' . $h4_mobile_lh . '!important; }';
        } elseif ( $h4_mobile_size != '' && $h4_mobile_lh == '' ) {
            $h4_mobile_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_mobile_size . '!important;}';
        } elseif ( $h4_mobile_size == '' && $h4_mobile_lh != '' ) {
            $h4_mobile_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {line-height: ' . $h4_mobile_lh . '!important;}';
        } else {
            $h4_mobile_size_output = '';
        }

        //h5 mobile
        if ( $h5_mobile_size != '' && $h5_mobile_lh != '' ) {
            $h5_mobile_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_mobile_size . '!important;line-height: ' . $h5_mobile_lh . '!important;}';
        } elseif ( $h5_mobile_size != '' && $h5_mobile_lh == '' ) {
            $h5_mobile_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_mobile_size . '!important;}';
        } elseif ( $h5_mobile_size == '' && $h5_mobile_lh != '' ) {
            $h5_mobile_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {line-height: ' . $h5_mobile_lh . '!important;}';
        } else {
            $h5_mobile_size_output = '';
        }

        //h6 mobile
        if ( $h6_mobile_size != '' && $h6_mobile_lh != '' ) {
            $h6_mobile_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_mobile_size . '!important;line-height: ' . $h6_mobile_lh . '!important;}';
        } elseif ( $h6_mobile_size != '' && $h6_mobile_lh == '' ) {
            $h6_mobile_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_mobile_size . '!important;}';
        } elseif ( $h6_mobile_size == '' && $h6_mobile_lh != '' ) {
            $h6_mobile_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {line-height: ' . $h6_mobile_lh . '!important;}';
        } else {
            $h6_mobile_size_output = '';
        }

        //page title padding
        if ( $page_title_sm_top_padding != '' && $page_title_sm_bottom_padding != '' ) {
            $page_title_sm_spacing_output = '.dtr-page-title--section {padding-top: ' . $page_title_sm_top_padding . '!important; padding-bottom: ' . $page_title_sm_bottom_padding . '!important;}';
        } elseif ( $page_title_sm_top_padding != '' && $page_title_sm_bottom_padding == '' ) {
            $page_title_sm_spacing_output = '.dtr-page-title--section {padding-top: ' . $page_title_sm_top_padding . '!important;}';
        } elseif ( $page_title_sm_top_padding == '' && $page_title_sm_bottom_padding != '' ) {
            $page_title_sm_spacing_output = '.dtr-page-title--section {padding-bottom: ' . $page_title_sm_bottom_padding . '!important;}';
        } else {
            $page_title_sm_spacing_output = '';
        }

        //footer main row padding
        if ( $footer_main_sm_top_padding != '' && $footer_main_sm_bottom_padding != '' ) {
            $footer_main_sm_spacing_output = '.dtr-footer-row {padding-top: ' . $footer_main_sm_top_padding . '!important; padding-bottom: ' . $footer_main_sm_bottom_padding . '!important;}';
        } elseif ( $footer_main_sm_top_padding != '' && $footer_main_sm_bottom_padding == '' ) {
            $footer_main_sm_spacing_output = '.dtr-footer-row {padding-top: ' . $footer_main_sm_top_padding . '!important;}';
        } elseif ( $footer_main_sm_top_padding == '' && $footer_main_sm_bottom_padding != '' ) {
            $footer_main_sm_spacing_output = '.dtr-footer-row {padding-bottom: ' . $footer_main_sm_bottom_padding . '!important;}';
        } else {
            $footer_main_sm_spacing_output = '';
        }

        // xl screen size
        if ( is_string($xl_container_width) && $xl_container_width != '' ) {
            $xl_screen_output .= '@media (min-width: 1400px) { .container { max-width: '. $xl_container_width . '; } .elementor-section.elementor-section-boxed > .elementor-container, .e-con{ --container-max-width: '. $xl_container_width . '; } }';
        }

        // medium screen size
        if ( $page_title_sm_spacing_output != '' || $footer_main_sm_spacing_output != '' ) {
            $md_screen_output .= '@media (max-width: 992px) { ' . $page_title_sm_spacing_output . ' ' . $footer_main_sm_spacing_output . ' }';
        }

        // small screen size
        if ( $sm_post_title_size_output != '' || $sm_page_title_size_output != '' ||  $h1_mobile_size_output != '' || $h2_mobile_size_output != '' || $h3_mobile_size_output != '' || $h4_mobile_size_output != '' || $h5_mobile_size_output != '' || $h6_mobile_size_output != '' ) {
            $sm_screen_output .= '@media (max-width: 782px) { ' . $sm_post_title_size_output . $sm_page_title_size_output . $h1_mobile_size_output . $h2_mobile_size_output . $h3_mobile_size_output . $h4_mobile_size_output . $h5_mobile_size_output . $h6_mobile_size_output . ' }';
        }

		// page title background styles
		$bg_image 					= '';
		$bg_image_style 			= '';
		$bg_image       			= get_post_meta( get_the_ID(), '_mellow_page_header_bg_image', true );
		$bg_image_style 			= get_post_meta( get_the_ID(), '_mellow_page_header_bg_image_style', true );

		// Background image
		if ( $bg_image ) {
			if ( $bg_image_style == 'repeat' || $bg_image_style == '' ) {
				$mellow_page_title_style .= '.dtr-page-title-main { background: url('.  esc_url( $bg_image ) .') repeat !important; }';
			}
			if ( $bg_image_style == 'stretched' ) {
				$mellow_page_title_style .= '.dtr-page-title-main { background: url('. esc_url( $bg_image ) .') no-repeat center center !important; background-size: cover !important; }';
			}
			if ( $bg_image_style == 'fixed' ) {
				$mellow_page_title_style .= '.dtr-page-title-main { background: url('.  esc_url( $bg_image ) .') no-repeat center center fixed  !important; background-size: cover !important; }';
			}
		}
		// page title background styles

		// final custom css output
		$mellow_custom_css_output = '' . $theme_base_colors_output . '' . $body_font_size_output . '' . $h1_font_size_output . '' . $h2_font_size_output . '' . $h3_font_size_output . '' . $h4_font_size_output . '' . $h5_font_size_output . '' . $h6_font_size_output . '' . $page_title_size_output . '' . $mellow_page_title_style . '' . $sm_screen_output .'' . $md_screen_output .''. $xl_screen_output .'';

		wp_add_inline_style( 'mellow-inline-style', $mellow_custom_css_output );
	}
endif;
add_action( 'wp_enqueue_scripts', 'mellow_custom_inline_styles', 30 );