<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="eltdf-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="eltdf-comment-holder-inner">
				<div class="eltdf-comments-title">
					<h3><?php esc_html_e( 'Comments: ', 'frappe' ); echo get_comments_number(); ?></h3>
				</div>
				<div class="eltdf-comments">
					<ul class="eltdf-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'frappe_elated_comment' ), apply_filters( 'frappe_elated_filter_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'frappe' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$eltdf_commenter = wp_get_current_commenter();
		$eltdf_req       = get_option( 'require_name_email' );
		$eltdf_aria_req  = ( $eltdf_req ? " aria-required='true'" : '' );
        $eltdf_consent  = empty( $eltdf_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		
		$eltdf_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'frappe' ),
			'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h3>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'frappe' ),
			'cancel_reply_link'    => esc_html__( 'cancel reply', 'frappe' ),
			'label_submit'         => esc_html__( 'Submit', 'frappe' ),
			'comment_field'        => apply_filters( 'frappe_elated_filter_comment_form_textarea_field', '<label class="eltdf-comment-form-label eltdf-cf-textarea-label">' . esc_html__( 'Your comment', 'frappe' ) . '</label><textarea id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea>' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'frappe_elated_filter_comment_form_default_fields', array(
				'author' => '<label class="eltdf-comment-form-label eltdf-cf-name-label">' . esc_attr__( 'Name', 'frappe' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $eltdf_commenter['comment_author'] ) . '"' . $eltdf_aria_req . ' />',
				'email'  => '<label class="eltdf-comment-form-label eltdf-cf-email-label">' . esc_attr__( 'E-mail', 'frappe' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr( $eltdf_commenter['comment_author_email'] ) . '"' . $eltdf_aria_req . ' />',
				'url'    => '<label class="eltdf-comment-form-label eltdf-cf-website-label">' . esc_attr__( 'Website', 'frappe' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $eltdf_commenter['comment_author_url'] ) . '" size="30" maxlength="200" />',
                'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $eltdf_consent . ' />' .
                            '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'frappe' ) . '</label></p>',
            ) )
		);

	$eltdf_args = apply_filters( 'frappe_elated_filter_comment_form_final_fields', $eltdf_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="eltdf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $eltdf_show_comment_form = apply_filters('frappe_elated_filter_show_comment_form_filter', true);
    if($eltdf_show_comment_form) {
    ?>
        <div class="eltdf-comment-form">
            <div class="eltdf-comment-form-inner">
                <?php comment_form( $eltdf_args ); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>	