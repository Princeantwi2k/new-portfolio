<?php
/**
 * Custom Excerpt
 */

/**
 * Get the excerpt
 */
if ( ! function_exists( 'mellow_excerpt' ) ) {
	function mellow_excerpt( $args ) {
		echo mellow_get_the_excerpt( $args );
	}
} // mellow_excerpt

/**
 * Generate the custom excerpt
 */
if ( ! function_exists( 'mellow_get_the_excerpt' ) ) {
	function mellow_get_the_excerpt( $args = array() ) {
		$defaults = array(
			'output'          => '',
			'length'          => '40',
			'custom_excerpts' => true,
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args );

		// If length is empty or zero return
		if ( empty( $length ) || '0' == $length ) {
			return;
		}

		// Get post and post data
		$post = get_post();
		$post_content = $post->post_content;
		$post_excerpt = $custom_excerpts ? $post->post_excerpt : '';

		// If password protected post
		if ( $post->post_password ) {
			$output = '<p class="dtr-protected-msg">'. esc_html__( 'This is a password protected post.', 'mellow' ) .'</p>';
			return $output;
		}

		// default excerpt if provided
		if ( $post_excerpt ) :
			$output = $post_excerpt;
		// build custom excerpt
		else :
			// excerpt - complete post
			if ( '1' == $length ) {
				return apply_filters( 'the_content', $post_content );

			// excerpt - more tag
			} elseif ( '999' == $length ) {
				return apply_filters( 'the_content', get_the_content( '', '&hellip;' ) );

			// excerpt - custom length
			} else {
				$content = wp_trim_words( $post_content, absint( $length ) );
				$output = $content;
			}
		endif;
		// return excerpt
		return $output;
	}
}

/**
 * Custom excerpt length for archives
 */
if ( ! function_exists( 'mellow_archive_excerpt_length' ) ) {
	function mellow_archive_excerpt_length() {
		$length = mellow_get_theme_option( 'mellow_get_archive_excerpt_length', '40' );
		if ( $length ) {
			return intval( $length );
		} else {
			return 40;
		}
	}
} // mellow_archive_excerpt_length

/**
 * Get read more link
 */
if ( ! function_exists( 'mellow_read_more' ) ) {
	function mellow_read_more() {
		echo mellow_get_read_more();
	}
} // mellow_read_more

/**
 * Generate read more link
 */
if ( ! function_exists( 'mellow_get_read_more' ) ) {
	function mellow_get_read_more() {

		$output = $readmore = '';
		$post = get_post();
		$post_id = $post->ID;

		$readmore = mellow_get_theme_option( 'mellow_read_more_text', esc_html__( 'Continue Reading', 'mellow') );
		$output .= '<p class="dtr-post__button-wrap"><a href="'. get_permalink( $post_id ) .'" class="dtr-post__button" title="'. esc_attr( $readmore ) .'" rel="bookmark">'. esc_attr( $readmore ) .'</a></p>';
		// return read more link
		return $output;
	}
}