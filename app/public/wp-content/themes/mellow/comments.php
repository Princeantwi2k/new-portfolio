<?php
/**
 * The template for displaying comments.
 *
 * @package MellowTheme
 * @version 1.0.0
 */
if ( post_password_required() )
	return;
?>
<div id="comments" class="clearfix comments-area">
    <?php
	if ( have_comments() ) : ?>
    <h3 class="comments-title"><span>
        <?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'Comment (1)', 'comments title', 'mellow' ), get_the_title() );
				} else {
					/* translators: 1: number of comment(s). */
					printf(
						_nx(
							'Comment (%1$s) ',
							'Comments (%1$s) ',
							$comments_number,
							'comments title',
							'mellow'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
        </span></h3>
    <ol class="comment-list">
        <?php
				wp_list_comments( array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
					'format'      => 'html5',
					'callback'    => 'mellow_comment',
				) );
			?>
    </ol>
    <?php
	endif;
 	// comments pagination
 	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="dtr-comments-navigation clearfix">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="dtr-comments-nav-left">
                    <?php previous_comments_link( '<h6 class="dtr-comments-nav-text dtr-comments-nav-left-text">' . esc_html__( 'Previous Comments', 'mellow' ) . '</h6>' ); ?>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="dtr-comments-nav-right">
                    <?php next_comments_link( '<h6 class="dtr-comments-nav-text dtr-comments-nav-right-text">' . esc_html__( 'Next Comments', 'mellow' ) . '</h6>' ); ?>
                </div>
            </div>
        </div>
    </nav>
    <?php endif;
	// Closed comments
	if ( ! comments_open() ) : ?>
    <p class="no-comments">
        <?php esc_html_e( 'Comments are closed.', 'mellow' ); ?>
    </p>
    <?php
		endif;
		?>
    <?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields =  array(
			'author' =>
			'<div class="dtr-form-row-2col"><div class="clearfix"><div class="comment-form-author dtr-form-column">' .
			'<label for="author">' . esc_html__( 'Your Name', 'mellow' ) . '<span class="comment-aste">*</span></label><p class="dtr-comment-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_attr__( 'Your Name*', 'mellow' ) . '"/></p></div>',
			'email' =>
			'<div class="comment-form-email dtr-form-column">' .
			'<label for="email">' . esc_html__( 'Email Address', 'mellow' ) . '<span class="comment-aste">*</span></label><p class="dtr-comment-email"><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' placeholder="' . esc_attr__( 'Email Address*', 'mellow' ) . '"/></p></div></div></div>',
			'url' =>
			'<div class="comment-form-url">' .
			'<label for="url">' . esc_html__( 'Website (if any)', 'mellow' ) . '</label><p class="dtr-comment-email"><input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) .
			'" size="30"' . $aria_req . ' placeholder="' . esc_attr__( 'Website (if any)', 'mellow' ) . '"/></p></div>',
		);
		$comments_args = array(
			'fields' => $fields,
					'title_reply'   => '<span>' . esc_html__( 'Leave a Reply', 'mellow' ) . '</span>',
					'label_submit'  => esc_html__( 'Post Comment','mellow' ),
					'comment_field' =>  '<p class="dtr-comment-message comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'mellow' ) .
		'<span class="comment-aste">*</span></label><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true" placeholder="' . esc_attr__( 'Comment*', 'mellow' ) . '">' .
			'</textarea></p>',
			);
		comment_form( $comments_args );
		?>
</div>
<!-- comment form -->