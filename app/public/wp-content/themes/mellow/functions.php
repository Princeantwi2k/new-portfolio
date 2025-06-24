<?php
/**
 * Mellow WordPress Theme.
 * @package MellowTheme
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// included plugins current versions
define( 'MELLOW_CORE_PLUGIN_CURRENT_VERSION', '1.0.0' );
define( 'MELLOW_ELEMENTOR_ADDON_PLUGIN_CURRENT_VERSION', '1.0.0' );

if ( ! function_exists( 'mellow_theme_setup' ) ) :
/**
 * Theme setup
 */
function mellow_theme_setup() {

	// Makes theme available for translation.
	load_theme_textdomain( 'mellow', get_template_directory() . '/languages' );

	// Document title
	add_theme_support( 'title-tag' );

	// Logo support
	add_theme_support( 'custom-logo' );

	// Custom background
	add_theme_support( 'custom-background' );

    // Switches default core markup for below
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets', ) );

    // Adds thumbnail support
	add_theme_support( 'post-thumbnails' );

	// Set the default content width.
	$GLOBALS['content_width'] = 1320;

    // Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// wp_nav_menu() locations
    register_nav_menus( array(
        'primary_menu'		=> 'Primary Menu',
    ) );

	// Adds theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// editor style
	add_editor_style( 'assets/css/dtr-editor-style.css' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for Editor color palette.
	$dark   = '#0e0f0f';
	$white 	= '#ffffff';
	$gray   = '#bbbaa6';
	$accent = '#d8fe00';

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Dark', 'mellow' ),
				'slug'  => 'dark',
				'color' => $dark,
			),
			array(
				'name'  => esc_html__( 'White', 'mellow' ),
				'slug'  => 'white',
				'color' => $white,
			),
			array(
				'name'  => esc_html__( 'Mid Dark', 'mellow' ),
				'slug'  => 'gray',
				'color' => $gray,
			),
			array(
				'name'  => esc_html__( 'Accent', 'mellow' ),
				'slug'  => 'accent',
				'color' => $accent,
			),
		)
	);

	// Add custom editor font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => esc_html__( 'Extra small', 'mellow' ),
				'shortName' => esc_html_x( 'XS', 'Font size', 'mellow' ),
				'size'      => 10,
				'slug'      => 'extra-small',
			),
			array(
				'name'      => esc_html__( 'Small', 'mellow' ),
				'shortName' => esc_html_x( 'S', 'Font size', 'mellow' ),
				'size'      => 12,
				'slug'      => 'small',
			),
			array(
				'name'      => esc_html__( 'Normal', 'mellow' ),
				'shortName' => esc_html_x( 'M', 'Font size', 'mellow' ),
				'size'      => 18,
				'slug'      => 'normal',
			),
			array(
				'name'      => esc_html__( 'Large', 'mellow' ),
				'shortName' => esc_html_x( 'L', 'Font size', 'mellow' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html__( 'Extra large', 'mellow' ),
				'shortName' => esc_html_x( 'XL', 'Font size', 'mellow' ),
				'size'      => 40,
				'slug'      => 'extra-large',
			),
		)
	); // Add custom editor font sizes.

    // redux theme options
    require_once( get_template_directory() .'/includes/options/options-config.php' );

    // Ensure that Redux options are loaded into the global variable
    global $mellow_theme_mod;
    // Populate global variable with Redux options
    $mellow_theme_mod = get_option('mellow_theme_mod', []);
}
endif; // mellow_theme_setup
add_action( 'after_setup_theme', 'mellow_theme_setup' );

/**
 * Enqueue Plugins Scripts and Styles
 *
 */
if ( ! function_exists( 'mellow_plugin_scripts_styles' ) ) :
function mellow_plugin_scripts_styles() {

	// enqueue scripts
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing.js', array('jquery'), '1.3.0', true );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.js', array('jquery'), '3.0.6', true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), '1.0.10', true );
	wp_enqueue_script( 'hoverIntent', get_template_directory_uri() . '/assets/js/hoverIntent.js', array('jquery'), '1.10.1', true );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array('jquery'), '1.7.10', true );

	// enqueue styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'iconfont', get_template_directory_uri() . '/fonts/iconfont.css' );

	// comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
endif;
add_action( 'wp_enqueue_scripts', 'mellow_plugin_scripts_styles' );
// mellow_plugin_scripts_styles ends

