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
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
<head>
	
	<title><?php wp_title(''); ?></title>
	
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
		
	<header id="masthead" role="navigation">
		
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'nav') ); ?>
		
	</header><!-- #masthead -->
	
	<div id="content" role="main">