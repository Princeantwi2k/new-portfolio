<?php
/**
 * Search Modal
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$mellow_search_modal_title = mellow_get_theme_option('mellow_search_modal_title', esc_html__("What you are looking for?",'mellow')); ?>
<div class="dtr-search-modal form-light">
	<div class="dtr-modal-close"></div>
	<div class="dtr-modal-content clearfix">
		<h4 class="dtr-search-modal-title"><?php echo esc_html( $mellow_search_modal_title ); ?></h4>
		<?php get_search_form(); ?>
	</div>
</div>