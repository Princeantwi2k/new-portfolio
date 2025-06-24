<?php
/**
 * The template for displaying search forms
 *
 * @package MellowTheme
 * @version 1.0.0
 */
$mellow_placeholder	=  mellow_get_theme_option('mellow_search_form_text', esc_html__( 'Search...','mellow' )); ?>
<div class="dtr-search-form">
    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" class="dtr-search-field" placeholder="<?php echo esc_attr( $mellow_placeholder ); ?>" value="<?php get_search_query(); ?>" name="s" />
        <button type="submit" class="dtr-search-submit" aria-label="<?php esc_attr_e( 'Search Button', 'mellow' ); ?>"></button>
    </form>
</div>