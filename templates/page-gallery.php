<?php
	/*
	Template Name: Gallery Page
	*/

 	get_header(); ?>
					<section id="main-content" role="main">
						<div class="container content grid-boxes">
							<div class="page-descrition margin-bottom-40">
								<?php while ( have_posts() ) : the_post() ;
									the_content(); ?>
									<hr>
								<?php endwhile ;?>
							</div>
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
											<?php  $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'grid3');?>
											<a class="thumbnail fancybox-button zoomer" title="<?php the_title(); ?>" data-rel="fancybox-button" href="<?php print $image_url[0] ?>">
						                        <span class="overlay-zoom">  
 													<img src="<?php print $image_url[0] ?>"  class="img-responsive" >
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