<?php
/**
 * The template for displaying all single posts.
 *
 * @package _
 */get_header(); ?>
			<?php $width = 12;
				if( is_active_sidebar( 'sidebar' ) ) $width -=3;
			 ?>
			<div class="row blog-page blog-item">
					<?php get_sidebar(); ?>
					<section id="main-content" class="col-md-<?php print $width ?>" role="main">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'single' ); ?>

							<?php the_post_navigation(); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; // end of the loop. ?>
					</section>
			</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>