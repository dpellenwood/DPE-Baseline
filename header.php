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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
		
	<header id="masthead" role="navigation">
		
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'nav') ); ?>
		
	</header><!-- #masthead -->
	
	<div id="content" role="main">