<?php
/**
 * Plugin Name: Mellow Core
 * Description: Creates Shortcodes and Custom Post Types
 * Version:     1.0.0
 * Author:      tansh
 * Author URI:  https://wrapbootstrap.com/user/tansh
 * Text Domain: mellow
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once( plugin_dir_path( __FILE__ ) . 'class-dtr-mellow-core.php' );
dtr_mellow_core::get_instance();