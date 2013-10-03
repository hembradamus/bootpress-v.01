<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 * @package WordPress
 * @subpackage bootpress
 * @since BootPress .1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
			<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-title-meta">
					<?php bootpress_entry_meta_top(); ?>
					<?php if ( comments_open() ) : ?>
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'bootpress' ) . '</span>', __( '<span class="has-replies">1 Reply</span>', 'bootpress' ), __( '<span class="has-replies">% Replies</span>', 'bootpress' ) ); ?>
					<?php endif; // comments_open() ?>
				</div>
			<?php else : ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<div class="gallery">
		<?php if ( is_single() || ! get_post_gallery() ) : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bootpress' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bootpress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		<?php else : ?>
			<?php echo get_post_gallery(); ?>
		<?php endif; // is_single() ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer-meta">
		<?php bootpress_entry_meta(); ?>
		<?php if ( comments_open() && ! is_single() ) : ?>
		<span class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'bootpress' ) . '</span>', __( 'One comment so far', 'bootpress' ), __( 'View all % comments', 'bootpress' ) ); ?>
		</span><!-- .comments-link -->
		<?php endif; // comments_open() ?>
		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
