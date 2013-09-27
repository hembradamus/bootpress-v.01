<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage wpbootstrap
 * @since WP-Bootstrap .1
 */

get_header(); ?>
  <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-md-1">
        </div><!--/span-->
        <div class="col-xs-12 col-sm-8 col-md-7" id="content" role="main">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle Sidebar</button>
          </p>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
			<div class="post-navigation pager borders-h">
				<ul class="nav-single" role="navigation">
				  <li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wpbootstrap' ) . '</span> %title' ); ?></li>
				  <li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wpbootstrap' ) . '</span>' ); ?></li>
				</ul><!-- .nav-single -->
			</div>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
        </div><!--/span-->

        <div class="col-xs-12 col-sm-4 col-md-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="well sidebar-nav">
          	<?php get_sidebar(); ?>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="col-md-1">
        </div><!--/span-->
      </div><!--/row row-offcanvas-right-->

<?php get_footer(); ?>