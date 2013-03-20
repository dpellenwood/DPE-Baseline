<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>

	<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<h1 class="entry-title"><?php the_title(); ?></h1>
		
			<?php
				if( has_post_thumbnail() )
					the_post_thumbnail();
			?>
			
			<div class="entry-meta">
				<?php
					$categories_list = get_the_category_list( __( ', ', 'dpe-baseline' ) );
					if ( $categories_list ):
				?>
				<span class="cat-links">
					<?php echo $categories_list; ?>
				</span>
				<?php endif; ?>
				<time class="pub-date" datetime="<?php the_time('Y-m-d'); ?>" pubdate><?php the_time('F j, Y'); ?></time>
			</div>
			
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			
			<footer class="entry-meta">
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'dpe-baseline' ) );
					if ( $tags_list ): ?>
					<span class="tag-links">
						<?php printf( __( '<span class="%1$s">Tags:</span> %2$s', 'dpe-baseline' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
				<?php endif; // End if $tags_list ?>
			</footer>
				
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php comments_template( '', true ); ?>

	<?php endwhile; // end of the loop. ?>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>