<?php
/**
 * Footer for BootPress theme
 *
 * @package WordPress
 * @subpackage bootpress
 * @since BootPress .1
 */
?>

	<hr>
		<footer id="colophon" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'bootpress' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #primary -->

<?php wp_footer(); ?>
</body>
</html>