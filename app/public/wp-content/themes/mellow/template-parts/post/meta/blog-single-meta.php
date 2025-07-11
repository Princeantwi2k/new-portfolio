<?php
/**
 * Blog single post meta
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$date_title     =  mellow_get_theme_option('mellow_date_title_text', '');
$author_title   =  mellow_get_theme_option('mellow_author_title_text', ''); ?>
<?php if (  true == mellow_get_theme_option( 'mellow_single_date_enable', true ) || true == mellow_get_theme_option( 'mellow_single_category_enable', true ) || true == mellow_get_theme_option( 'mellow_single_author_enable', true ) || true == mellow_get_theme_option( 'mellow_single_comment_enable', true ) ) { ?>
<div class="dtr-meta dtr-single-meta dtr-single-post-meta">
    <?php
    if (has_category() && true == mellow_get_theme_option('mellow_single_category_enable', true)) { ?>
        <div class="dtr-meta-item dtr-meta-category">
            <?php the_category(' ', get_the_ID()); ?>
        </div>
    <?php } ?>
    <?php if (  true == mellow_get_theme_option( 'mellow_single_author_enable', true ) ) { ?>
    <div class="dtr-meta-item dtr-meta-author">
        <?php if ( $author_title != '' ) { ?>
        <span class="dtr-meta-author-title dtr-meta-title"><?php echo esc_html( $author_title ); ?></span>
        <?php } ?>
        <span class="vcard author"><span class="fn"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo esc_html( get_the_author() ) ?></a> </span></span> </div>
    <?php } ?>
    <?php if (  true == mellow_get_theme_option( 'mellow_single_date_enable', true ) ) { ?>
    <div class="dtr-meta-item dtr-meta-date">
        <?php if ( $date_title != '' ) { ?>
        <span class="dtr-meta-date-title dtr-meta-title"> <?php echo esc_html( $date_title ); ?></span>
        <?php } ?>
        <span class="entry-date updated"><?php echo esc_html( get_the_date() ); ?></span></div>
    <?php } ?>
    <?php if ( true == mellow_get_theme_option( 'mellow_single_comment_enable', true ) ) { ?>
    <div class="dtr-meta-item dtr-meta-comment">
        <?php comments_popup_link( esc_html__( '0 Comments', 'mellow' ), esc_html__( '1 Comment',  'mellow' ), esc_html__( '% Comments', 'mellow' ), 'dtr-comments-link' ); ?>
    </div>
    <?php } ?>
</div>
<?php }