
<?php get_header(); ?>
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

	