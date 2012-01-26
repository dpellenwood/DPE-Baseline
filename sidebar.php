<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
?>
<div class="sidebar widget-area four columns" role="complementary">
	<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('A Sidebar')) : ?>
		<li>Nothing here</li>
		<?php endif; ?>
	</ul>
</div><!-- .sidebar -->
