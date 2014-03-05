<?php
/**
 * DPE Baseline helper functions of many kinds
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
 

/**
 * Add theme JavaScripts
 */
function dpe_baseline_scripts() {
	wp_enqueue_script( 'dpe-baseline-theme',	get_stylesheet_directory_uri() . '/assets/scripts/theme.min.js', array( 'jquery' ), DPE_THEME_VER, true );
}

/**
 * Add theme styles
 */
function dpe_baseline_styles() {
	wp_enqueue_style( 'dpe-baseline-theme',		get_stylesheet_directory_uri() . '/assets/styles/theme.css',	array(), DPE_THEME_VER, 'all' );
	wp_enqueue_style( 'dpe-baseline-extras',	get_stylesheet_directory_uri() . '/assets/styles/extras.css',	array(), DPE_THEME_VER, 'all' );
}


/**
 * Add admin JavaScripts
 */
function dpe_admin_scripts( $hook ) {
	global $post_type;
    if( ('post.php' == $hook) && ( 'post' == $post_type ) ) {
		wp_enqueue_script( 'dpe-baseline-admin', get_stylesheet_directory_uri() . '/assets/scripts/admin.min.js', array(''), DPE_THEME_VER, true );
	}
}


/**
 * Add admin styles
 */
function dpe_admin_styles( $hook ) {
	global $post_type;
    if( ('post.php' == $hook) && ( 'post' == $post_type ) ) {
		wp_enqueue_style( 'dpe-baseline-admin', get_stylesheet_directory_uri() . '/assets/styles/admin.css', array(''), DPE_THEME_VER, 'all' );
	}
}



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


/**
 * Create a simple date shortcode
 */
function dpe_the_date( $atts ) {
	
	extract( shortcode_atts( array(
		'format' => 'Y',
	), $atts ) );
	
	return date( $format );
	
}
add_shortcode( 'date', 'dpe_the_date' );


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
	return ' <a class="more" href="'. esc_url( get_permalink() ) . '">' . __( 'Read more', 'dpe-baseline' ) . '</a>';
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
function dpe_page_nav( $nav_id, $query = null ) {
	
	if ( ! $query ) {
		global $wp_query;
		$query = $wp_query;
	}
	
	if ( $query->max_num_pages > 1 ) :
?>
	<nav id="nav-<?php echo $nav_id; ?>" class="paging cf">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"></span> Older entries', 'dpe-baseline' ), $query->max_num_pages ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer entries <span class="meta-nav"></span>', 'dpe-baseline' ), $query->max_num_pages ); ?></div>
	</nav><!-- #nav-<?php echo $nav_id; ?> -->
<?php
	endif;
}

