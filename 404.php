<?php
/**
 * The File Not Found (404) template file.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>

			<article id="post-404" class="post no-results not-found">
			
				<header class="entry-header">
					<h1 class="entry-title">Oops! Nothing Found</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p>Apologies, but no results were found for the requested archive. You may want to try one of these options instead:</p>
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'nav') ); ?>
				</div><!-- .entry-content -->
				
			</article><!-- #post-0 -->
		
<?php get_footer(); ?>