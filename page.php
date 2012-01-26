<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>

		<div id="primary" class="eight columns">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'article', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>