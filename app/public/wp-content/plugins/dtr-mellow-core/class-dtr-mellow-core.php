<?php
/* Set constant path to the plugin directory */
define( 'MELLOW_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

/* Set the constant path to the plugin directory URI */
define( 'MELLOW_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * dtr_mellow_core class.
 */
if( ! class_exists( 'dtr_mellow_core' ) ) {
class dtr_mellow_core {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 */
	protected $version = '1.0.0';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since   1.0.0
	 */
	protected $plugin_slug = 'mellow';

	/**
	 * Instance of this class.
	 *
     * @since   1.0.0
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since   1.0.0
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin
	 *
	 * @since   1.0.0
	 */
	private function __construct() {

		// Image Resizer
		require_once( MELLOW_DIR . 'includes/aq_resizer.php' );

		// Make shortcodes available
		require_once( MELLOW_DIR . 'includes/shortcodes.php' );

		// Make cpt available
		require_once( MELLOW_DIR . 'includes/cpt.php' );

		// Social share
		require_once( MELLOW_DIR . 'includes/share.php' );

		// Meta Boxes
		if ( file_exists(  MELLOW_DIR . '/includes/meta-box/init.php' ) ) {
			require_once  MELLOW_DIR . '/includes/meta-box/init.php';
		}
		require_once ( MELLOW_DIR . '/includes/metabox-config.php' );

		add_filter( 'the_content', array( $this, 'dtr_mellow_remove_sc_wrapping_spaces' ) );

		// Add scripts and styles
		//add_action( 'wp_enqueue_scripts', array( &$this, 'dtr_mellow_add_scripts' ) );
		//add_action( 'wp_enqueue_scripts', array( &$this, 'dtr_mellow_add_styles' ) );
		//add_action( 'admin_enqueue_scripts', array( &$this, 'load_admin_style' )  );

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since   1.0.0
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since   1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	// Remove spaces wrapping shortcodes
	function dtr_mellow_remove_sc_wrapping_spaces( $content ) {
		$array = array(
			'<p>[' => '[',
			']</p>' => ']',
			']<br>' => ']'
		);
		$content = strtr( $content, $array );
		return $content;
	}

	/**
	 *  Enqueue Javascript files
	 * @since   1.0.0
     */
	//function dtr_mellow_add_scripts() {
	//	}

	/**
     * Enqueue Style sheets
	 * @since   1.0.0
     */
	//function dtr_mellow_add_styles() {
	//	}

	//function load_admin_style() {
	//	}

 }
} // class dtr_mellow_core

// Shortcodes in excerpt
add_filter('get_the_excerpt', 'shortcode_unautop');
add_filter('get_the_excerpt', 'do_shortcode');

// Shortcodes in widget
add_filter('widget_text','do_shortcode');

/**
 * Author bios custom fields
 */
if ( ! function_exists( 'mellow_modified_authorbio_fields' ) ) :
function mellow_modified_authorbio_fields( $contact_methods ){
    $contact_methods['mellow_jobtitle'] = esc_html__('Job Title', 'mellow');
	$contact_methods['mellow_twitter'] 	= esc_html__('Twitter URL', 'mellow');
	$contact_methods['mellow_facebook']	= esc_html__('Facebook URL', 'mellow');
	$contact_methods['mellow_instagram']	= esc_html__('Instagram URL', 'mellow');
	$contact_methods['mellow_pinterest']	= esc_html__('Pinterest URL', 'mellow');
	$contact_methods['mellow_linkedin']	= esc_html__('Linkedin URL', 'mellow');
	$contact_methods['mellow_mail']		= esc_html__('Mail to URL', 'mellow');
	return $contact_methods;
}
endif;
add_filter('user_contactmethods', 'mellow_modified_authorbio_fields');
// mellow_modified_authorbio_fields

/**
 * Register widgets
 */
if ( ! function_exists('mellow_register_widgets') ) :
function mellow_register_widgets() {
  $mellow_widgets = array(
    'social'        => 'mellow_social_widget'
  );
  foreach ( $mellow_widgets as $key => $value ) {
	require_once( MELLOW_DIR . 'includes/widgets/' . sanitize_key( $key ) . '.php' );
    register_widget( $value );
  }
} // mellow_register_widgets
endif;
add_action( 'widgets_init', 'mellow_register_widgets' );