// Retrieve theme option values
// should be always called before dependencies
if ( ! function_exists('mellow_get_theme_option') ) {
	function mellow_get_theme_option($id, $fallback = false, $param = false ) {
		global $mellow_theme_mod;
		if ( $fallback === false ) $fallback = '';
		$output = ( isset($mellow_theme_mod[$id]) && $mellow_theme_mod[$id] !== '' ) ? $mellow_theme_mod[$id] : $fallback;

		if ( isset($mellow_theme_mod[$id]) && is_array($mellow_theme_mod[$id]) && $param && isset($mellow_theme_mod[$id][$param]) ) {
			$output = $mellow_theme_mod[$id][$param];
		}

		return $output;
	}
}

/**
 * Enqueue Custom Scripts and Styles
 *
 */
if ( ! function_exists( 'mellow_custom_scripts_styles' ) ) :
function mellow_custom_scripts_styles() {

	// enqueue scripts
	wp_enqueue_script( 'mellow-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true );

	// enqueue main stylesheet and colors
	wp_enqueue_style( 'mellow-style', get_stylesheet_uri() );

	if( 'header-v1' == mellow_get_theme_option( 'mellow_header_layout', 'header-v1' ) ) {
		wp_register_style( 'mellow-header-v1', get_template_directory_uri() . '/assets/css/header-v1.css' );
		wp_enqueue_style( 'mellow-header-v1' );
	} elseif ( 'header-v2' == mellow_get_theme_option( 'mellow_header_layout', 'header-v1' ) ) {
		wp_register_style( 'mellow-header-v2', get_template_directory_uri() . '/assets/css/header-v2.css' );
		wp_enqueue_style( 'mellow-header-v2' );
	} elseif ( 'header-v3' == mellow_get_theme_option( 'mellow_header_layout', 'header-v1' ) ) {
		wp_register_style( 'mellow-header-v3', get_template_directory_uri() . '/assets/css/header-v3.css' );
		wp_enqueue_style( 'mellow-header-v3' );
	} elseif ( 'header-v4' == mellow_get_theme_option( 'mellow_header_layout', 'header-v1' ) ) {
		wp_register_style( 'mellow-header-v4', get_template_directory_uri() . '/assets/css/header-v4.css' );
		wp_enqueue_style( 'mellow-header-v4' );
    }

	// RTL support
	if ( is_rtl() ) {
 		wp_enqueue_style( 'mellow-rtl-style', get_template_directory_uri() . '/assets/css/rtl.css' );
	}

}
endif;
add_action( 'wp_enqueue_scripts', 'mellow_custom_scripts_styles', 20 );
// mellow_custom_scripts_styles ends

/**
 * Enqueue Custom Scripts and Styles Overrides
 *
 */
if ( ! function_exists( 'mellow_custom_scripts_override' ) ) :
function mellow_custom_scripts_override() {
	wp_enqueue_style( 'mellow-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
}
endif; // mellow_custom_scripts_styles
add_action( 'wp_enqueue_scripts', 'mellow_custom_scripts_override', 40 );
// mellow_custom_scripts_override ends

/**
 * Recommend plugins for this theme via TGMPA script
 */
if ( ! function_exists( 'mellow_plugin_setup' ) ) :
function mellow_plugin_setup() {
	require_once( get_template_directory() .'/includes/include-plugins.php' );
}
endif; // mellow_plugin_setup
add_action( 'after_setup_theme', 'mellow_plugin_setup' );

/**
 * Helper Functions
 */
require_once( get_template_directory() .'/includes/helper-functions/pagination.php' );
require_once( get_template_directory() .'/includes/helper-functions/helper-functions.php' );
require_once( get_template_directory() .'/includes/helper-functions/blog-functions.php' );
require_once( get_template_directory() .'/includes/helper-functions/excerpt.php' );

/**
 * Customizer
 */
require_once( get_template_directory() .'/includes/customizer/customizer.php' );

/**
 * Elementor Settings
 */
require_once( get_template_directory() .'/includes/helper-functions/elementor-settings.php' );

/**
 * Body / layout classes
 */
require_once( get_template_directory() .'/includes/body-classes.php' );
require_once( get_template_directory() .'/includes/layout.php' );
require_once( get_template_directory() .'/template-parts/page-title/page-header.php' );

/**
 * Sidebars / Widgets
 */
require_once( get_template_directory() .'/includes/widgets/sidebars.php' );

// Custom styles
require_once ( get_template_directory() . '/includes/custom-styles.php' );

/**
 * One page nav walker
 */
function mellow_one_page_nav_walker($output, $item, $depth, $args) {

	global $post;
	$front_id = get_option('page_on_front');

	if(is_object($post)) {

		$output = str_replace( 'http://frontpage_url/', get_permalink($front_id), $output);
		$output = str_replace( 'https://frontpage_url/', get_permalink($front_id), $output);
		$output = str_replace( get_permalink($post->ID).'#', '#', $output );

        // one page menu link
        if ( strpos( $output, '#' ) !== false ) {
            $current_url = get_permalink( $post->ID );

            if ( strpos( $output, $current_url ) !== false ) {
                $output = str_replace( $current_url . '/#', '#', $output );
            }
        }
	}
    return $output;
}
add_filter( 'walker_nav_menu_start_el', 'mellow_one_page_nav_walker', 10, 4);

/**
 * Custom callback function for comment display
 */
if( ! function_exists('mellow_comment' ) ) {
	function mellow_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>

<li class="post pingback">
	<p> <strong>
		<?php esc_html_e( 'Pingback:', 'mellow' ); ?>
		</strong>
		<?php comment_author_link(); ?>
		<?php edit_comment_link( esc_html__( 'Edit', 'mellow' ), '<span class="edit-link">', '</span>' ); ?>
	</p>
	<?php
			break;
			default :
		?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	<article id="div-comment-<?php comment_ID(); ?>" class="dtr-comment-body">
    <div class="dtr-comment-wrapper">
        <div class="dtr-comment-avatar vcard">
            <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size']); ?>
        </div>
        <div class="dtr-comment-content">
            <div class="dtr-comment-meta-wrapper">
            	<div class="dtr-comment-meta">
                    <h5 class="dtr-comment-meta-author">
                        <?php /* translators: %s: author. */
                            printf( wp_kses( __( '<cite class="fn custom-fn">%s</cite>', 'mellow' ), array( 'a' => array( 'href' => array() ) ) ), get_comment_author_link() ); ?>
                    </h5>
                    <a class="dtr-comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php  /* translators: 1: date, 2: time. */
                        printf( esc_html__( '%1$s at %2$s', 'mellow' ), get_comment_date(),  get_comment_time() ); ?>
                    </a>
                    <?php edit_comment_link( esc_html__( 'Edit', 'mellow' ), '<span>', '</span>'); ?>

                    </div>
            </div>
            <div class="dtr-comment-content-inner">
                <?php comment_text() ?>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                <p class="comment-awaiting-moderation">
                    <?php esc_html_e( 'Your comment is awaiting moderation.', 'mellow' ) ?>
                </p>
                <?php endif; ?>
            </div>
			<div class="dtr-reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
        </div>
    </div>
</article>
	<?php
		break;
		endswitch;
	}
} // end comment callback function

if ( ! function_exists( 'mellow_embed_allowed_tags' ) ) :
/**
 * Allowed tags for video / audio embed
 */
	function mellow_embed_allowed_tags() {
	$mellow_embed_allowed = array(
	'a' => array(
	'href' => array (),
	'title' => array ()),
	'b' => array(
	'style'=> array(),
	),
	);
	// iframe
	$mellow_embed_allowed['iframe'] = array(
	'src' => array(),
	'height' => array(),
	'width' => array(),
	'frameborder' => array(),
	'allowfullscreen' => array(),
	);
	// video
	$mellow_embed_allowed['video'] = array(
		'width' => true,
		'height' => true
	);
	// source
	$mellow_embed_allowed['source'] = array(
		'src' => true,
		'type' => true
	);
	return $mellow_embed_allowed;
	}
endif;

if ( ! function_exists( 'mellow_wp_kses_extended_ruleset' ) ) :
/**
 * For svg escaping
 */
function mellow_wp_kses_extended_ruleset() {
    $kses_defaults = wp_kses_allowed_html( 'post' );
    $svg_args = array(
        'svg'   => array(
            'class'           => true,
            'aria-hidden'     => true,
            'aria-labelledby' => true,
            'role'            => true,
            'xmlns'           => true,
            'width'           => true,
            'height'          => true,
            'viewbox'         => true, // <= Must be lower case!
        ),
        'g'     => array( 'fill' => true ),
        'title' => array( 'title' => true ),
        'path'  => array(
            'd'    => true,
            'fill' => true,
        ),
    );
    return array_merge( $kses_defaults, $svg_args );
}
endif;

/**
 *  Conatact form 7
 */
if ( ! function_exists( 'mellow_wpcf7_select' ) ) :
	function mellow_wpcf7_select($html) {
	$text = esc_html__( 'Please Select...', 'mellow' );
	$html = str_replace('---', '' . $text . '', $html);
	return $html;
	}
	add_filter('wpcf7_form_elements', 'mellow_wpcf7_select');
endif;

/**
 * mellow demo data import
 */
if ( ! function_exists( 'mellow_import_data' ) ) {
	function mellow_import_data() {
	  return array(
		array(
		  'import_file_name'             => esc_html__( 'Mellow Demo Data', 'mellow' ),
		  'local_import_file'            => get_template_directory() . '/includes/imports/content.xml',
          'local_import_redux'           => array(
            array(
                'file_path'   =>  get_template_directory() . '/includes/imports/redux.json',
                'option_name' => 'mellow_theme_mod',
            ),
          ),
		  'local_import_customizer_file' => get_template_directory() . '/includes/imports/customizer.dat',
		  'local_import_widget_file'     => get_template_directory() . '/includes/imports/widgets.wie',
		  'import_notice'                => wp_kses( __( '<span style="color: red"><strong>!! IMPORTANT !!</strong></span><br><br><strong>Make sure all the required / recommended plugins are Installed and Activated before demo import.</strong><br><br>After import, error log file may get generated. Minor errors like some media, sidebar,widget...failed to import...can be ignored.<br>Check if you have posts and pages imported fine.<br><br>============<br><br><strong>If demo import not working as expected</strong>...giving some error, internal server error or performed incomplete import;<br>Please ensure that the following <span style="color: red">both</span> limits are sufficient<br><br><strong>1. php memory limit (memory_limit)<br>2. WordPress memory limit (WP_MEMORY_LIMIT)</strong><br><a href="https://docs.tanshcreative.com/basic-wordpress-theme-plugin-requirements/" target="_blank"><span style="color: green">What these should be and How to check?</span></a><br><br>If demo import not working and you are not sure how to overcome....<strong>nothing to panic</strong><br>Just drop us a mail with your login details.<br><br>
			Once the demo is imported, you can effortlessly customize it with your content and have your beautiful website ready in no time.<br>A little patience now will lead to great results! :)<br><br><strong>Please understand that as it is a  server side issue and cannot be overcome via theme...we will need login details to check your setup.</strong>', 'mellow' ), array( 'span' => array('style' => array()), 'strong' => array(), 'br' => array(), 'a' => array( 'href' => array(), 'title' => array(), 'target' => array() ), ) ) // import notice
		),
	  );
	}
}
add_filter( 'ocdi/import_files', 'mellow_import_data' );

// After import
if ( ! function_exists( 'mellow_after_import_setup' ) ) {
	function mellow_after_import_setup() {
		// set menu
		$main_menu		= get_term_by( 'name', 'Primary Menu', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary_menu'		=> $main_menu->term_id,
			)
		);
		// set home and blog page
		$front_page_id = get_page_by_path( 'home' );
		$blog_page_id  = get_page_by_path( 'blog' );
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}
}
add_action( 'ocdi/after_import', 'mellow_after_import_setup' );

// Custom Header For Import
if ( ! function_exists( 'mellow_plugin_page_setup' ) ) {
	function mellow_plugin_page_setup( $default_settings ) {
		$default_settings['parent_slug'] = 'themes.php';
		$default_settings['page_title']  = esc_html__( 'Mellow Demo Import', 'mellow' );
		$default_settings['menu_title']  = esc_html__( 'Import Theme Demo Data', 'mellow' );
		$default_settings['capability']  = 'import';

		return $default_settings;
	}
}
add_filter( 'ocdi/plugin_page_setup', 'mellow_plugin_page_setup' );

// Branding
add_filter( 'ocdi/disable_pt_branding', '__return_true' );

// Import only original size images
add_filter( 'ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

// google fonts fallback
if ( ! function_exists( 'mellow_fallback_fonts_url' ) ) {
    function mellow_fallback_fonts_url() {
        $fonts_url = '';
        $font_families = array();
		$font_families[] = 'Mona Sans:400,500,600,700';
		$font_families[] = 'Syne:600';
        $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        );
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        return esc_url_raw( $fonts_url );
    }
}
// redux fallback
if ( ! function_exists( 'mellow_fallback_scripts_styles' ) ) {
    function mellow_fallback_scripts_styles() {
        if ( ! class_exists( 'Redux_Framework_Plugin' ) ) {
            wp_enqueue_style( 'mellow-fallback-font', mellow_fallback_fonts_url(), array(), null );
            wp_enqueue_style( 'redux-fallback', get_template_directory_uri() . '/assets/css/redux-fallback.css' );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'mellow_fallback_scripts_styles', 20 );

// set default page template
if ( ! function_exists( 'mellow_set_default_page_template' ) ) {
    function mellow_set_default_page_template( $template ) {
        if ( is_page() ) {
            $elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );
            if ( empty( $elementor_page ) ) {
                $template = get_template_directory() . '/page.php';
            } else {
                $template = get_template_directory() . '/template-fullwidth.php';
            }
        }
        return $template;
    }
}
add_filter( 'template_include', 'mellow_set_default_page_template' );