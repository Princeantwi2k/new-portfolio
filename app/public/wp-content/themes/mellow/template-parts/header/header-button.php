<?php
/**
 * Button in Header
 *
 * @package MellowTheme
 * @version 1.0.0
 */
if (true == mellow_get_theme_option('mellow_header_button_enable', false)) { ?>
    <a href="<?php echo esc_url(mellow_get_theme_option('mellow_header_btn_link')); ?>" class="dtr-btn dtr-header-btn" target="_<?php echo esc_attr(mellow_get_theme_option('mellow_header_button_target', '')); ?>">
        <span class="dtr-btn__text">
            <?php echo wp_kses(mellow_get_theme_option('mellow_header_btn_text'), wp_kses_allowed_html('post')); ?>
        </span>
        <?php if ( mellow_get_theme_option('mellow_header_btn_select_icon_type', 'header_btn_no_icon') != 'header_btn_no_icon' ) { ?>
            <?php if (mellow_get_theme_option('mellow_header_btn_select_icon_type', 'header_btn_predef_icon') == 'header_btn_predef_icon') { ?>
                <span class="dtr-icon dtr-btn__icon"><i class="<?php echo mellow_get_theme_option('mellow_header_btn_icon_name'); ?>"></i></span>
            <?php } else { ?>
                <span class="dtr-icon dtr-btn__icon"><?php echo wp_kses(mellow_get_theme_option('mellow_header_btn_icon_code'), mellow_wp_kses_extended_ruleset()); ?></span>
            <?php } ?>
        <?php } ?>
    </a>
<?php }