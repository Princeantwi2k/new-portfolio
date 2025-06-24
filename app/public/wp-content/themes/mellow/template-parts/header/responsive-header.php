<?php
/**
 * The template for displaying responsive header
 *
 * @package MellowTheme
 * @version 1.0.0
 */
?>
<div id="dtr-responsive-header">
    <div class="container">
        <?php if (mellow_get_theme_option('mellow_resp_logo_type', 'mellow_resp_main_logo') == 'mellow_resp_main_logo') {
            get_template_part('/template-parts/header/logo');
        } else {
            get_template_part('/template-parts/header/logo-alt');
        }
        ?>
        <button id="dtr-menu-button" class="dtr-hamburger" type="button" aria-label="<?php esc_attr_e('Menu Button', 'mellow'); ?>"><span class="dtr-hamburger-lines-wrapper"><span class="dtr-hamburger-lines"></span></span></button>
    </div>
    <div class="dtr-responsive-header-menu"></div>
</div>