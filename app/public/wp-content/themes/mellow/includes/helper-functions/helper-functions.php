<?php
/**
 * Theme helper functions
 *
 * @package MellowTheme
 * @version 1.0.0
 */

/**
 * Flush rewrite rules for custom post types on theme activation
 */
add_action( 'after_switch_theme', 'mellow_rewrite_rules_flush' );
if ( ! function_exists( 'mellow_rewrite_rules_flush' ) ) {
    function mellow_rewrite_rules_flush() {
         flush_rewrite_rules();
    }
}

/**
 * Modify category widget
 */
if ( ! function_exists( 'mellow_categories_postcount_filter' ) ) {
	function mellow_categories_postcount_filter ( $in ) {
	  $out = preg_replace( '/<\/a> \(([0-9]+)\)/', ' <span class="dtr-post-count">(\\1)</span></a>', $in );
	  return $out;
	}
	add_filter('wp_list_categories','mellow_categories_postcount_filter');
}

/**
 * Modify archive widget
 */
if ( ! function_exists( 'mellow_archives_postcount_filter' ) ) {
	function mellow_archives_postcount_filter( $in ) {
		if ( false !== strpos( $in, '<li>' ) ) {
			$out = preg_replace( '/<\/a>&nbsp;\(([0-9]+)\)/', ' <span class="dtr-post-count">(\\1)</span></a>', $in );
			return $out;
		}
		return $in;
	}
	add_filter( 'get_archives_link', 'mellow_archives_postcount_filter' );
}


/**
 * Wrap current page in span for wp_link_pages
 */
if ( ! function_exists( 'mellow_wp_link_pages_wrap' ) ) {
	function mellow_wp_link_pages_wrap( $link ) {
		if ( ctype_digit( $link ) ) {
			return '<span class="page-link-current">' . $link . '</span>';
		}
		return $link;
	}
	add_filter( 'wp_link_pages_link', 'mellow_wp_link_pages_wrap' );
}

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'mellow_sanitize_checkbox' ) ) {
	function mellow_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
} // mellow_sanitize_checkbox

/**
 * Sanitize select
 */
if ( ! function_exists( 'mellow_sanitize_select' ) ) {
	function mellow_sanitize_select( $input, $setting ){
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

/**
 * Sanitize image upload
 */
if ( ! function_exists( 'mellow_sanitize_image' ) ) {
	function mellow_sanitize_image( $file, $setting ) {

		//allowed file types
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png'
		);

		//check file type from file name
		$file_ext = wp_check_filetype( $file, $mimes );

		//if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
}

// core plugin update notice
if ( ! function_exists( 'mellow_core_update_admin_notice' ) ) {
	function mellow_core_update_admin_notice() {
		if ( is_admin() ) {
			if( !function_exists('get_plugin_data') ){
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			if ( !class_exists( 'dtr_mellow_core' ) ) return;
			$mellow_core_plugin_dir = WP_PLUGIN_DIR . '/dtr-mellow-core/dtr-mellow-core.php';
			$mellow_core_plugin_data = get_plugin_data($mellow_core_plugin_dir);
			$mellow_core_plugin_version = $mellow_core_plugin_data['Version'];
			if ( $mellow_core_plugin_version < MELLOW_CORE_PLUGIN_CURRENT_VERSION ) { ?>
				<div class="notice notice-error"><p><?php _e( '<strong>Important</strong> : Update mellow Core Plugin. Go To : Appearance / Install Plugins', 'mellow' ); ?></p></div>
			<?php }
		}
	}
}
add_action( 'admin_notices', 'mellow_core_update_admin_notice' );

// elementor addon plugin update notice
if ( ! function_exists( 'mellow_elementor_addon_update_admin_notice' ) ) {
	function mellow_elementor_addon_update_admin_notice() {
		if ( is_admin() ) {
			if( !function_exists('get_plugin_data') ){
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			if ( !class_exists( '\mellowAddons\mellow_Elementor_Addons' ) ) return;
			$mellow_elementor_addon_plugin_dir = WP_PLUGIN_DIR . '/dtr-mellow-elementor-addon/dtr-mellow-elementor.php';
			$mellow_elementor_addon_plugin_data = get_plugin_data($mellow_elementor_addon_plugin_dir);
			$mellow_elementor_addon_plugin_version = $mellow_elementor_addon_plugin_data['Version'];
			if ( $mellow_elementor_addon_plugin_version < MELLOW_ELEMENTOR_ADDON_PLUGIN_CURRENT_VERSION ) { ?>
            	<div class="notice notice-error"><p><?php _e( '<strong>Important</strong> : Update mellow Elementor Addons Plugin Plugin. Go To : Appearance / Install Plugins', 'mellow' ); ?></p></div>
			<?php }
		}
	}
}
add_action( 'admin_notices', 'mellow_elementor_addon_update_admin_notice' );

// import Notice
if ( ! function_exists( 'mellow_demo_import_notice' ) ) {
    function mellow_demo_import_notice() {
        if ( true == mellow_get_theme_option( 'mellow_demo_import_notification_enable', true ) ) {
        ?>
        <div class="notice notice-error is-dismissible dtr-import-notice">
            <h4><?php _e( '** Theme SetUp Guide for New Buyers **', 'mellow' ); ?></h4>
            <h5><?php _e( 'Step 1: Install All Required / Recommended Plugins', 'mellow' ); ?></h5>
          <p><?php _e( 'There is a link to install plugins in below Notice OR <strong>Visit : Appearance > Install Plugins</strong>', 'mellow' ); ?></p>
            <h5><?php _e( 'Step 2: Import Theme Demo Data', 'mellow' ); ?></h5>
            <p><?php _e( 'As WordPress Themes do not carry data with them...Import Demo Data to make your link look like Theme Demo.<br> <strong>Visit : Appearance > Import Theme Demo Data</strong><br>You need - One Click Demo Import Plugin - active to see this option. This plugin is already in recommeded list, so will get install along with other plugins (in step 1).', 'mellow' ); ?></h5>
            <h5><?php _e( 'Step 3: Online Help Documentation', 'mellow' ); ?></h5>
            <p><?php _e( 'Find online help document here : <br><a class="button button-primary" href="https://docs.tanshcreative.com" target="_blank">Online Help Documentation</a>', 'mellow' ); ?></p>
            <h5><?php _e( 'Step 4: Disable this Notification', 'mellow' ); ?></h5>
            <p><?php _e( 'If you have finished importing demo data...<strong>Permanently Disable</strong> this Demo Import and Import Plugin Install Notice via theme options: <strong>Theme Options > Demo Notification</strong>', 'mellow' ); ?></h5><br>
        </div>
        <?php
        }
    }
    add_action( 'admin_notices', 'mellow_demo_import_notice' );
}

// admin styles
if ( true == mellow_get_theme_option( 'mellow_demo_import_notification_enable', true ) ) {
	if ( ! function_exists( 'mellow_import_notice_admin_css' ) ) {
		function mellow_import_notice_admin_css() {
		  echo '<style>
			.dtr-import-notice { background-color: #f6f7f6; border-color: #f6f7f6; border-left-color: #000; color: #000; }
			.dtr-import-notice h4 { font-size: 1.4em; }
			.dtr-import-notice h5 { font-size: 1.2em; margin-top: 30px; margin-bottom: 10px; }
			.dtr-import-notice p { font-size: 1em; }
			.dtr-import-notice .button { margin-top: 10px; }
            .wp-block-heading, .wp-block-spacer, .wp-block-paragraph { background-color: #ddd; }
		  </style>';
		}
		add_action('admin_head', 'mellow_import_notice_admin_css');
	}
}