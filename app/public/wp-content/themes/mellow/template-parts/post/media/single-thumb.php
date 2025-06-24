<?php
/**
 * The Image for post
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( true == mellow_get_theme_option( 'mellow_single_image_enable', true ) ) { ?>
	<div class="dtr-single-thumb <?php echo esc_attr( mellow_get_theme_option( 'mellow_single_image_corner', 'dtr-radius--rounded' ) ) ?>">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
<?php }