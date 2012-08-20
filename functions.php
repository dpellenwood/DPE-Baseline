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
 *  Define our theme version constant
 */
define( 'DPE_THEME_VER', dpe_static_file_version() );

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
function baseline_setup() {
	
	add_theme_support( 'automatic-feed-links' ); // Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 700, 385, true );
	//add_image_size( 'brew-feature', 340, 260, true );
	
	//add_editor_style('css/editor-style.css'); // Style the visual editor.
	
	register_nav_menus(
		array(
		  'header-menu'		=> 'Header Navigation',
		)
	);
	
	//Disable the admin bar
	//add_filter('show_admin_bar', '__return_false');
	
}
add_action( 'after_setup_theme', 'baseline_setup' );


/**
 * Grab other files we use
 */
//require( get_template_directory() . '/inc/widgets.php' );	// Initiate any theme-specific widgets we created.
require( get_template_directory() . '/inc/sidebars.php' );	// Setup our sidebars/widget areas.
require( get_template_directory() . '/inc/comments.php' );	// Actions & functions to tweak the post comments display
require( get_template_directory() . '/inc/misc.php' );		// Add any miscellaneous functions we need for the theme.


/**
 * Add version numbers to static files
 * 
 * Useful to overcome static file caching in the browser.
 * Sets up our stylesheet & javascript versions using the WordPress theme version,
 * a revision number created manually by tailing the stdout of an SVN export (if it exists)
 * and an optional custom revision string.
 * 
 * @uses wp_get_theme() Used to get the current theme's details including the version.
 * 
 * @param string $custom_revision Optional. A string to append to the configured version number.
 * 
 * @return string The current version number. 
 * 
 * @author David Paul Ellenwood
 */
function dpe_static_file_version( $custom_revision = NULL ) {
	
	$theme				= wp_get_theme();
	$current_version	= $theme['Version'];
	
	/* For getting the currently deployed revision during a manual SVN export via tailing the stdout to a file called ".rev" */
	if( file_exists($_SERVER['DOCUMENT_ROOT'] . '/.rev') ) {
		preg_match( '/ (\d+)\./', htmlentities( file_get_contents( $_SERVER['DOCUMENT_ROOT'] . '/.rev' ) ), $matches );
		$svn_revision = $matches[1];
		if( is_numeric( $svn_revision ) ) {
			$current_version .= '.' . $svn_revision;
		}
	}
	
	if( $custom_revision ) {
		$current_version .= '.' . $custom_revision;
	}
	
	return $current_version;
}
