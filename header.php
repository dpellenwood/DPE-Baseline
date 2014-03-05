<?php
/**
 * Site Header
 *
 * The site header.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */
?><!DOCTYPE html>
<!--[if lte IE 8]>     <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	
	<title><?php wp_title(''); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	
	<!--[if lte IE 8]>
	     <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<header id="masthead" role="navigation">
		
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'nav') ); ?>
		
	</header><!-- #masthead -->
	
	<div id="content" role="main">