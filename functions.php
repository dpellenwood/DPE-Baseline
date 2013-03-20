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
 *  Define any theme constants
 */
define( 'DPE_THEME_VER', dpe_static_file_version() );


/**
 * Include other helpful theme functions
 */
//require_once( get_template_directory() . '/inc/widgets.php' );	// Initiate any theme-specific widgets.
require_once( get_template_directory() . '/inc/sidebars.php' );	// Register custom widgets and sidebar/widget areas.
require_once( get_template_directory() . '/inc/misc.php' );		// Miscellaneous theme functions including style & script inclusion.
require_once( get_template_directory() . '/inc/comments.php' );	// Actions & functions to tweak comments output.
//require_once( get_template_directory() . '/inc/admin.php' );	// WP-ADMIN specific functions.


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 */
function dpe_baseline_setup() {
	
	//add_filter('show_admin_bar', '__return_false'); //Disable the admin bar
	add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'post-thumbnails' );
		//set_post_thumbnail_size( 228, 323, true );
		//add_image_size( 'size-two', 340, 260, true );
	add_editor_style('css/editor.css'); // Style the visual editor.
	register_nav_menus(
		array(
		  'header-menu' => 'Header Navigation',
		)
	);
	
	//require_once( get_template_directory() . '/inc/theme-options.php' );	// Load up our theme options page and related code.
	
}
add_action( 'after_setup_theme', 'dpe_baseline_setup' );


/**
 * Set a version number useful for static files (CSS, JS, etc) included by WordPress
 * 
 * Useful to overcome static file caching in the browser. Creates a version number
 * using the WordPress theme version and an optional custom revision string.
 * 
 * @uses	wp_get_theme() Used to get the current theme's details including the version.
 * @param	string $custom_revision Optional. A string to append to the configured version number.
 * @return	string The current version number. 
 *
 * @author David Paul Ellenwood (dpe415)
 */
function dpe_static_file_version( $custom_revision = NULL ) {
	
	$theme				= wp_get_theme();
	$current_version	= $theme['Version'];
	
	if ( $custom_revision ) {
		$current_version .= '.' . $custom_revision;
	}
	
	return apply_filters( 'dpe_static_file_version', $current_version );
}