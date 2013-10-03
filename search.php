<?php
/**
 * The template for displaying Search Results pages.
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

		<?php if ( have_posts() ) : ?>

			<header>
				<h1><?php printf( __( 'Search Results for: %s', 'bootpress' ), get_search_query() ); ?></h1>
			</header>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php bootpress_paging_nav(); ?>

		<?php else : ?>
			<header>
				<h1><?php printf( __( 'Sorry, no result found for: %s', 'bootpress' ), get_search_query() ); ?></h1>
			</header>
		<?php endif; ?>

        </div><!-- #content -->

        <div id="sidebar-container">
          	<?php get_sidebar(); ?>
        </div><!-- #sidebar-container -->
      </div><!-- .sidebar-layout -->

<?php get_footer(); ?>