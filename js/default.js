/**
 * Sitewide Scripts
 *
 * JavaScripts used throughout the site.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

jQuery(document).ready(function($) {	
	
	// Hide address bar on iPhone
	//window.scrollTo(0,1);
	
	/**
	 * Setup the Mailchimp widget display
	 */
	/*
	$('input[name$="mailchimp_email"]').val('Enter your email address').addClass('default');
	
	// Setup the Mailchimp widget events
	$('input[name$="mailchimp_email"]').focusin(function(){
		var val = $(this).val();
		if( val == 'Enter your email address' ) {
			$(this).val('').removeClass('default');
		}
	}).focusout(function() {
		var val = $(this).val();
		if( val == '' ) {
			$(this).val('Enter your email address').addClass('default');
		}
	});
	*/	
});

