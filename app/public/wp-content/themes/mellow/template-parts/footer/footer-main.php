<?php
/**
 * The template for displaying the main footer row
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}
?>
<div class="dtr-footer-row">
    <div class="row">
        <?php
        // get footer columns
        if (mellow_get_theme_option('mellow_footer_columns', '4')) {
            $footer_columns = mellow_get_theme_option('mellow_footer_columns', '4');
        } else {
            $footer_columns = '4';
        }
        if ($footer_columns == '1') {
            $footer_column_col1 = 'col-12';
        } elseif ($footer_columns == '2') {
            $footer_column_col1 = 'col-12 col-md-6';
            $footer_column_col2 = 'col-12 col-md-6';
        } elseif ($footer_columns == '3') {
            $footer_column_col1 = 'col-12 col-lg-4';
            $footer_column_col2 = 'col-12 col-lg-4';
            $footer_column_col3 = 'col-12 col-lg-4';
        } elseif ($footer_columns == '4') {
            $footer_column_col1 = 'col-12 col-md-6 col-lg-3';
            $footer_column_col2 = 'col-12 col-md-6 col-lg-3';
            $footer_column_col3 = 'col-12 col-md-6 col-lg-3';
            $footer_column_col4 = 'col-12 col-md-6 col-lg-3';
        } elseif ($footer_columns == '5') {
            $footer_column_col1 = 'col-12 col-lg-6';
            $footer_column_col2 = 'col-12 col-lg-3';
            $footer_column_col3 = 'col-12 col-lg-3';
        } elseif ($footer_columns == '6') {
            $footer_column_col1 = 'col-12 col-lg-3';
            $footer_column_col2 = 'col-12 col-lg-6';
            $footer_column_col3 = 'col-12 col-lg-3';
        } elseif ($footer_columns == '7') {
            $footer_column_col1 = 'col-12 col-lg-4';
            $footer_column_col2 = 'col-12 col-lg-5';
            $footer_column_col3 = 'col-12 col-lg-3';
        } elseif ($footer_columns == '8') {
            $footer_column_col1 = 'col-12 col-md-6 col-lg-4';
            $footer_column_col2 = 'col-12 col-md-6 col-lg-3';
            $footer_column_col3 = 'col-12 col-md-6 col-lg-2';
            $footer_column_col4 = 'col-12 col-md-6 col-lg-3';
        }
        ?>
        <?php if (is_active_sidebar('footer-column-1')) { ?>
            <?php if ($footer_columns == '1' || $footer_columns == '2' || $footer_columns == '3' || $footer_columns == '4' || $footer_columns == '5' || $footer_columns == '6' || $footer_columns == '7'  || $footer_columns == '8') { ?>
                <div class="<?php echo esc_attr($footer_column_col1); ?>">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-1')) ?>
                </div>
        <?php }
        } // widgets area 1 
        ?>
        <?php if (is_active_sidebar('footer-column-2')) { ?>
            <?php if ($footer_columns == '2' || $footer_columns == '3' || $footer_columns == '4' || $footer_columns == '5' || $footer_columns == '6' || $footer_columns == '7' || $footer_columns == '8') { ?>
                <div class="<?php echo esc_attr($footer_column_col2); ?> small-device-space">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-2')) ?>
                </div>
        <?php }
        } // widgets area 2 
        ?>
        <?php if (is_active_sidebar('footer-column-3')) { ?>
            <?php if ($footer_columns == '3' || $footer_columns == '4' || $footer_columns == '5' || $footer_columns == '6' || $footer_columns == '7' || $footer_columns == '8') { ?>
                <div class="<?php echo esc_attr($footer_column_col3); ?> small-device-space">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-3')) ?>
                </div>
        <?php }
        } // widgets area 3 
        ?>
        <?php if (is_active_sidebar('footer-column-4')) { ?>
            <?php if ($footer_columns == '4' || $footer_columns == '8') { ?>
                <div class="<?php echo esc_attr($footer_column_col4); ?> small-device-space">
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-4')) ?>
                </div>
        <?php }
        } // widgets area 4 
        ?>
    </div>
</div>