<?php
/**
 * Register our sidebars and widget areas.
 * Also registers any theme-specific widgets we've created in ~/inc/widgets.php
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
function dpe_baseline_widgets_init() {
	
	// register_widget( 'A_Widget' );

	register_sidebar( array(
		'name' => __( 'A Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'dpe_baseline_widgets_init' );

?>