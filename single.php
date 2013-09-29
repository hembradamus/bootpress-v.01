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
        <div class="flank">
        </div><!--/span-->
        <div id="content" role="main">
          <button id="sidebar-toggle" type="button" data-toggle="offcanvas">Toggle Sidebar</button>
    			<?php while ( have_posts() ) : the_post(); ?>

    				<?php get_template_part( 'content', get_post_format() ); ?>
            <?php bootpress_post_nav(); ?>
    				<?php comments_template( '', true ); ?>

    			<?php endwhile; // end of the loop. ?>
        </div><!--/span-->

        <div id="sidebar-container">
          	<?php get_sidebar(); ?>
        </div><!--/span-->
        <div class="flank">
        </div><!--/span-->
      </div><!--/row row-offcanvas-right-->

<?php get_footer(); ?>