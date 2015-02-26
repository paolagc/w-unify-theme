
<?php
	/*
	Template Name: Blog Inverse
	*/

 	get_header(); ?>
					<section id="main-content" role="main">
						<div class="one-page">
							<?php 
								$args = array( 'post_type' => 'post', 'cat' => '0','paged' =>  $paged );
    							query_posts( $args );
								if ( have_posts() ) :
								$cont = 0;
								while ( have_posts() ) : the_post(); 
								$thumbnail = get_the_post_thumbnail( $post->ID, array(550 , 350) );
							?>
									<div id="post-<?php the_ID(); ?>" class="one-page-inner">
											<div class="row">
												<div class="col-md-6">
													<?php 
													if($cont % 2 == 0): ?>
														<h3 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														<?php 
															$content = get_the_content(); 
															echo substr( $content, 0, 400);
														?>
													<?php else:
														print $thumbnail;	
													endif; ?>
												</div>
												<div class="col-md-6">
													<?php 
													if($cont % 2 == 1):
														print $thumbnail;
													else: ?>
														<h3 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
														<?php 
															$content = get_the_content(); 
															echo substr( $content, 0, 400);
														?>
													<?php endif ?>
												</div>
											</div>
									</div>
								<?php $cont++; ?>
								<?php endwhile; 
								endif; // end have_posts() check ?>
						</div>
					</section>
<?php get_footer(); ?>