
<?php get_header(); ?>
			<?php $width = 12;
				if( is_active_sidebar( 'sidebar' ) ) $width -=3;
			 ?>
			<div class="row">
					<?php get_sidebar(); ?>
					<section id="main-content" class="col-md-<?php print $width; ?>" role="main">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<article id="post-<?php the_ID(); ?>" class="row block margin-bottom-20">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="col-md-4 col-sm-12">
											<?php the_post_thumbnail('archive-thumb' , array('class' => 'img-bordered')); ?>
										</div>
									<?php endif; ?>
									<div class="col-md-<?php print (has_post_thumbnail() ? 8 : 12)?> col-sm-12">
										<h2 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<div class="entry">
											<p class="margin-bottom-20"><?php 
												$content = get_the_content(); 
												echo substr( $content, 0, 400);
											?></p>
											<a href="<?php the_permalink() ?>" class="pull-right button read-more">Leer mas >></a>
										</div>
									</div>

								</article><!-- #post-theID-->
							<?php endwhile; ?>
						<?php endif; // end have_posts() check ?>
					</section>
			</div>
<?php get_footer(); ?>

	