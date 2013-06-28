<?php
/**
 * Site Footer
 *
 * The site footer.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

// Get the theme options...
$theme_options = dpe_get_theme_options();

?>
		</div><!-- #content -->
		
		<footer id="site-footer">
			
			<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
				<aside id="sidebar-footer" class="sidebar" role="complementary">
					<?php dynamic_sidebar( 'sidebar-footer' ); ?>
				</aside><!-- #sidebar-footer -->
			<?php endif; ?>
				
			<div class="legal" role="contentinfo">
				<?php
					if( isset( $theme_options['footer-copyright'] ) )
						echo '<div class="copyright">' . apply_filters( 'the_content', $theme_options['footer-copyright'] ) . "</div>\n";
				?>
			</div><!-- .legal -->
			
		</footer><!-- #site-footer -->
	
	</div><!-- .wrap -->
	
	<?php wp_footer(); ?>
	
</body>
</html>