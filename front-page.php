<?php get_header(); ?>


<section id="main-content" role="main">
<?php query_posts(array('post_type' => 'showcase','orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => '3'));
 if(have_posts()) : while(have_posts()) : the_post();
	$items[] = array(
				'title' => get_the_title(),
				'company' => get_post_meta($post->ID, 'showcase_company', true), 
				'caption' => get_post_meta($post->ID, 'showcase_caption', true),
				'company' => get_post_meta($post->ID, 'showcase_features', true), 
				'date' => get_post_meta($post->ID, 'showcase_date', true),
				'image' => get_post_meta($post->ID, 'showcase_image', true),
				'url' => get_post_meta($post->ID, 'showcase_url', true),
			);
		endwhile; 
	endif; 
wp_reset_query();?>
<?php if(count($items)): ?>
	<div id="recent-works">
		<div class="headline">
			<h2>Recent Works</h2>
		</div>
		<div class="row zoom-rotate">

			<?php foreach ($items as $item): ?>
							<div class="col-md-4 col-sm-6">
								<?php the_post_thumbnail('grid3'); ?>
								<span class="badge top-left"><?php print $item['company'] ?></span>
								
									<h2 class="text-center"><?php print $item['title'] ?></h2>
									<p><?php print $item['caption'] ?></p>
							</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
	
	<div id="recent-entries">
		<div class="headline">
			<h2>Recent Blogs Entries</h2>
			<div class="row">
				<?php query_posts(array('orderby' => 'date', 'order' => 'DESC','posts_per_page' => '4'));
 				if(have_posts()) : while(have_posts()) : the_post(); ?>
 					<div class="col-md-3 col-sm-6">
		                <div class="thumbnails thumbnail-style thumbnail-kenburn">
		                	<div class="thumbnail-img">
		                        <div class="overflow-hidden">
		                            <?php the_post_thumbnail( array(330, 210) );?>
		                        </div>
		                        <a class="btn-more hover-effect" href="<?php the_permalink() ?>">read more +</a>					
		                    </div>
		                    <div class="caption">
		                        <h3><a class="hover-effect" href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
		                        <?php the_excerpt() ?>
		                    </div>
		                </div>
		            </div>
 				<?php 
 					endwhile;
 					endif;
 				?>
			</div>
			
		</div>


</section>

<?php get_footer(); ?>