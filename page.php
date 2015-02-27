
<?php get_header(); ?>
			<?php $width = 12;
				if( is_active_sidebar( 'sidebar' ) ) $width -=3;
			 ?>
			<div class="row">
					<section id="main-content" class="col-md-<?php print $width; ?>" role="main">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<article id="post-<?php the_ID(); ?>" class="blog margin-bottom-20">
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

									<div class="blog-post-tags">
									   <ul class="list-unstyled list-inline blog-info">
									        <li><i class="fa fa-calendar"></i> <?php the_date('Y-m-d'); ?></li>
									        <li><i class="fa fa-pencil"></i> <?php the_author_link(); ?></li>
									        <li><i class="fa fa-comments"></i> <a href="#"> <?php comments_number( '0 comments', '1 comment', '% comments' ); ?>.</a></li>
									    </ul>
									    <?php if(has_tag()): ?>
										    <ul class="list-unstyled list-inline blog-tags">
										        <li>
										            <i class="fa fa-tags"></i> 
										            <?php the_tags(); ?>
										        </li>
										    </ul>  
										<?php endif; ?>                                              
									</div>   
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="blog-img pull-left">
											<?php the_post_thumbnail('full-blog' , array('class' => 'img-bordered')); ?>
										</div>
									<?php endif; ?> 
									<div class="entry-content">
										<?php the_content(); ?>
									</div>      
								</article>
							<?php endwhile; ?>
						<?php endif; // end have_posts() check ?>
					</section>
					<?php get_sidebar(); ?>
			</div>
<?php get_footer(); ?>

	