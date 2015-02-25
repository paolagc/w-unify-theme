
<?php
	/*
	Template Name: Masonry
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
						<div class="container content grid-boxes masonry">
							<?php if ( have_posts() ) :
								while ( have_posts() ) : the_post(); ?>
									<div class="grid-boxes-in masonry-brick">
										<?php the_post_thumbnail( array(360, 200) );?>
										<div class="grid-boxes-caption">
											<h3 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											<ul class="list-inline grid-boxes-news">
												<li><i class="fa fa-clock-o"></i><?php the_date('Y-m-d', , ); ?></li>
												<li>|</li>
												<li><i class="fa fa-user"></i><?php the_author(); ?></li>
											</ul>
										</div>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
					</section>
			</div>
<?php get_footer(); ?>