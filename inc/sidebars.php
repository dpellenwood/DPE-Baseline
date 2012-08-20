<?php
/**
 * Register our sidebars and widget areas.
 * Also registers any theme-specific widgets we've created in ~/inc/widgets.php
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
function dpe_baseline_widgets_init() {
	
	//register_widget( 'dpe_events_meta_widget' );
	
	register_sidebar( array(
		'name' => __( 'Home 1', 'twentyeleven' ),
		'id' => 'home-1',
		'description'   => 'First homepage widget area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'dpe_baseline_widgets_init' );
