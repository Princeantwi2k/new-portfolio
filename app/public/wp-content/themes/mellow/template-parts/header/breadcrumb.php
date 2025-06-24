<?php
/**
 * The Breadcrumb
 *
 * @package MellowTheme
 * @version 1.0.0
 */

if ( 'yoast-breadcrumb' == mellow_get_theme_option( 'mellow_breadcrumb_plugin', 'yoast-breadcrumb' ) && function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
} elseif( 'navxt-breadcrumb' == mellow_get_theme_option( 'mellow_breadcrumb_plugin', 'yoast-breadcrumb' ) && function_exists('bcn_display_list') ) { ?>
    <ul class="breadcrumbs">
        <?php bcn_display_list(); ?>
    </ul>
<?php } else {
}