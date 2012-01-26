<?php
/**
 * The File Not Found (404) template file.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>
	
		<div id="content" role="main" class="eight columns">

			<article id="post-404" class="post no-results not-found">
			
				<header class="entry-header">
					<h1 class="entry-title">Oops! Nothing Found</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
				
			</article><!-- #post-0 -->

		</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>