
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
						<div class="one-page">
							<?php if ( have_posts() ) :
								$cont = 0;
								while ( have_posts() ) : the_post(); 
								$thumbnail = get_the_post_thumbnail( $post->ID, array(550 , 350) ); 
								$content = '<h2 class="archive-title"><a href="'.the_permalink().'" rel="bookmark" title="'.the_title_attribute();.'">'.the_title();.'/a></h2>';
								$content .= substr( get_the_content(), 0, 400); 
								$content .= '<a href="'.the_permalink().'" class="pull-right button read-more">Leer mas >></a>';

							?>
									<div id="post-<?php the_ID(); ?>" class="one-page-inner">
										<div class="container content">
											<div class="row">
												<div class="col-md-6">
													<?php 
													if($cont % 2 === 0){
														print $content;
													}
													else{
														print $thumbnail;	
													} ?>
												</div>
												<div class="col-md-6">
													<?php 
													if($cont % 2 === 1){
														print $thumbnail;
													}
													else{
														print $content;	
													} ?>
												</div>
											</div>
										</div>
									</div>
								<?php $cont++; ?>
								<?php endwhile; 
								endif; // end have_posts() check ?>
						</div>
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