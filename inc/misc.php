<?php
/**
 * Theme-specific functions of many kinds
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
 

/** Add front-end CSS & JavaScripts */
function dpe_baseline_sns() {
	
	// Lod stylesheets
	wp_enqueue_style( 'dpe-baseline', get_stylesheet_directory_uri() . '/css/style.css', array(), DPE_THEME_VER, 'all' );
	
	// Load JavaScripts
	wp_enqueue_script( 'dpe-baseline-plugins', get_stylesheet_directory_uri() . '/js/plugins.min.js', array( 'jquery' ), DPE_THEME_VER, true );
	wp_enqueue_script( 'dpe-baseline-default', get_stylesheet_directory_uri() . '/js/default.min.js', array( 'jquery' ), DPE_THEME_VER, true );
	
}
add_action( 'wp_enqueue_scripts', 'dpe_baseline_sns' );


/**
 * Add some admin styles & scripts. 
 */
function dpe_admin_sns( $hook ) {
	global $post_type;
    if( ('post.php' == $hook) && ( 'brew' == $post_type || 'post' == $post_type ) ) {
		wp_enqueue_style( 'dpe-admin', get_stylesheet_directory_uri() . '/css/admin.css', array(''), DPE_THEME_VER, 'all' );
		//wp_enqueue_script( 'dpe-admin', get_stylesheet_directory_uri() . '/css/admin.min.js', array(''), DPE_THEME_VER, true );
	}
}
//add_action( 'admin_enqueue_scripts', 'dpe_admin_sns', 8 );


/**
 * Disable WordPress a number of WordPress generated header links
 */
function dpe_remove_wp_head_links() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
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
function dpe_page_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'dpe-baseline' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'dpe-baseline' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'dpe-baseline' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}

/**
 * Disable & adjust some admin items for WordPress SEO
 */
function dpe_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wpseo-menu');
}
add_action( 'wp_before_admin_bar_render', 'dpe_admin_bar_render' );

// Remove 'page analysis' and annoying SEO columns
add_filter( 'wpseo_use_page_analysis', '__return_false' );

// Adjust the priority of the edit metabox
function dpe_adjust_wpseo_edit_priority() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'dpe_adjust_wpseo_edit_priority' );


/**
 * Adjust the location of some core metaboxes
 */
function dpe_adjust_remove_metaboxes() {
	foreach ( get_post_types( array( 'public' => true ) ) as $post_type ) {
		remove_meta_box( 'authordiv', $post_type, 'normal' );
		remove_meta_box( 'revisionsdiv', $post_type, 'normal' );
	}
}
add_action( 'admin_menu', 'dpe_adjust_remove_metaboxes' );

function dpe_adjust_add_metaboxes() {
	if( isset( $_GET['post'] ) ) {
		$post_ID = $_GET['post'];
		$post_ID = isset($post_ID) ? (int) $post_ID : 0;
		foreach ( get_post_types( array( 'public' => true ) ) as $post_type ) {
			$post_type_object = get_post_type_object($post_type);
			if ( post_type_supports($post_type, 'author') ) {
				if ( is_super_admin() || current_user_can( $post_type_object->cap->edit_others_posts ) )
					add_meta_box('authordiv', __('Author'), 'post_author_meta_box', $post_type, 'side', 'low');
			}
			if ( post_type_supports($post_type, 'revisions') && 0 < $post_ID && wp_get_post_revisions( $post_ID ) )
				add_meta_box('revisionsdiv', __('Revisions'), 'post_revisions_meta_box', $post_type, 'side', 'low');
		}
	}
}
add_action( 'admin_menu', 'dpe_adjust_add_metaboxes' );
