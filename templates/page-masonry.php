<?php
	/*
	Template Name: Masonry
	*/

 	get_header(); ?>
					<section id="main-content" role="main">
						<div class="container content grid-boxes masonry">
							<?php 
								$args = array( 'post_type' => 'post', 'cat' => '0','paged' =>  $paged );
    							query_posts( $args );
								if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
									<div class="grid-boxes-in masonry-brick">
										<?php the_post_thumbnail( array(360, 200) );?>
										<div class="grid-boxes-caption">
											<h3 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											<ul class="list-inline grid-boxes-news">
												<li><i class="fa fa-clock-o"></i><?php the_date('Y-m-d'); ?></li>
												<li>|</li>
												<li><i class="fa fa-user"></i><?php the_author(); ?></li>
											</ul>
											<?php the_excerpt() ?>
										</div>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
					</section>
					<script type="text/javascript">
						/**
						 * Base js functions
						 */

						$(document).ready(function(){
						    var $container = $('.grid-boxes');

						    var gutter = 30;
						    var min_width = 300;
						    $container.imagesLoaded( function(){
						        $container.masonry({
						            itemSelector : '.grid-boxes-in',
						            gutterWidth: gutter,
						            isAnimated: true,
						              columnWidth: function( containerWidth ) {
						                var box_width = (((containerWidth - 2*gutter)/3) | 0) ;

						                if (box_width < min_width) {
						                    box_width = (((containerWidth - gutter)/2) | 0);
						                }

						                if (box_width < min_width) {
						                    box_width = containerWidth;
						                }

						                $('.grid-boxes-in').width(box_width);

						                return box_width;
						              }
						        });
						    });
						});
					</script>
<?php get_footer(); ?>