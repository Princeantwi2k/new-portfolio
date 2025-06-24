<?php
/**
 * The Entry Image for post
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}
if (has_post_thumbnail() && true == mellow_get_theme_option('mellow_archive_image_enable', true)) { ?>
    <div class="dtr-entry-thumb <?php echo esc_attr( mellow_get_theme_option( 'mellow_blog_entry_corner', 'dtr-radius--rounded' ) ) ?>"> 
        <a href="<?php echo esc_url(get_permalink()); ?>">
            <?php the_post_thumbnail('full'); ?>
        </a>       
    </div>
<?php }