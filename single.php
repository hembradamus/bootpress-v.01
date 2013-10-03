<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage bootpress
 * @since BootPress .1
 */

get_header(); ?>

  <div id="primary">
      <div class="sidebar-layout">
        <div id="content" role="main">
          <button id="sidebar-toggle" type="button" data-toggle="offcanvas">Toggle Sidebar</button>
    			<?php while ( have_posts() ) : the_post(); ?>

    				<?php get_template_part( 'content', get_post_format() ); ?>
            <?php bootpress_post_nav(); ?>
    				<?php comments_template( '', true ); ?>

    			<?php endwhile; // end of the loop. ?>
        </div><!-- #content -->

        <div id="sidebar-container">
          	<?php get_sidebar(); ?>
        </div><!-- #sidebar-container -->
      </div><!-- .sidebar-layout -->

<?php get_footer(); ?>