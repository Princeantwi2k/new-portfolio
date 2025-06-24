<?php
/**
 * Paginations
 *
 * @package MellowTheme
 * @version 1.0.0
 */
// atributes to navigation links
if ( ! function_exists( 'mellow_next_posts_link_attributes' ) ) {
	function mellow_next_posts_link_attributes() {
		return 'aria-label="' . esc_attr__('Next','mellow') . '"';
	}
}
add_filter('next_posts_link_attributes', 'mellow_next_posts_link_attributes');

if ( ! function_exists( 'mellow_prev_posts_link_attributes' ) ) {
	function mellow_prev_posts_link_attributes() {
		return 'aria-label="' . esc_attr__('Previous','mellow') . '"';
	}
}
add_filter('previous_posts_link_attributes', 'mellow_prev_posts_link_attributes');

/**
 * Navigation : next/prev for a single post
 */
if ( ! function_exists( 'mellow_post_nav' ) ) :
	function mellow_post_nav() {
	?>
	<nav class="dtr-single-post-nav clearfix">
		<?php $prev_post = get_previous_post();
		 $prev_nav_text	 = mellow_get_theme_option('mellow_prev_nav_text', esc_html__('Previous','mellow')); ?>
		<div class="dtr-single-nav__prev">
        <?php if( $prev_post ) { ?>
            <?php previous_post_link('%link','<span class="dtr-single-nav__icon dtr-single-nav__prev-icon"></span>' . esc_html( $prev_nav_text ) . ''); ?>
            <?php previous_post_link('%link',"<p class='dtr-single-nav__post-title'>%title</p>"); ?>
		<?php } ?>
		</div>
		<?php $next_post = get_next_post();
		$next_nav_text	 = mellow_get_theme_option('mellow_next_nav_text', esc_html__('Next','mellow')); ?>
		<div class="dtr-single-nav__next">
        <?php if( $next_post ) { ?>
            <?php next_post_link('%link','' . esc_html( $next_nav_text ) . '<span class="dtr-single-nav__icon dtr-single-nav__next-icon"></span>'); ?>
            <?php next_post_link('%link',"<p class='dtr-single-nav__post-title'>%title</p>"); ?>
        <?php } ?>
		</div>
	</nav>
	<?php
	}
endif; // mellow_post_nav

/**
 * Navigation : next/prev for archives
 */
if ( ! function_exists( 'mellow_archive_nav' ) ) :
function mellow_archive_nav() {
	global $wp_query;
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
<nav class="dtr-archive-nav clearfix">
    <div class="dtr-arrow-nav">
            <div class="dtr-arrow-nav__item dtr-arrow-nav__prev">
                <?php if ( get_next_posts_link() ) : ?>
                <?php next_posts_link( '<div class="dtr-arrow-nav__icon dtr-arrow-nav__prev-icon"></div>' );  ?>
                <?php endif; ?>
            </div>
            <div class="dtr-arrow-nav__item dtr-arrow-nav__next">
                <?php if ( get_previous_posts_link() ) : ?>
                <?php previous_posts_link( '<div class="dtr-arrow-nav__icon dtr-arrow-nav__next-icon"></div>' ); ?>
                <?php endif; ?>
            </div>
    </div>
</nav>
<!-- .dtr-post-nav -->
<?php
}
endif; // mellow_archive_nav

/**
 * Pagination : Numbered
 */
if ( ! function_exists( 'mellow_numbered_pagination' ) ) :
    function mellow_numbered_pagination( $query = '' ) {

        if ( ! $query ) {
            global $wp_query;
            $query = $wp_query;
        }

		// vars
		$total  = $query->max_num_pages;
        $big    = 999999999; // unlikely integer

		// pagination
        if ( $total > 1 ) {

            // Get permalink structure
            if ( get_option( 'permalink_structure' ) ) {
                if ( is_page() ) {
                    $format = 'page/%#%/';
                } else {
                    $format = '/%#%/';
                }
            } else {
                $format = '&paged=%#%';
            }

            // Get current page
            if ( $current_page = get_query_var( 'paged' ) ) {
                $current_page = $current_page;
            } elseif ( $current_page = get_query_var( 'page' ) ) {
                $current_page = $current_page;
            } else {
                $current_page = 1;
            }

            // Midsize
            $mid_size = '2';

            // Pagination output
            $links = paginate_links( array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => $format,
                'total'         => $total,
				'current'       => max( 1, $current_page ),
                'mid_size'      => $mid_size,
                'prev_next'     => false,
                'next_text'     => false,
			    'type'          => 'array'
            ) );

			if ( $links ) :

    echo '<div class="dtr-archive-nav"><ul class="dtr-number-nav clearfix">';
    if ( get_previous_posts_link() ) :
        echo '<li class="dtr-number-nav__item dtr-number-nav__prev">';
        echo get_previous_posts_link( '<div class="dtr-number-nav__icon dtr-number-nav__prev-icon"></div>' );
        echo '</li>';
    endif;

    echo '<li class="dtr-number-nav__item">';
    echo join( '</li><li class="dtr-number-nav__item">', $links );
    echo '</li>';

    if ( get_next_posts_link() ) :
        echo '<li class="dtr-number-nav__item dtr-number-nav__next">';
		echo get_next_posts_link( '<div class="dtr-number-nav__icon dtr-number-nav__next-icon"></div>' );
        echo '</li>';
    endif;
    echo '</ul></div>';
endif;
        }
    }
endif; // mellow_numbered_pagination