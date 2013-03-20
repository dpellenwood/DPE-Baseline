<?php
/**
 * The default sidebar template
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
?>
		
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside id="sidebar-1" class="sidebar" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #sidebar-1 -->
	<?php endif; ?>