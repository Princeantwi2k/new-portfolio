<?php
/**
 * Template for main blog layout - grid / masonry
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if (! defined('ABSPATH')) {
	exit;
}  ?>
<div class="dtr-post-grid">
    <?php
    while (have_posts()) : the_post();
        // Wrap each post in the correct markup
        ?>
        <div class="dtr-post-item">
            <div class="dtr-post-item__content-wrapper <?php echo esc_attr( mellow_get_theme_option( 'mellow_blog_entry_corner', 'dtr-radius--rounded' ) ) ?>">
                <?php get_template_part('/template-parts/post/entry/entry-layout-masonry', get_post_format()); ?>
            </div>
            <?php 
            // Only add a divider if this isn't the last post
            if ($wp_query->post_count > $wp_query->current_post + 1) : ?>
                <div class="dtr-post-divider clearfix"></div>
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</div>