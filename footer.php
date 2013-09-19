<?php
/**
 * Footer for WP-Bootstrap theme
 */
?>

	<hr>
		<div class="row last">
			<div class="col-xs-12">
				<footer id="colophon" role="contentinfo">
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
			</div><!-- .col-md-12 -->
		</div><!-- .row -->
    </div><!--/.container-->

<?php wp_footer(); ?>
</body>
</html>