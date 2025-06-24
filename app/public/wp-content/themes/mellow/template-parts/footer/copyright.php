<?php
/**
 * The template for displaying copyright row
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}
?>
<div class="dtr-copyright">
<div class="row">
        <?php
        // get footer columns
        if (mellow_get_theme_option('mellow_copyright_columns', '1')) {
            $copyright_columns = mellow_get_theme_option('mellow_copyright_columns', '1');
        } else {
            $copyright_columns = '1';
        }
        if ($copyright_columns == '1') {
            $copyright_column_col1 = 'col-12';
        } elseif ($copyright_columns == '2') {
            $copyright_column_col1 = 'col-12 col-lg-6';
            $copyright_column_col2 = 'col-12 col-lg-6';
        } elseif ($copyright_columns == '3') {
            $copyright_column_col1 = 'col-12 col-lg-4';
            $copyright_column_col2 = 'col-12 col-lg-4';
            $copyright_column_col3 = 'col-12 col-lg-4';
        }
        ?>
        <?php if (is_active_sidebar('copyright-column-1')) { ?>
            <?php if ($copyright_columns == '1' || $copyright_columns == '2' || $copyright_columns == '3') { ?>
                <div class="<?php echo esc_attr($copyright_column_col1); ?> <?php echo esc_attr( mellow_get_theme_option( 'mellow_copyright_1_text_align', 'text-align-default' ) ) ?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('copyright-column-1')) ?>
                </div>
        <?php }
        } // widgets area 1 
        ?>
        <?php if (is_active_sidebar('copyright-column-2')) { ?>
            <?php if ($copyright_columns == '2' || $copyright_columns == '3') { ?>
                <div class="<?php echo esc_attr($copyright_column_col2); ?> small-device-space <?php echo esc_attr( mellow_get_theme_option( 'mellow_copyright_2_text_align', 'text-center' ) ) ?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('copyright-column-2')) ?>
                </div>
        <?php }
        } // widgets area 2 
        ?>
        <?php if (is_active_sidebar('copyright-column-3')) { ?>
            <?php if ($copyright_columns == '3') { ?>
                <div class="<?php echo esc_attr($copyright_column_col3); ?> small-device-space <?php echo esc_attr( mellow_get_theme_option( 'mellow_copyright_3_text_align', 'text-right' ) ) ?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('copyright-column-3')) ?>
                </div>
        <?php }
        } // widgets area 3 
        ?>
    </div>
</div>