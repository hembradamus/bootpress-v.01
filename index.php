<?php
/**
 * The Main Template File for WP Bootstrap
 *
 * Layout based on Bootstrap. PHP queries based on Wordpress Twenty Tweve Theme.
 *
 */

get_header(); ?>


  <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="row">
    			<?php 
    				query_posts();
    				while ( have_posts() ) : the_post();
    			?>
	            <div class="col-12 col-sm-12 col-lg-12">
	              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	              	<?php the_title_attribute(); ?>
	              </a></h2>
	              <p><?php the_excerpt(); ?></p>
	              <p><a class="btn btn-default" href="<?php the_permalink(); ?>">Read More »</a></p>
	            </div><!--/span-->
			     <?php endwhile; ?>
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-12 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="well sidebar-nav">
          	<?php get_sidebar(); ?>
          </div><!--/.well -->
        </div><!--/span-->
      </div><!--/row row-offcanvas-right-->

<?php get_footer(); ?>