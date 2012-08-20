<?php
/**
 * The default sidebar template
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
?>
<aside id="sidebar-1" class="sidebar" role="complementary">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) {} ?>
</aside><!-- #sidebar-1 -->