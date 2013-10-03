<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage bootpress
 * @since Bootpress .1
 */

get_header(); ?>

  <div id="primary">
      <div class="sidebar-layout">
        <div id="content">
          <button id="sidebar-toggle" type="button" data-toggle="offcanvas">Toggle Sidebar</button>
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'bootpress' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'bootpress' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'bootpress' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'bootpress' ), get_the_date( _x( 'Y', 'yearly archives date format', 'bootpress' ) ) );
					else :
						printf( __( 'Archives for %s', 'bootpress' ), single_cat_title( '', false ) );
					endif;
				?></h1>
			</header><!-- .archive-header -->
    			<?php while ( have_posts() ) : the_post();
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
      </div><!--/row row-offcanvas-right-->

<?php get_footer(); ?>