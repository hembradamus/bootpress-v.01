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
 * @subpackage wpbootstrap
 * @since WP-Bootstrap .1
 */

/**
 * Enqueues default theme style and Twitter Bootstrap scripts and styles for front-end.
 *
 * @since WP-Bootstrap .1
 */
function wpbootstrap_scripts_styles() {
	//Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	//Load main stylesheet
	wp_enqueue_style( 'wpbootstrap-style', get_stylesheet_uri() );

	//Load Bootstrap js and theme scripts
	wp_enqueue_script( 'bootstrapJS', get_bloginfo('stylesheet_directory') . '/js/bootstrap.min.js' , array( 'jquery' ));
	wp_enqueue_script( 'wpbootstrapJS', get_bloginfo('stylesheet_directory') . '/js/scripts-ck.js', array( 'bootstrapJS' ), false, true );

}
if(!is_admin())
{
	add_action( 'init', 'wpbootstrap_scripts_styles' );
}

/**
 * Register register menus and update output to match Bootstrap classes
 *
 * @since WP-Bootstrap .1
 */

//Register menus
function wpbootstrap_menus_init() {
  register_nav_menu( 'header-menu', 'Main navigation menu' );
}
add_action( 'init', 'wpbootstrap_menus_init' );
// Register Custom Navigation Walker/update menu classes and IDs
require_once('wp_bootstrap_navwalker.php');

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since WP-Bootstrap .1
 */
function wpbootstrap_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'wpbootstrap' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages. Exceptions TBD in WP Bootstrap', 'wpbootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'wpbootstrap' ),
		'id' => 'sidebar-2',
		'description' => __( 'Locations TBD in WP Bootstrap', 'wpbootstrap' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'wpbootstrap_widgets_init' );

/**
 * Displays navigation to next/previous pages when applicable. Uses Bootstrap .pager structure
 *
 * @since WP-Bootstrap .1
 */
function wpbootstrap_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul id="<?php echo $html_id; ?>" class="pager" role="navigation">
		  <li class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'wpbootstrap' ) ); ?></li>
		  <li class="next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&rarr;</span>', 'wpbootstrap' ) ); ?></li>
		</ul><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}

/**
 * Template for comments and pingbacks.
 *
 * TBD
 *
 */

/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own wpbootstrap_entry_meta() to override in a child theme.
 *
 * @since WP-Bootstrap .1
 */
function wpbootstrap_entry_meta_top() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'wpbootstrap' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'wpbootstrap' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wpbootstrap' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	$utility_text = __( '<span class="by-author"> By %4$s</span><span class="divider">|</span>%3$s', 'wpbootstrap' );

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);

}
function wpbootstrap_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'wpbootstrap' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'wpbootstrap' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'wpbootstrap' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'wpbootstrap' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'wpbootstrap' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'wpbootstrap' );
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
 * Theme customizer options.
 *
 * TBD
 *
 */

?>