<?php
/**
 * The template file for single post
 *
 * @package MellowTheme
 * @version 1.0.0
 */
get_header();
if (is_active_sidebar('widgets-blog')) {
    $mellow_default_layout_class = mellow_get_layout_class();
} else {
    $mellow_default_layout_class = 'dtr-fullwidth';
}
$tags_title    = mellow_get_theme_option('mellow_tags_title_text', 'Tags:');
?>
<div id="dtr-main-wrapper" class="container clearfix <?php echo esc_attr($mellow_default_layout_class) ?>">
    <main id="dtr-primary-section" class="dtr-content-area">
        <?php
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (! post_password_required()) :
                    if (has_post_thumbnail()) {
                        get_template_part('/template-parts/post/media/single-thumb');
                    }
                endif;  ?>
                <?php get_template_part('/template-parts/post/meta/blog-single-meta'); ?>
                <div class="dtr-single-post__content">
                    <?php get_template_part('/template-parts/post/content/single-content'); ?>
                </div>
                <div class="dtr-single-post__btm-content">
                    <?php if (has_tag() && true == mellow_get_theme_option('mellow_single_tags_enable', true) ||  class_exists('dtr_mellow_core') && true == mellow_get_theme_option('mellow_social_share_enable', true)) { ?>
                        <div class="dtr-single-post__btm-meta">
                            <?php if (has_tag() && true == mellow_get_theme_option('mellow_single_tags_enable', true)) { ?>
                                <div class="dtr-meta-tags"><?php if ($tags_title != '') { ?><span class="dtr-tags-title dtr-meta-title"><?php echo esc_html($tags_title) ?></span><?php } ?><?php the_tags('', ''); ?></div>
                            <?php } ?>
                            <?php if (class_exists('dtr_mellow_core') && true == mellow_get_theme_option('mellow_social_share_enable', true)) {
                                mellow_social_share_hook();
                            } ?>
                        </div>
                    <?php } ?>
                    <?php
                    // author bio
                    if ('' != get_the_author_meta('description') && is_multi_author()) {
                        get_template_part('/template-parts/post/author-bio');
                    }
                    // post nav
                    mellow_post_nav();
                    // comments
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    } ?>
                </div>
            </article>
        <?php endwhile; ?>
    </main>
    <!-- #dtr-primary-section -->
    <?php if (is_active_sidebar('widgets-blog')) {
        get_sidebar();
    } ?>
</div>
<!-- #dtr-main-wrapper -->
<?php get_footer();