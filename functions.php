<?php
/**
 * WP-Bootsrap functions and definitions. Content mostly repurposed from 
 * the Wordpress Twenty Twelve functions.php file
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage bootpress
 * @since BootPress .1
 */

/**
 * Enqueues default theme style and Twitter Bootstrap scripts and styles for front-end.
 *
 * @since BootPress .1
 */
function bootpress_scripts_styles() {
	//Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	//Load main stylesheet
	wp_enqueue_style( 'bootpress-style', get_stylesheet_uri() );

	//Load Bootstrap js and theme scripts
	wp_enqueue_script( 'bootstrapJS', get_bloginfo('template_directory') . '/js/bootstrap.min.js' , array( 'jquery' ));
	wp_enqueue_script( 'bootPressJS', get_bloginfo('template_directory') . '/js/scripts-ck.js', array( 'bootstrapJS' ), false, true );

}
if(!is_admin())
{
	add_action( 'init', 'bootpress_scripts_styles' );
}

/**
 * Register register menus and update output to match Bootstrap classes
 *
 * @since BootPress .1
 */

//Register menus
function bootpress_menus_init() {
  register_nav_menu( 'header-menu', 'Main navigation menu' );
}
add_action( 'init', 'bootpress_menus_init' );
// Register Custom Navigation Walker/update menu classes and IDs
require_once('wp_bootstrap_navwalker.php');

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since BootPress .1
 */
function bootpress_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'bootpress' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages. Exceptions TBD in BootPress', 'bootpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Navbar Widget Area', 'bootpress' ),
		'id' => 'navwidgets',
		'description' => __( 'Widget area for right half of navabar', 'bootpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'bootpress' ),
		'id' => 'footerwidgets',
		'description' => __( 'Locations TBD in  BootPress', 'bootpress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'bootpress_widgets_init' );

/**
 * Add theme support for different post types
 *
 * @since BootPress .1
 */
function bootpress_theme_support() {
	add_theme_support( 'post-formats', array( 'gallery') );
}
add_action( 'init', 'bootpress_theme_support' );

/**
 * Displays navigation to next/previous pages when applicable. Uses Bootstrap .pager structure
 *
 * @since BootPress .1
 */
function bootpress_paging_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="paging-navigation">
			<ul id="<?php echo $html_id; ?>" role="navigation">
			  <li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'bootpress' ) ); ?></li>
			  <li class="next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>', 'bootpress' ) ); ?></li>
			</ul><!-- #<?php echo $html_id; ?> .navigation -->
		</nav>
	<?php endif;
}
/**
 * Displays navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*
* @return void
*/
function bootpress_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
		<nav id="post-navigation">
			<ul role="navigation">
			  <li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootpress' ) . '</span> %title' ); ?></li>
			  <li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootpress' ) . '</span>' ); ?></li>
			</ul>
		</nav><!-- .post-navigation -->
	<?php
}
/**
 * Template for comments and pingbacks.
 *
 * TBD
 *
 */
function bootpress_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'bootpress' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'bootpress' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" class="media">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<section class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
				?>
			</section><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bootpress' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment media-body">
				<header class="comment-meta comment-author">
					<?php 
						printf( '<cite><b class="fn media-heading">%1$s</b> %2$s</cite>',
							get_comment_author_link(),
							// If current post author is also comment author, make it known visually.
							( $comment->user_id === $post->post_author ) ? '<small>' . __( 'POST AUTHOR', 'bootpress' ) . '</small>' : ''
						);
					?>
				</header>
				<p class="comment-body-p">
					<?php 
						comment_text();
						printf( '<a href="%1$s"><small><time datetime="%2$s">%3$s</time></small></a>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'bootpress' ), get_comment_date(), get_comment_time() )
						);
					 ?>
					<?php edit_comment_link( __( 'Edit', 'bootpress' ), '<span class="edit-link">', '</span>' ); ?>
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'bootpress' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</p>
			</section><!-- .comment-content -->

			<div class="reply">
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own bootpress_entry_meta() to override in a child theme.
 *
 * @since BootPress .1
 */
function bootpress_entry_meta_top() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'bootpress' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'bootpress' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bootpress' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	$utility_text = __( '<span class="by-author"> By %4$s</span><span class="divider">|</span>%3$s', 'bootpress' );

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);

}
function bootpress_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'bootpress' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'bootpress' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bootpress' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( '<p>This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.</p><p>&nbsp;</p>', 'bootpress' );
	} elseif ( $categories_list ) {
		$utility_text = __( '<p>This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.</p><p>&nbsp;</p>', 'bootpress' );
	} else {
		$utility_text = __( '<p>This entry was posted on %3$s<span class="by-author"> by %4$s</span>.</p><p>&nbsp;</p>', 'bootpress' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}

/**
 * Prints the attached image with a link to the next attached image.
 *
 * @since BootPress .1
 *
 * @return void
 */
function bootpress_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'bootpress_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
/**
 * Theme customizer options.
 *
 * TBD
 *
 */

?>