<?php
/**
 * Write a theme specific widget or two...
 * 
 * Widgets created here get registered in ~/inc/sidebars.php during 'widgets_init' for the theme.
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
class A_Widget extends WP_Widget {
	
	function A_Widget() {
		// widget actual processes
	}

	function form($instance) {
		// outputs the options form on admin
	}

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
	}

	function widget($args, $instance) {
		// outputs the content of the widget
	}

}

?>