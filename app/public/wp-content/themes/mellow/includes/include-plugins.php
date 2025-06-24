<?php
defined( 'ABSPATH' ) || exit;
/**
 * Returns array of recommended plugins.
 */
function mellow_recommended_plugins() {
	$plugins = [];

	// Required Plugins.
	$plugins['dtr-mellow-core'] = [
		'name'               => 'Mellow Core',
		'slug'               => 'dtr-mellow-core',
		'version'            => MELLOW_CORE_PLUGIN_CURRENT_VERSION,
		'source'             => get_template_directory() . '/includes/plugins/dtr-mellow-core.zip',
		'required'           => true,
		'force_activation'   => false,
	];

	$plugins['dtr-mellow-elementor-addon'] = [
		'name'             => 'Mellow Elementor Addons',
		'slug'             => 'dtr-mellow-elementor-addon',
		'source'           => get_template_directory() . '/includes/plugins/dtr-mellow-elementor-addon.zip',
		'version'          => MELLOW_ELEMENTOR_ADDON_PLUGIN_CURRENT_VERSION,
		'required'         => true,
		'force_activation' => false,
	];

	$plugins['elementor'] = [
		'name'             => 'Elementor',
		'slug'             => 'elementor',
		'required'         => true,
		'force_activation' => false,
	];

    $plugins['redux-framework'] = [
		'name'             => 'Redux Framework',
		'slug'             => 'redux-framework',
		'required'         => true,
		'force_activation' => false,
	];

	$plugins['contact-form-7'] = [
		'name'             => 'Contact Form 7',
		'slug'             => 'contact-form-7',
		'required'         => false,
		'force_activation' => false,
	];


	if ( true == mellow_get_theme_option( 'mellow_demo_import_notification_enable', true ) ) {
		$plugins['one-click-demo-import'] = [
			'name'             => 'One Click Demo Import',
			'slug'             => 'one-click-demo-import',
			'required'         => false,
			'force_activation' => false,
		];
	}

	/**
	 * Filters the recommended plugins list.
	 *
	 * @param array $plugins
	 */
	$plugins = (array) apply_filters( 'mellow_recommended_plugins', $plugins );

	return $plugins;
}

/**
 * Register recommended plugins with the tgmpa script.
 */
if ( is_admin() ) {

	if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
		require_once ( get_template_directory() . '/includes/class-tgm-plugin-activation.php' );
	}

	function mellow_register_tgmpa() {
		$plugins = mellow_recommended_plugins();
		tgmpa( $plugins, [
			'id'           => 'mellow_theme',
			'domain'       => 'mellow',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'has_notices'  => true,
			'is_automatic' => true,
			'dismissable'  => true,
		] );
	}

	add_action( 'tgmpa_register', 'mellow_register_tgmpa' );
}