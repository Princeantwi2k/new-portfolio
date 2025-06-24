<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 *
 * @package MellowTheme
 * @version 1.0.0
 */
get_header();
if( is_active_sidebar('widgets-page') ) {
	$mellow_default_layout_class = mellow_get_layout_class();
} else {
 	$mellow_default_layout_class = 'dtr-fullwidth';
} ?>
<div id="dtr-main-wrapper" class="container clearfix <?php echo esc_attr( $mellow_default_layout_class ); ?>">
    <main id="dtr-primary-section" class="dtr-content-area">
        <?php while (have_posts()) : the_post(); ?>
        <div class="dtr-primary-section--content">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php
						// page numbers
						wp_link_pages( array(
							'before'      => '<span class="clearfix"></span><div class="dtr-page-links">' . esc_html__( 'Pages:', 'mellow' ),
							'after'       => '</div>',
							'link_before' => '<span class="dtr-page-number">',
							'link_after'  => '</span>',
						) );
					?>
                </div>
            </article>
            <?php if ( true == mellow_get_theme_option( 'mellow_enable_page_comments', true ) ) { ?>
            <div class="clearfix"></div>
            <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
            <?php } ?>
        </div>
        <?php endwhile; ?>
    </main>
    <!-- #dtr-primary-section -->
    <?php if( is_active_sidebar('widgets-page') ) {
	 get_sidebar(); } ?>
</div>
<!-- #dtr-main-wrapper -->
<?php get_footer();