<?php
/**
 * Enable and configure theme options.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 */
function dpe_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style( 'dpe-theme-options', get_template_directory_uri() . '/css/theme-options.css', array('thickbox'), DPE_THEME_VER );
	wp_enqueue_script( 'dpe-theme-options', get_template_directory_uri() . '/js/theme-options.min.js', array('media-upload','thickbox'), DPE_THEME_VER );
}
//add_action( 'admin_print_styles-appearance_page_theme_options', 'dpe_admin_enqueue_scripts' );

/**
 * Register the form setting for our dpe_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, dpe_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are complete, properly
 * formatted, and safe.
 *
 */
function dpe_theme_options_init() {

	register_setting(
		'dpe_full_options',       			// Options group, see settings_fields() call in dpe_theme_options_render_page()
		'dpe_full_theme_options', 			// Database option, see dpe_get_theme_options()
		'dpe_full_theme_options_validate'	// The sanitization callback, see dpe_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section( 'general',	__( 'General', 'dpe-baseline' ),	'__return_false',	'theme_options' );
	add_settings_section( 'footer',		__( 'Footer', 'dpe-baseline' ),		'__return_false',	'theme_options' );
	
	// Register our individual settings
	add_settings_field( 'enable-shares',	__( 'Enable Share Links', 'dpe-baseline' ),		'dpe_settings_field_general_shares',	'theme_options', 'general' );
	add_settings_field( 'facebook-key',		__( 'Facebook API Key', 'dpe-baseline' ),		'dpe_settings_field_facebook_appid',	'theme_options', 'general' );
	
	add_settings_field( 'footer-copyright',		__( 'Footer Copyright', 'dpe-baseline' ),	'dpe_settings_field_footer_copyright',	'theme_options', 'footer' );

}
add_action( 'admin_init', 'dpe_theme_options_init' );

/**
 * Change the capability required to save the 'dpe_options' options group.
 *
 * @see dpe_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see dpe_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * By default, the options groups for all registered settings require the manage_options capability.
 * This filter is required to change our theme options page to edit_theme_options instead.
 * By default, only administrators have either of these capabilities, but the desire here is
 * to allow for finer-grained control for roles and users.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function dpe_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_dpe_options', 'dpe_option_page_capability' );


/**
 * Add our theme options page to the admin menu, including some help documentation.
 *
 * This function is attached to the admin_menu action hook.
 *
 */
function dpe_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'dpe' ),   		// Name of page
		__( 'Theme Options', 'dpe' ),   		// Label in menu
		'edit_theme_options',               	// Capability required
		'theme_options',                    	// Menu slug, used to uniquely identify the page
		'dpe_full_theme_options_render_page'	// Function that renders the options page
	);

	if ( ! $theme_page )
		return;

	//add_action( "load-$theme_page", 'dpe_theme_options_help' );

}
add_action( 'admin_menu', 'dpe_theme_options_add_page' );


/**
 * Returns the default options.
 *
 */
function dpe_get_default_theme_options() {
	$default_theme_options = array(
		'enable-shares'		=> __( 0, 'dpe-baseline' ),
		'facebook-appid'	=> '',
		'footer-copyright'	=> '',
	);
	return apply_filters( 'dpe_default_theme_options', $default_theme_options );
}


/**
 * Returns the options array.
 */
function dpe_get_theme_options() {
	return get_option( 'dpe_full_theme_options', dpe_get_default_theme_options() );
}


/**
 * Renders the welcome title field.
 *
 */
function dpe_settings_field_general_shares() {
	$options = dpe_get_theme_options();
	?>
	<label for="enable-shares"><input type="checkbox" class="" name="dpe_full_theme_options[enable-shares]" id="enable-shares" value="1" <?php checked( $options['enable-shares'], '1' ); ?> /><br />
	<span class="description">Enabled the social sharing links (Facebook, Twitter) on business profiles.</span></label>
	<?php
}


/**
 * Renders the Facebook API Key field.
 *
 */
function dpe_settings_field_facebook_appid() {
	$options = dpe_get_theme_options();
	?>
	<input type="text" class="regular-text" name="dpe_full_theme_options[facebook-appid]" id="facebook-appid" value="<?php echo isset( $options['facebook-appid'] ) ? esc_attr( $options['facebook-appid'] ) : ''; ?>" /><br />
	<span class="description">Provide a <a target="_blank" title="Create a new Facebook App ID" href="https://developers.facebook.com/apps/?action=create">Facebook App ID</a> to enable the Facebook Like button.
	<?php
}


