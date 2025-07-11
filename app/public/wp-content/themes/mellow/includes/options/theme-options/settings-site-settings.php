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
		'title'      => esc_html__( 'Logo / Favicon', 'mellow' ),
		'id'         => 'mellow_site_settings',
        'icon'       => 'dashicons dashicons-welcome-view-site',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'       => 'mellow_info_site_identity',
				'type'     => 'info',
                'style'    => 'success',
                'title'    => esc_html__( 'Logo and Favicon needs to be set via customizer in - Site Identity', 'mellow' ),

			),
            array(
                'id'       => 'mellow_info_site_identity1',
                'type'     => 'info',
                'style'    => 'success',
                'title' => esc_html__( 'Rest all global settings are - here - in theme options panel.', 'mellow' ),
            ),
            array(
				'id'       => 'mellow_info_site_identity_button',
				'type'     => 'info',
                'title' => wp_kses( sprintf( __('<a class="button button-primary" href="%s" target="_blank">Click To - Set Logo and Favicon</a>', 'mellow'), esc_url( admin_url( '/customize.php?autofocus[section]=title_tagline' ) ) ), array( 'a' => array( 'href' => array(), 'class' => array(), 'target' => array() ), )),
                'desc' => wp_kses( __('<br>Above button will take you to the customizer logo section directly.<br>By any chance if it does not work, please find the logo settings here: <strong>Appearance > Customize > Site Identity</strong><br><a href="https://knowledgebase.tanshcreative.com/logo-settings/" target="_blank">Check help document if required</a>', 'mellow'), array( 'a' => array( 'href' => array(), 'target' => array(), ), 'br' => array(), 'strong' => array(), ) ),
			),

             // info
            array(
				'id'    => 'mellow_info_logo_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Typography for: Text Logo / Text next to Image Logo', 'mellow' ),
			),
            array(
				'id'                => 'mellow_logo_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Default Logo', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
				'letter-spacing'    => true,
				'text-transform'    => true,
                'units'             => 'px',
				'output'            => array( '.logo-default, .logo-default:hover' ),
			),
            array(
				'id'                => 'mellow_logo_alt_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Alt Logo', 'mellow' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
				'letter-spacing'    => true,
				'text-transform'    => true,
                'units'             => 'px',
				'output'            => array( '.logo-alt, .logo-alt:hover' ),
			),

        ),
	)
);