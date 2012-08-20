<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage DPE_Baseline
 */

get_header(); ?>
		
		<section id="blog" role="main">
		
		<?php if( have_posts() ): ?>

			<?php while( have_posts() ): the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php
						if( has_post_thumbnail() )
							the_post_thumbnail();
					?>
					
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
					<div class="entry-meta">
						<?php
							$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
							if ( $categories_list ):
						?>
						<span class="cat-links">
							<?php echo $categories_list; ?>
						</span>
						<?php endif; ?>
						<time class="pub-date" datetime="<?php the_time('Y-m-d'); ?>" pubdate><?php the_time('F j, Y'); ?></time>
					</div>
					
					<div class="entry-content summary">
						<?php the_excerpt(); ?>
					</div>
					
					<footer class="entry-utility">
						<span class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></span>
						<?php if ( comments_open() && ! post_password_required() ) : ?>
							<span class="comment-count"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>
						<?php endif; ?>
					</footer>
						
				</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
			
				<header class="entry-header">
					<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h2>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
				
			</article><!-- #post-0 -->

		<?php endif; ?>

		</section><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>