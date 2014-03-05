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
 * Include other helpful theme functions
 */
require_once( get_template_directory() . '/inc/helpers.php' );	// Miscellaneous DPE Baseline helper functions.
require_once( get_template_directory() . '/inc/admin.php' );	// WP-ADMIN specific functions.
require_once( get_template_directory() . '/inc/widgets.php' );	// Initiate any theme-specific widgets.
require_once( get_template_directory() . '/inc/sidebars.php' );	// Register custom widgets and sidebar/widget areas.
require_once( get_template_directory() . '/inc/comments.php' );	// Actions & functions to tweak comments output.
require_once( get_template_directory() . '/inc/theme.php' );	// Theme specific functions.


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @author David Paul Ellenwood (dpe415)
 */
if ( ! function_exists( 'dpe_baseline_setup' ) ) :

	function dpe_baseline_setup() {
	
		// Set the content_width since oEmbeds rely on this
		if ( ! isset( $content_width ) ) {
			$content_width = 600;
		}
 
		// Define the theme version
		define( 'DPE_THEME_VER', dpe_static_file_version() );
		
		// Prevent File Modifications through the admin panel
		define ( 'DISALLOW_FILE_EDIT', true );
		
		// Remove a number of generated links
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'parent_post_rel_link' );
		remove_action( 'wp_head', 'start_post_rel_link' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
		
		// Add default posts and comments RSS feed links to <head>.
		add_theme_support ( 'automatic-feed-links' );
		
		// Add Feature image support  
		add_theme_support ( 'post-thumbnails' );
			//set_post_thumbnail_size( 228, 323, true );
			//add_image_size( 'size-two', 340, 260, true );
		
		// Register any menu locations in the theme
		register_nav_menus(
			array(
			  'header-menu' => 'Header Navigation',
			)
		);
		
		// Initialize our sidebars/widget areas
		//add_action( 'widgets_init', 'dpe_baseline_sidebars_init' );
		
		// Initialize any custom widgets
		//add_action( 'widgets_init', 'dpe_baseline_widgets_init' );
		
		// Add shortcode filters to text widgets
		add_filter( 'widget_text', 'do_shortcode' );
		
		// Add an editor stylesheet
		//add_editor_style('css/editor.css'); // Style the visual editor.
		
		// Enqueue front-end scripts
		add_action( 'wp_enqueue_scripts', 'dpe_baseline_scripts' );
		
		// Enqueue front-end styles
		add_action( 'wp_enqueue_scripts', 'dpe_baseline_styles' );
		
		// Enqueue admin scripts
		//add_action( 'admin_enqueue_scripts', 'dpe_admin_scripts' );
		
		// Enqueue admin styles
		//add_action( 'admin_enqueue_scripts', 'dpe_admin_styles' );
		
		// Load up our theme options page and related code.
		//require_once( get_template_directory() . '/inc/theme-options.php' );
		
	}
	
endif; // dpe_baseline_setup

add_action( 'after_setup_theme', 'dpe_baseline_setup' );
