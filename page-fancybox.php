<?php
/*
Template Name: Fancybox Gallery
*/
get_header(); ?>

			<?php $width = 12;
				if( is_active_sidebar( 'left' ) ) $width -=3;
			 ?>
			<div class="row">
					<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
						<aside id="sidebar" class="widget-area" role="complementary">
								<?php dynamic_sidebar( 'sidebar' ); ?>
						</aside><!-- #left sidebar region -->
					<?php endif; ?>	

					<section id="main-content" class="col-md-<?php print $width; ?>" role="main">
						<div class="gallery-page">
							<?php if ( have_posts() ) :
									$cont = 0;
									while ( have_posts() ) : the_post(); ?>
										<?php if ($cont % 4 == 0) ?>
											<div class="row margin-bottom-20">
										<?php endif; ?>
											<div class="col-md-3 col-sm-6">
							                    <a class="thumbnail fancybox-button zoomer" data-rel="fancybox-button" title="'.<?php the_title(); ?>.'" href="'.<?php the_permalink(); ?>.'">
							                        <span class="overlay-zoom">  
							                            <?php the_post_thumbnail( array( 260, 160), array( 'class' => 'img-responsive') ); ?> 
							                            <span class="zoom-icon"></span>
							                        </span>                                              
							                    </a>
							                </div>
										<?php if ($cont % 4 == 3) ?>
											</div>
										<?php endif; ?>

									<?php $cont++; ?>
									<?php endwhile; 
							endif; // end have_posts() check ?>
						</div>
					</section>
			</div>
<?php get_footer(); ?>