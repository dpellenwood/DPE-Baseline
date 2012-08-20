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
	
	<footer id="sitefoot">
	
		<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => 'nav' ) ); ?>

		<div id="footer-sidebar" class="sidebar" role="complementary">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) {} ?>
		</div><!-- #footer-sidebar -->
		
	</footer><!-- #sitefoot -->
	
	<?php wp_footer(); ?>
	
</body>
</html>