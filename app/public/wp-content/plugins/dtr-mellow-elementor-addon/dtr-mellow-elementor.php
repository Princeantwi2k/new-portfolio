<?php
/**
 * Plugin Name: Mellow Elementor Addons
 * Description: Adds custom elements for Mellow Theme via Elementor plugin.
 * Author:      tansh
 * Version:     1.0.0
 * Author URI:  https://wrapbootstrap.com/user/tansh
 * License:     GPL-2.0+
 * Text Domain: mellow
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define('MELLOW_ELEMENTOR_ADDONS_URL', plugin_dir_url(__FILE__));
define( 'MELLOW_ELEMENTOR_ADDONS_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Load the plugin after Elementor loaded.
 * @since 1.0.0
 */
function mellow_elementor_addons_load() {
	require( __DIR__ . '/class-dtr-mellow-elementor.php' );
}
add_action( 'plugins_loaded', 'mellow_elementor_addons_load' );

/**
 * Load the plugin text domain for translations.
 * @since 1.0.0
 */
function mellow_load_textdomain() {
    load_plugin_textdomain( 'mellow' );
}
add_action( 'init', 'mellow_load_textdomain' );