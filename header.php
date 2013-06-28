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
	
	<link type="text/css" href="//fonts.googleapis.com/css?family=Merriweather:400,400italic,700,700italic" rel="stylesheet">
	<script type="text/javascript" src="//use.typekit.net/uvj5ocq.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<span class="banner" aria-hidden="true"></span>
	
	<div class="wrap">
	
		<header id="masthead" role="navigation">
			
			<?php if( is_front_page() ): ?>
				<h1 class="site-name offset-text"><?php bloginfo('name'); ?></h1>
			<?php else: ?>
				<div class="site-name offset-text"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
			<?php endif; ?>
			
			<div class="main-menu">
				<a id="menu-toggle" class="toggle" href="#">Menu<span aria-hidden="true" class="icon-arrow-down"></span></a>
				<nav id="site-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'primary-header-menu', 'container' => false, 'menu_class' => 'primary menu' ) ); ?>
					<?php wp_nav_menu( array( 'theme_location' => 'secondary-header-menu', 'container' => false, 'menu_class' => 'secondary menu' ) ); ?>
					<?php get_search_form(); ?>
				</nav>
			</div>
			
		</header><!-- #masthead -->
		
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumbs">','</div>'); } ?>
		
		<div id="content" role="main">