/**
 * Renders the footer copyright field.
 *
 */
function dpe_settings_field_footer_copyright() {
	$options = dpe_get_theme_options();
	?>
	<textarea class="big" id="footer-copyright" cols="50" rows="5" maxlength="1100" name="dpe_full_theme_options[footer-copyright]"><?php echo isset( $options['footer-copyright'] ) ? esc_textarea( $options['footer-copyright'] ) : ''; ?></textarea>
	<?php
}


/**
 * Returns the options array.
 *
 */
function dpe_full_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'dpe' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>
		<form method="post" action="options.php">
			<?php
				settings_fields( 'dpe_full_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see dpe_theme_options_init()
 *
 */
function dpe_full_theme_options_validate( $input ) {

	$output = $defaults = dpe_get_default_theme_options();
	
	// Sharing enabled?
	if( isset( $input['enable-shares'] ) )
		$output['enable-shares'] = (int)$input['enable-shares'];
		
	// API Key
	if( isset( $input['facebook-appid'] ) )
		$output['facebook-appid'] = esc_attr( $input['facebook-appid'] );
	
	// Footer settings
	if( isset( $input['footer-copyright'] ) )
		$output['footer-copyright'] = wp_kses_post( $input['footer-copyright'] );

	return apply_filters( 'dpe_theme_options_validate', $output, $input, $defaults );
	
}


/**
 * Renders a contextual help menu for our theme options page
 *
 * @see dpe_theme_options_add_page()
 *
 * @TODO edit help menu, if necessary.
 *
 */
function dpe_theme_options_help() {

	$help = '<p>' . __( 'Some themes provide customization options that are grouped together on a Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme provides the following Theme Options:', 'dpe' ) . '</p>' .
			'<ol>' .
				'<li>' . __( '<strong>City Name</strong>: Enter the name of the city.', 'dpe' ) . '</li>' .
				'<li>' . __( '<strong>City Image</strong>: Upload an image of the city and then click the &quot;Use this image&quot; button.  An image exactly 228px(w) by 323px(h) works best. Images with a different width or height will be resized &amp; cropped to fit these dimensions.', 'dpe' ) . '</li>' .
			'</ol>' .
			'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'dpe' ) . '</p>';

	$sidebar =	'<p><strong>' . __( 'For more information:', 'dpe' ) . '</strong></p>' .
				'<p>' . __( '<a href="http://codex.wordpress.org/Appearance_Theme_Options_Screen" target="_blank">Documentation on Theme Options</a>', 'dpe' ) . '</p>' .
				'<p>' . __( '<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>', 'dpe' ) . '</p>';
		
	$screen = get_current_screen();
	
	$screen->add_help_tab( array(
		'title' => __( 'Overview', 'dpe' ),
		'id' => 'theme-options-help',
		'content' => $help,
		)
	);

	$screen->set_help_sidebar( $sidebar );
	
}



/**
 * Echos the social share buttons in their little wrapper DIV
 */
function dpe_the_share_buttons() {
	$options = dpe_get_theme_options();
	if ( $options['enable-shares'] == 1 ):
?>
	<div class="shares">
		<div class="g-plusone" data-size="medium"></div>
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="vinchurchplant" data-dnt="true">Tweet</a>
		<?php if( isset( $options['facebook-appid'] ) && !empty( $options['facebook-appid'] ) ): ?>
			<div class="fb-like" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false"></div>
		<?php endif; ?>
	</div>
<?php
	endif;
}



/**
 * Add the social share scripts to the site footer
 */
function dpe_the_share_scripts() {

	$options	= dpe_get_theme_options();
	$output		= '';
	
	// Facebook
	if ( isset( $options['facebook-appid'] ) && !empty( $options['facebook-appid'] ) ) {
		$output .= '<div id="fb-root"></div>' . "\n";
		$output .= '<script>/* Facebook */ (function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/en_US/all.js#xfbml=1&appId=' . esc_attr( $options['facebook-appid'] ) . '";fjs.parentNode.insertBefore(js,fjs);}(document,"script","facebook-jssdk"));</script>' . "\n";
	}
	// Twitter
	$output .= '<script>/* Twitter  */ !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>' . "\n";
	
	// Facebook
	$output .= '<script>/* Google+ */ (function() {var po=document.createElement("script");po.type="text/javascript";po.async=true;po.src="https://apis.google.com/js/plusone.js";var s=document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);})();</script>' . "\n";

	if ( $options['enable-shares'] == 1 )
		echo $output;
	
}
add_action( 'wp_footer', 'dpe_the_share_scripts', 100 );
