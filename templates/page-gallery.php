<?php
	/*
	Template Name: Gallery Page
	*/

 	get_header(); ?>
					<section id="main-content" role="main">
						<div class="container content grid-boxes masonry">
							<?php 
								$args = array( 'post_type' => 'post', 'cat' => '0','paged' =>  $paged );
    							query_posts( $args );
    							$cont = 0;
								if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
								<?php if($cont % 4 == 0): ?>
									<div class="row">
								<?php endif; ?>
										<div class="col-md-3 col-sm-6">
											<a class="thumbnail fancybox-button zoomer" data-rel="fancybox-button" title="<?php print the_title(); ?>" href="<?php print the_permalink(); ?>">
						                        <span class="overlay-zoom">  
						                            <?php the_post_thumbnail( array(260, 160) );?>
						                            <span class="zoom-icon"></span>
						                        </span>                                              
						                    </a>
										</div>
								<?php if($cont % 4 == 3): ?>	
									</div>
								<?php endif; ?>
								<?php 
								$cont++;
								endwhile;
								endif; ?>
						</div>
					</section>
<?php get_footer(); ?>