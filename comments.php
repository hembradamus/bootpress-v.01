<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to bootpress_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage bootpress
 * @since BootPress .1
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">
	<?php 
	$args = array(
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => __( 'Take it Boy' ),
	  'title_reply_to'    => __( 'Leave a Reply to %s' ),
	  'cancel_reply_link' => __( 'Cancel Reply' ),
	  'label_submit'      => __( 'Post Comment' ),

	  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .	
	    '</label><textarea id="comment" name="comment" rows="8" placeholder="Comment" aria-required="true">' .
	    '</textarea></p>',

	  'must_log_in' => '<p class="must-log-in">' .
	    sprintf(
	      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</p>',

	  'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',

	  'comment_notes_before' => '<p class="comment-notes">' .
	    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
	    '</p>',

	  'comment_notes_after' => '<p class="form-allowed-tags">' .
	    sprintf(
	      __( '<small>You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
	      ' <pre><code>' . allowed_tags() . '</code></pre></small>'
	    ) . '</p>',

	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<p class="comment-form-author">' .
	      '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
	      ( $req ? '' : '' ) .
	      '<input id="author" name="author" type="text" placeholder="Name (required)" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30"' . $aria_req . ' /></p>',

	    'email' =>
	      '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
	      ( $req ? '' : '' ) .
	      '<input id="email" name="email" type="text" placeholder="Email (required)" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30"' . $aria_req . ' /></p>',

	    'url' =>
	      '<p class="comment-form-url"><label for="url">' .
	      __( 'Website', 'domainreference' ) . '</label>' .
	      '<input id="url" name="url" type="text" placeholder="Website" value="' . esc_attr( $commenter['comment_author_url'] ) .
	      '" size="30" /></p>'
	    )
	  ),
	);
	comment_form($args);
	?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'bootpress' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="commentlist media-list">
			<?php wp_list_comments( array( 'callback' => 'bootpress_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'bootpress' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'bootpress' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'bootpress' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'bootpress' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

</div><!-- #comments .comments-area -->