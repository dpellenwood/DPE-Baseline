<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>

		<div id="primary" class="eight columns">
			<div id="content" role="main">
	
			<?php if ( have_posts() ) : ?>
	
				<?php dpe_page_nav( 'nav-above' ); ?>
	
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'article' ); ?>
	
				<?php endwhile; ?>
	
				<?php dpe_page_nav( 'nav-below' ); ?>
	
			<?php else : ?>
	
				<article id="post-0" class="post no-results not-found">
				
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->
	
					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
					
				</article><!-- #post-0 -->
	
			<?php endif; ?>
	
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>