<?php
/**
 * The File Not Found (404) template file.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>

	<article id="nothing-found" class="no-results not-found">
			
		<header class="entry-header">
			<h1 class="entry-title"><?php _e('Page Not Found', 'dpe-baseline' ); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<p><?php _e('Apologies, but we couldn\'t find the page you requested.', 'dpe-baseline' ); ?></p>
		</div><!-- .entry-content -->
		
	</article><!-- #nothing-found -->

<?php get_footer(); ?>