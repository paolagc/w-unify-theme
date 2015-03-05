<?php
	/*
	Template Name: Gray Image
	*/

 	get_header(); ?>
					<section id="main-content" role="main">
						<div class="container content grid-boxes masonry">
							<div class="page-descrition margin-bottom-40">
								<?php while ( have_posts() ) : the_post() ;
									the_content(); 
								endwhile ;?>
							</div>
							<hr>
							<?php 
								$args = array( 'post_type' => 'post', 'cat' => '0','paged' =>  $paged );
    							query_posts( $args );
								if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
								<div class="blog">
									<?php the_post_thumbnail( 'full-blog', array( 'class' => 'full-blog grayscale img-responsive' ) ); ?>
									<h3 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" 
									title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											<ul class="list-inline">
												<li><i class="fa fa-clock-o"></i><?php the_date('Y-m-d'); ?></li>
												<li>|</li>
												<li><i class="fa fa-user"></i><?php the_author(); ?></li>
											</ul>
											<?php the_excerpt() ?>
								</div>
								<?php endwhile;
							endif; ?>
						</div>
					</section>
<?php get_footer(); ?>