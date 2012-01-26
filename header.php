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
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	
	<title><?php wp_title(); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="initial-scale=1.6; maximum-scale=1.0; width=device-width; " />
  
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="container">
		
		<header id="access" class="row" role="navigation">
		
			<a class="brandmark" href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a>
			<div class="slogan"><?php bloginfo('description'); ?></div>
			
			<span id="skipnav" class="show-on-phones"><a href="#content">Skip to Content?</a></span>
			
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav-bar', 'container' => 'nav') ); ?>
			
		</header>
		
		<div id="main" class="row">
		
		
				