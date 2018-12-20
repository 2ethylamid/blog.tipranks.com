<?php
/**
 * Comments template.
 *
 * @package Daily News
* @since Daily News 1.0
 */

	$args_comment = array(
		'callback' => 'daily_news_comments',
		'type' => 'comment',
	);
	$args_pingback = array(
		'type' => 'pingback',
		'short_ping' => true,
	);
?>
<?php if (post_password_required() == true) {
	return;
} ?>

<!-- start comment -->
<div class="col-md-12" id="comments">
	<div class="comment-container">
		<?php if ( have_comments() ) : ?>
			<div class="comment-count">
				<h4><?php comments_number( esc_html__('0 Comments', 'daily-news'), esc_html__('1 Comment', 'daily-news'), esc_html__('% Comments', 'daily-news')); ?></h4>
			</div>
			<ol>
				<?php wp_list_comments($args_comment); ?>
				<?php wp_list_comments($args_pingback); ?>
			</ol>
			<?php if( get_comment_pages_count() > 1) : ?>
				<div class="clearfix comment-pagination align-center">
					<?php previous_comments_link('<i class="fa fa-long-arrow-left"></i> ' . esc_html__('Older Comments', 'daily-news')) ?>
					<?php next_comments_link(esc_html__('Newer Comments', 'daily-news') . ' <i class="fa fa-long-arrow-right fa-fw"></i>') ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number()) : ?>
			<div class="comment-closed"><?php esc_html_e( 'Comments are closed.', 'daily-news' ); ?></div>
		<?php endif; ?>
		<?php
			global $aria_req;
			$req      = get_option( 'require_name_email' );
		    $aria_req = ( $req ? " aria-required='true'" : '' );
		    $allowed_html = array(
		    	'a' => array(
			        'href' => array(),
			        'title' => array()
			    )
			);
			$args_comment_form = array(
				'class_submit' => 'btn btn-default',
				'title_reply' => esc_html__( 'Leave a Reply', 'daily-news'),
				'title_reply_to' => '<h4>'.esc_html__( 'Leave a Reply to %s', 'daily-news').'</h4>',
				'comment_notes_after' => '',
				'fields' => array(
					'author' => '<div class="form-group comment-form-author"><label for="author">' . esc_html__( 'Name', 'daily-news') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
			        'email'  => '<div class="form-group comment-form-email"><label for="email">' . esc_html__( 'Email', 'daily-news') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			                    '<input class="form-control" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
			        'url'    => '<div class="form-group comment-form-url"><label for="url">' . esc_html__( 'Website', 'daily-news') . '</label> ' .
			                    '<input class="form-control" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
				),
				'comment_field' => '<div class="form-group comment-form-comment">  <label for="comment">' . esc_html__( 'Comment', 'daily-news') . '</label>
			        					<textarea class="form-control" id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea></div>',
				'must_log_in' => '<p class="must-log-in">' .  sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'daily-news' ), $allowed_html ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			    'logged_in_as' => '<p class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'daily-news' ), $allowed_html ), esc_url(admin_url( 'profile.php' )), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			    'label_submit' => esc_html__('Submit Comment', 'daily-news'),
			    'submit_button' => '<div class="form-group"><button  name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s">'.esc_html__('Submit Comment', 'daily-news').'</button></div>'
			);
		?>
		<?php comment_form($args_comment_form); ?>
	</div>
</div>
<!-- end comment -->