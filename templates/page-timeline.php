
<?php
	/*
	Template Name: Timeline page
	*/

 	get_header(); ?>
					<section id="main-content"  role="main">
						<ul class="timeline">
							<?php 
								$args = array( 'post_type' => 'post', 'cat' => '0','paged' =>  $paged );
    							query_posts( $args );
								if ( have_posts() ) :
								$cont = 0;
								while ( have_posts() ) : the_post(); 
								$thumbnail = get_the_post_thumbnail( $post->ID, array(550 , 350) );
							?>
									<li class="<?php if($cont%2 === 1) print 'timeline-inverted' ?>" >
										<div class="timeline-badge primary"><i class="glyphicon glyphicon-record"></i></div>
										<div class="timeline-panel">
											<div class="timeline-heading">
												<?php print $thumbnail; ?>
											</div>
											<div class="timeline-body text-justify">
												<h3 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
												<p>
													<?php 
														$content = get_the_content(); 
														echo substr( $content, 0, 400);
													?>
												</p>
												<a href="<?php the_permalink() ?>" class="pull-right button read-more btn-u btn-u-sm">Leer mas >></a>
												<div class="timeline-footer">
													<ul class="list-unstyled list-inline blog-info">
														<li><i class="fa fa-clock-o"></i><?php the_date('Y-m-d' ); ?></li>
														<li><i class="fa fa-user"></i><?php the_author(); ?></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
								<?php $cont++; ?>
								<?php endwhile; 
								endif; // end have_posts() check ?>
						</ul>
					</section>
<?php get_footer(); ?>