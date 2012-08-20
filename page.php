<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>

	<?php while( have_posts() ): the_post(); ?>

		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<h1 class="entry-title"><?php the_title(); ?></h1>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
				
		</article><!-- #page-<?php the_ID(); ?> -->

	<?php endwhile; // end of the loop. ?>
		
<?php get_footer(); ?>