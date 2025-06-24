<?php
/**
 * Template for main blog layout - standard
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
while ( have_posts() ) : the_post();
	get_template_part( '/template-parts/post/entry/entry-layout' );
endwhile;