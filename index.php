
<?php get_header(); ?>
<div id="wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9">

				<?php if ( is_active_sidebar( 'before' ) ) : ?>
					<div id="before" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'before' ); ?>
					</div><!-- #before content region -->
				<?php endif; ?>

				<?php if(is_front_page()): ?>
					<div class="row">
						<?php if ( is_active_sidebar( 'before' ) ) : ?>
							<div id="home1" class="primary-sidebar widget-area col-md-6">
								<?php dynamic_sidebar( 'home_1' ); ?>
							</div><!-- #home1 content region -->
						<?php endif; ?>
						<?php if ( is_active_sidebar( 'before' ) ) : ?>
							<div id="home2" class="primary-sidebar widget-area col-md-6">
								<?php dynamic_sidebar( 'home_2' ); ?>
							</div><!-- #home2 content region -->
						<?php endif; ?>
					</div>
				<?php else: ?>
					<div id="main-content">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<article id="post-<?php the_ID(); ?>" class="row block margin-bottom-20">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="col-md-4 col-sm-12">
											<?php the_post_thumbnail('archive-thumb' , array('class' => 'img-bordered')); ?>
										</div>
									<?php endif; ?>
									<div class="col-md-<?php print (has_post_thumbnail() ? 8 : 12)?> col-sm-12">
										<h2 class="archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<div class="entry">
											<p class="margin-bottom-20"><?php 
												$content = get_the_content(); 
												echo substr( $content, 0, 400);
											?></p>
											<a href="<?php the_permalink() ?>" class="pull-right button read-more">Leer mas >></a>
										</div>
									</div>

								</article><!-- #post-theID-->
							<?php endwhile; ?>
						<?php endif; // end have_posts() check ?>
					</div>
				<?php endif; ?>	

				<?php if ( is_active_sidebar( 'after' ) ) : ?>
					<div id="after" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'after' ); ?>
					</div><!-- #after content region -->
				<?php endif; ?>
				
			</div>
			<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
					<aside id="sidebar" class="primary-sidebar widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar' ); ?>
					</div><!-- sidebar -->
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>

	