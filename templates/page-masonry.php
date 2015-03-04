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
										<div class="masonry-thumbnail">
											<?php the_post_thumbnail( array(360, 200) );?>
										</div>
										<div class="grid-boxes-caption masonry-details">
											<h3 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											<ul class="list-inline grid-boxes-news">
												<li><i class="fa fa-clock-o"></i><?php the_date('Y-m-d'); ?></li>
												<li>|</li>
												<li><i class="fa fa-user"></i><?php the_author(); ?></li>
											</ul>
											<div class="masonry-post-excerpt">
												<?php the_excerpt() ?>
											</div>
										</div>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
					</section>
<?php get_footer(); ?>