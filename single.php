<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>
	
	<div class="colmwrap">
	
		<div class="colm">
	
			<?php while( have_posts() ): the_post(); ?>
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php
						if( has_post_thumbnail() )
							the_post_thumbnail();
					?>
					
					<div class="boxed">
					
						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						<div class="entry-meta">
							<div class="attribution">
								<span class="author">by <span class="entry-author"><?php the_author_posts_link(); ?></span></span>
								<span class="date"> on <time class="pub-date" datetime="<?php the_time('Y-m-d'); ?>" pubdate><?php the_time('m/d/Y'); ?></time></span>
							</div>
							<?php dpe_the_share_buttons(); ?>
						</div>
						
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
						
						<footer class="entry-meta">
							
							<?php $categories_list = get_the_category_list( __( ', ', 'dpe-baseline' ) ); if ( $categories_list ): ?>
								<span class="cat-links">
									<?php printf( __( '<span class="%1$s">Posted in: </span> %2$s', 'dpe-baseline' ), 'entry-utility-prep entry-utility-prep-tag-links', $categories_list ); ?>
								</span>
							<?php endif; ?>
							
							<?php $tags_list = get_the_tag_list( '', __( ', ', 'dpe-baseline' ) ); if ( $tags_list ): ?>
								<?php if ( $categories_list ): ?>
									<span class="entry-utility separator"> and </span>
								<?php endif; ?>
								<span class="tag-links">
									<?php printf( __( '<span class="%1$s">Tagged:</span> %2$s', 'dpe-baseline' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
								</span>
							<?php endif; ?>
							
						</footer>
					
					</div><!-- .boxed -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
				<?php comments_template( '', true ); ?>
		
			<?php endwhile; // end of the loop. ?>
		
		</div><!-- .colm -->

	</div><!-- .colmwrap -->

	
<?php get_sidebar(); ?>
<?php get_footer(); ?>