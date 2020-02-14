<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dricub_driving_school
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="tt-comments-block">
	<?php
	
	if ( have_comments() ) : ?>
		<h5 class="tt-title">

		<?php

			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'dricub-driving-school' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'dricub-driving-school'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
 
 
		?>
		</h5>
		<?php dricub_driving_school_comment_nav() ?>
		<div class="comment-list">
			<ul class="list-inline">
			<?php				
				wp_list_comments( array(
				  'style'       => 'ol',
				  'short_ping'  => true,
				  'avatar_size' => 80,
				  'walker' => new Dricub_Driving_School_Comment_Walker
				) );
			?>
			</ul>
		</div><!-- .comment-list -->

		<div class="divider-lg"></div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'dricub-driving-school' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'dricub-driving-school' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'dricub-driving-school' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dricub-driving-school' ); ?></p>
	<?php
	endif;

$args = array(
  'id_form'           => 'commentform',
  'class_form'		  => 'form-default',
  'id_submit'         => 'submit',
  'class_submit'      => 'btn',
  'name_submit'       => 'submit',
  'title_reply'       => esc_html__( 'Leave a Reply', 'dricub-driving-school' ),
  'title_reply_to'    => esc_html__( 'Leave a Reply', 'dricub-driving-school' ),
  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'dricub-driving-school' ),
  'label_submit'      => esc_html__( 'Leave a Comment', 'dricub-driving-school' ),
  'format'            => 'xhtml',
  'comment_field' =>  '<div class="form-group"><label for="comment">' . esc_html_x( 'Comment', 'noun', 'dricub-driving-school' ) . '</label><textarea id="comment" name="comment" class="form-control" ></textarea></div>',
  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      wp_kses_post(__( 'You must be <a href="%s">logged in</a> to post a comment.', 'dricub-driving-school' )),
      esc_url(wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ))
    ) . '</p>',
  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
		wp_kses_post(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'dricub-driving-school' )),
      esc_url(admin_url( 'profile.php' )),
      $user_identity,
      esc_url(wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ))
    ) . '</p>',
  	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' =>
			'<div class="form-group">
				<div class="input-wrapper">
					<label>' . esc_html__( 'Name', 'dricub-driving-school' ) . ' '. ( $req ? '<span class="required">*</span>' : '' ) .'</label>' .
			 		'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			 '" /></div>',
		'email' =>
			'<div class="form-group">
				<label>' . esc_html__( 'Email', 'dricub-driving-school' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
					'<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			 '" /></div>
			</div>',
		'url' =>
			'<div class="form-group">
				<label>' . esc_html__( 'Website', 'dricub-driving-school' ) . '</label>' .
			 		'<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			 '" /></div>',
		) ),
);
comment_form($args);
	?>
</div>
