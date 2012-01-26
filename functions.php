<?php
/**
 * Site Functions File
 *
 * The main theme functions file.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since DPE Baseline 0.1
 */
function dpe_baseline_setup() {
	
	add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'post-thumbnails' );
	//add_image_size( 'small-feature', 500, 300 );  // Add another image size.
	
	// add_editor_style(); // Style the visual editor with editor-style.css.
	
	register_nav_menus(
		array(
		  'header-menu' => 'Header Navigation',
		)
	);
	
}
add_action( 'after_setup_theme', 'dpe_baseline_setup' );

/**
 * Grab other files we use
 */
require( get_template_directory() . '/inc/widgets.php' );	// Initiate any theme-specific widgets we created.
require( get_template_directory() . '/inc/sidebars.php' );	// Setup our sidebars/widget areas.
require( get_template_directory() . '/inc/misc.php' );		// Add any miscellaneous functions we need for the theme.

?>