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
 * Register nav menus.
 *
 * @since WP-Bootstrap .1
 */
function wpbootstrap_menus_init() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'wpbootstrap_menus_init' );

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
 * TBD
 *
 */

/**
 * Theme customizer options.
 *
 * TBD
 *
 */

?>