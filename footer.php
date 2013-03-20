<?php
/**
 * Site Footer
 *
 * The site footer.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
?>
	</div><!-- #content -->
	
	<footer id="site-footer">
		
		<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
			<aside id="sidebar-footer" class="sidebar" role="complementary">
				<?php dynamic_sidebar( 'sidebar-footer' ); ?>
			</aside><!-- #sidebar-footer -->
		<?php endif; ?>
		
	</footer><!-- #site-footer -->
	
	<?php wp_footer(); ?>
	
</body>
</html>