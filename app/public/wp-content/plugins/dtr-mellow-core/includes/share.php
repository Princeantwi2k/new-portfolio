<?php
/**
 * Post Social share
 */
// Post Social share hook
function mellow_social_share_hook() {
	do_action( 'mellow_social_share_hook' );
}
add_action( 'mellow_social_share_hook', 'mellow_default_social_share_hook' );

if( ! function_exists( 'mellow_default_social_share_hook' ) ) {
	function mellow_default_social_share_hook() {
		mellow_social_share();
	}
}
// Social Share
if ( ! function_exists('mellow_social_share') ) {
	function mellow_social_share() {

    global $mellow_theme_mod;

	// vars
	$twitter_handle = $style = $share_title = '';
	$post_id 		= get_the_ID();
	$url      		= get_permalink( $post_id );
	$title    		= get_the_title();
	$twitter_handle	= isset($mellow_theme_mod['mellow_twitter_handle_text']) ? $mellow_theme_mod['mellow_twitter_handle_text'] : '';
    $share_title	= isset($mellow_theme_mod['mellow_share_title_text']) ? $mellow_theme_mod['mellow_share_title_text'] : '';
    $enable_twitter	   = isset($mellow_theme_mod['mellow_twitter_share_enable']) ? $mellow_theme_mod['mellow_twitter_share_enable'] : true;
    $enable_facebook   = isset($mellow_theme_mod['mellow_facebook_share_enable']) ? $mellow_theme_mod['mellow_facebook_share_enable'] : true;
    $enable_pinterest  = isset($mellow_theme_mod['mellow_pinterest_share_enable']) ? $mellow_theme_mod['mellow_pinterest_share_enable'] : true;
    $enable_googleplus = isset($mellow_theme_mod['mellow_googleplus_share_enable']) ? $mellow_theme_mod['mellow_googleplus_share_enable'] : false;
    $enable_linkedin   = isset($mellow_theme_mod['mellow_linkedin_share_enable']) ? $mellow_theme_mod['mellow_linkedin_share_enable'] : false;
	$excerpt 		= get_the_excerpt();
	?>
<div class="dtr-social-share">
    <?php if ( $share_title != '' ) { ?><span class="dtr-meta-title dtr-social-share-title"><?php echo esc_html($share_title) ?></span><?php } ?>
    <ul class="dtr-social clearfix">
        <?php if ( $enable_twitter == true ) { ?>
        <li><a href="https://twitter.com/share?text=<?php echo rawurlencode( $title ); ?>&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?><?php if ( $twitter_handle ) echo '&amp;via='. esc_attr( $twitter_handle ); ?>" title="<?php esc_html_e( 'Twitter', 'mellow' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-twitter"></a></li>
        <?php } ?>
         <?php if ( $enable_facebook == true ) { ?>
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( esc_url( $url ) ); ?>" title="<?php esc_html_e( 'Facebook', 'mellow' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-facebook"></a></li>
        <?php } ?>
        <?php if ( $enable_pinterest == true ) { ?>
        <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id ) ); ?>&amp;description=<?php echo rawurlencode( $title ); ?>" title="<?php esc_html_e( 'Pinterest', 'mellow' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-pinterest"></a></li>
        <?php } ?>
        <?php if ( $enable_googleplus == true ) { ?>
        <li><a href="https://plus.google.com/share?url=<?php echo rawurlencode( esc_url( $url ) ); ?>" title="<?php esc_html_e( 'Google+', 'mellow' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-google"></a></li>
        <?php } ?>
        <?php if ( $enable_linkedin == true ) { ?>
        <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;title=<?php echo rawurlencode( $title ); ?>&amp;summary=<?php echo rawurlencode( $excerpt ); ?>&amp;source=<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e( 'LinkedIn', 'mellow' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-linkedin"></a></li>
        <?php } ?>
    </ul>
</div>
<?php	}
}