<?php
/**
 * Template for displaying archive content
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<?php if ( true == mellow_get_theme_option( 'mellow_blog_page_excerpt_enable', true ) ) { ?>
<div class="dtr-entry-excerpt clearfix">
    <?php mellow_excerpt( array(
		'length' => mellow_archive_excerpt_length(),
	) ); ?>
</div>
<?php } ?>
<?php
	// page numbers
	wp_link_pages( array(
		'before'      => '<span class="clearfix"></span><div class="dtr-page-links">' . esc_html__( 'Pages:', 'mellow' ),
		'after'       => '</div>',
		'link_before' => '<span class="dtr-page-number">',
		'link_after'  => '</span>',
	) );