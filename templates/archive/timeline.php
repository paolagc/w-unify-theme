
<?php
	/*
	Template Name: Timeline page
	*/

 	get_header(); ?>
<div id="wrapper">
	<div id="content">
		<div class="container">
			<?php if ( is_active_sidebar( 'before' ) ) : ?>
				<div id="before" class="widget-area row" role="complementary">
						<?php dynamic_sidebar( 'before' ); ?>
				</div><!-- #before content region -->
			<?php endif; ?>		


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
						<ul class="timeline-v1">
							<?php if ( have_posts() ) :
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
														<li><i class="fa fa-clock-o"></i><?php the_date('Y-m-d', , ); ?></li>
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
			</div>

			<?php if ( is_active_sidebar( 'after' ) ) : ?>
				<div id="before" class="widget-area row" role="complementary">
						<?php dynamic_sidebar( 'after' ); ?>
				</div><!-- #after content region -->
			<?php endif; ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>