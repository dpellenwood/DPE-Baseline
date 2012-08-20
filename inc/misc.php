<?php
/**
 * Theme-specific functions of many kinds
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
 

/** Add front-end CSS & JavaScripts */
function dpe_baseline_css_js() {
	
	// Main stylesheet
	wp_enqueue_style( 'dpe', get_stylesheet_directory_uri() . '/style.css', array(), DPE_THEME_VER, 'all' );
	
	// Load jQuery from Google instead of the internal WP version
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', NULL, NULL, true);
	
	// Load additional JS
	wp_enqueue_script( 'dpe-baseline-plugins', get_bloginfo('stylesheet_directory') . '/js/plugins.js', array( 'jquery' ), DPE_THEME_VER, true );
	wp_enqueue_script( 'dpe-baseline-default', get_bloginfo('stylesheet_directory') . '/js/default.js', array( 'jquery' ), DPE_THEME_VER, true );
	
}
add_action( 'wp_enqueue_scripts', 'dpe_baseline_css_js' );


/**
 * Add some admin styles & scripts. 
 */
function dpe_admin_sns( $hook ) {
	global $post_type;
    if( ('post.php' == $hook) && ( 'brew' == $post_type || 'post' == $post_type ) ) {
		wp_enqueue_style( 'dpe-admin', get_stylesheet_directory_uri() . '/css/admin-style.css', array(''), DPE_THEME_VER, 'all' );
		//wp_enqueue_script( 'dpe-admin', get_stylesheet_directory_uri() . '/css/admin-script.js', array('farbtastic'), DPE_THEME_VER, true );
	}
}
//add_action( 'admin_enqueue_scripts', 'dpe_admin_sns', 8 );


/**
 * Disable WordPress a number of WordPress generated header links
 */
function dpe_remove_wp_head_links() {
	remove_action( 'wp_head', 'start_post_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'parent_post_rel_link' );
}
add_action('init', 'dpe_remove_wp_head_links');


/**
 * Sets the post excerpt length to 40 words.
 */
function dpe_excerpt_length( $length ) {
	return 40;
}
//add_filter( 'excerpt_length', 'dpe_excerpt_length' );


/**
 * Returns a "Continue Reading" link for excerpts
 */
function dpe_continue_reading_link() {
	return ' <a class="more" href="'. esc_url( get_permalink() ) . '">' . __( 'Read more', 'twentyeleven' ) . '</a>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and dpe_continue_reading_link().
 */
function dpe_auto_excerpt_more( $more ) {
	return '&hellip;';
}
//add_filter( 'excerpt_more', 'dpe_auto_excerpt_more' );


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function dpe_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output;
	}
	return $output;
}
//add_filter( 'get_the_excerpt', 'dpe_custom_excerpt_more' );


/**
 * Display navigation to next/previous pages when applicable
 */
function dpe_page_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
