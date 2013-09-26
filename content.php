<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage wpbootstrap
 * @since WP-Bootstrap .1
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'wpbootstrap' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_single() ) : ?>
				<h1 class="entry-title pull-left"><?php the_title(); ?></h1>
				<?php edit_post_link( __( '<button class="edit-link btn btn-primary btn-xs pull-right">Edit</button>', 'wpbootstrap' ), '', '' ); ?>
			<?php else : ?>
				<h1 class="entry-title pull-left">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
				<?php edit_post_link( __( '<button class="edit-link btn btn-primary btn-xs pull-right">Edit</button>', 'wpbootstrap' ), '', '' ); ?>
			<?php endif; // is_single() ?>
			<div class="entry-title-meta text-muted borders-h">
				<?php wpbootstrap_entry_meta_top(); ?>
				<?php if ( comments_open() ) : ?>
					<?php comments_popup_link( '<span class="leave-reply pull-right">' . __( 'Leave a reply', 'wpbootstrap' ) . '</span>', __( '<span class="badge pull-right">1 Reply</span>', 'wpbootstrap' ), __( '<span class="badge pull-right">% Replies</span>', 'wpbootstrap' ) ); ?>
				<?php endif; // comments_open() ?>
			</div>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpbootstrap' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'wpbootstrap' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-footer-meta text-muted">
			<?php wpbootstrap_entry_meta(); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpbootstrap_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h3><?php printf( __( 'About %s', 'wpbootstrap' ), get_the_author() ); ?></h3>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'wpbootstrap' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
