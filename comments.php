<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
?>
<p class="alert alert-info alert-dismissible comments-no-password">
	<?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'carpento' ); ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="<?php esc_attr_e( 'Close', 'carpento' ); ?>"></button>
</p>
<?php
	return;
}
?>

<div id="comments" class="comments-area">

<?php if ( have_comments() ) : ?>
	<div class="comments-title">
		<h4 class="title">
			<?php
				$comments_number = get_comments_number();
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Comment',
						'%1$s Comments',
						$comments_number,
						'comments title',
						'carpento'
					),
					number_format_i18n( $comments_number )
				);
			?>
		</h4>
		<p><?php esc_html_e( 'Join the discussion and tell us your opinion.', 'carpento' ); ?></p>
	</div>

	<?php the_comments_navigation(); ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'         => 'ul',
				'short_ping'    => true,
				'avatar_size'   => '80',
				'walker'        => new Carpento_Bootstrap_Comment_Walker(),
			) );
		?>
	</ol><!-- .comment-list -->

	<?php the_comments_navigation(); ?>

<?php endif; // Check for have_comments(). ?>

<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="alert alert-alert alert-dismissible no-comments">
		<?php esc_html_e( 'Comments are closed.', 'carpento' ); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="<?php esc_attr_e( 'Close', 'carpento' ); ?>"></button>
	</p>
<?php endif; ?>


<?php 

$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$comments_args = array(
	'id_form'           => 'commentform',
	'class_form'      	=> 'comment-form',
	'id_submit'         => 'submit',
	'class_submit'      => apply_filters( 'carpento_comments_submit_btn', 'btn btn-theme-colored1'),
	'name_submit'       => 'submit',
	'title_reply'       => esc_html__( 'Leave a Comment', 'carpento' ),
	'title_reply_to'    => esc_html__( 'Leave a Comment to %s', 'carpento' ),
	'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
	'title_reply_after' => '</h4>',
	'cancel_reply_link' => esc_html__( 'Cancel Reply', 'carpento' ),
	'label_submit'      => esc_html__( 'Post Comment', 'carpento' ),
	'format'            => 'xhtml',

	// redefine your own textarea (the comment body)
	'comment_field' => '<div class="form-group mb-3"><label for="comment">' . esc_html__( 'Comment', 'carpento' ) . '</label><textarea class="form-control" placeholder="' . esc_attr__( 'Write your comment here...', 'carpento' ) . '" rows="8" id="comment" name="comment" aria-required="true"></textarea></div>',

	'fields' => 
		apply_filters( 'comment_form_default_fields', array(
			'author' =>
			  '<div class="row g-3"><div class="col-md-12"><div class="form-group">' .
			  '<label for="author">' . esc_html__( 'Name', 'carpento' ) . '</label> ' .
			  ( $req ? '<span class="required">*</span>' : '' ) .
			  '<input class="form-control" id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'carpento' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
			  '" size="30"' . $aria_req . ' /></div></div>',

			'email' =>
			  '<div class="col-md-6"><div class="form-group"><label for="email">' . esc_html__( 'Email', 'carpento' ) . '</label> ' .
			  ( $req ? '<span class="required">*</span>' : '' ) .
			  '<input class="form-control" id="email" name="email" type="text" placeholder="' . esc_attr__( 'Email', 'carpento' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			  '" size="30"' . $aria_req . ' /></div></div>',

			'url' =>
			  '<div class="col-md-6"><div class="form-group mb-3"><label for="url">' .
			  esc_html__( 'Website', 'carpento' ) . '</label>' .
			  '<input class="form-control" id="url" name="url" type="text" placeholder="' . esc_attr__( 'Website', 'carpento' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
			  '" size="30" /></div></div></div>'
		)
	),
);

comment_form($comments_args);
?>

</div><!-- .comments-area -->
