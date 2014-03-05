<?php
/**
 * WP-Admin specific functions of many kinds
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
 


/**
 * Adjust the location of some core metaboxes
 */

// Remove the author and revisions meta box
function dpe_adjust_remove_metaboxes() {
	foreach ( get_post_types( array( 'public' => true ) ) as $post_type ) {
		remove_meta_box( 'authordiv', $post_type, 'normal' );
		remove_meta_box( 'revisionsdiv', $post_type, 'normal' );
	}
}
add_action( 'admin_menu', 'dpe_adjust_remove_metaboxes' );


// Re-add the author and revisions metaboxes on the right-side of the editor, instead of in the main column.
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

