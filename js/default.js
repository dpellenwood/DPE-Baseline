/**
 * Sitewide Scripts
 *
 * JavaScripts used throughout the public site.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

jQuery(document).ready(function($) {
	
	// Remove the title bar in iOS.
	//setTimeout(function() { window.scrollTo(0, 1) }, 100 );
	
	// Enable the masthead menu 
	$('#menu-toggle').click( function(e) {
		e.preventDefault();
		$('#site-nav').slideToggle();
		$(this).find('span').toggleClass('icon-arrow-down icon-arrow-up');
	});
	
});
