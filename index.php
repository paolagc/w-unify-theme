
<?php get_header(); ?>
			<?php $width = 12;
				if( is_active_sidebar( 'sidebar' ) ) $width -=3;
			 ?>
			<div class="row">
					<section id="main-content" class="col-md-<?php print $width; ?>" role="main">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="row blog blog-medium margin-bottom-40">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="col-md-5">
											<?php the_post_thumbnail('medium'); ?>
										</div>
										<div class="col-md-<?php print ( has_post_thumbnail())? 7 : 12 ?>">
											<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
											<ul class="list-unstyled list-inline blog-info">
										        <li><i class="fa fa-calendar"></i> <?php the_date('Y-m-d'); ?></li>
										        <li><i class="fa fa-pencil"></i> <?php the_author_link(); ?></li>
										        <li><i class="fa fa-comments"></i> <a href="#"> <?php comments_number( '0 comments', '1 comment', '% comments' ); ?>.</a></li>
										    </ul>
										    <?php the_excerpt(); ?> 
										    <a href="<?php echo get_permalink( ); ?>" class="btn-u btn-u-sm">Read More<i class="fa fa-angle-double-right"></i></a>
										</div>
									<?php endif; ?>
								</div>
								<hr>
							<?php endwhile; ?>
						<?php endif; // end have_posts() check ?>
					</section>
					<?php get_sidebar(); ?>
			</div>
<?php get_footer(); ?>

	