<?php
/**
 * Register our sidebars and widget areas.
 * Also registers any theme-specific widgets we've created in widgets.php
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
function dpe_baseline_widgets_init() {
	
	//register_widget( 'dpe_events_meta_widget' );
	
	register_sidebar( array(
		'name' => __( 'Sidebar 1', 'dpe-baseline' ),
		'id' => 'sidebar-1',
		'description'   => __( 'A sidebar', 'dpe-baseline' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'dpe_baseline_widgets_init' );
