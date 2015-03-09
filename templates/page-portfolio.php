<?php
	/*
	Template Name: Portfolio Page
	*/

 	get_header(); ?>
					<section id="main-content" role="main">
						<div class="container content">
							<?php 
								$args = array( 'post_type' => 'post', 'cat' => '0','paged' =>  $paged );
    							query_posts( $args );
    							$cont = 0;
								if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
								<?php if($cont % 3 == 0): ?>
									<div class="row">
								<?php endif; ?>
										<div class="col-md-4">
											<div class="view view-tenth">
							                    <?php the_post_thumbnail('grid3' );?>
							                    <div class="mask">
							                        <?php the_title( '<h2>', '</h2>' ); ?>
							                        <?php 
							                        	$content = get_the_excerpt();
							                        	print substr($content, 0, 150);
							                        ?>
							                        <br>
							                        <a href="<?php the_permalink() ?>" class="info">Read More</a>
							                    </div>                
							                </div>
										</div>
								<?php if($cont % 3 == 2): ?>	
									</div>
								<?php endif; ?>
								<?php 
								$cont++;
								endwhile;
								endif; ?>
						</div>
					</section>
<?php get_footer(); ?>