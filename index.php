<?php
/**
 * The Main Template File for BootPress
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
        <div id="content">
          <button id="sidebar-toggle" type="button" data-toggle="offcanvas">Toggle Sidebar</button>
    			<?php 
    				if ( have_posts() ) : while ( have_posts() ) : the_post();
    			?>
            <div class="excerpt">
              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              	<?php the_title_attribute(); ?>
              </a></h2>
              <p class="time"><?php the_time(get_option('date_format')); ?></p>
              <p><?php the_excerpt(); ?></p>
              <p><a class="readmore" href="<?php the_permalink(); ?>">Read More »</a></p>
            </div><!--.excerpt-->
			     <?php 
             endwhile;
             endif;
           ?>
            <?php bootpress_paging_nav(); ?>
        </div><!--/span-->

        <div id="sidebar-container" role="navigation">
         	<?php get_sidebar(); ?>
        </div><!--/span-->
        <div class="flank">
        </div><!--/span-->
      </div><!--/row row-offcanvas-right-->

<?php get_footer(); ?>