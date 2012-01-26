/**
 * Sitewide Scripts
 *
 * JavaScripts used throughout the site.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 * @since DPE Baseline 0.1
 */
jQuery(document).ready(function($) {
	
	// Hide address bar on iPhone
	window.scrollTo(0,1);
	
	// Adds support for the nav-bar with flyouts in WordPress
	$('.nav-bar li').has('ul').addClass("has-flyout");
	$('.nav-bar li ul').addClass("flyout");	

});
