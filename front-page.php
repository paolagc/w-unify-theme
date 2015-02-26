<?php get_header(); ?>


<section id="main-content" role="main">
<?php query_posts(array('post_type' => 'showcase','orderby' => 'date', 'posts_per_page' => '3'));
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
	<div id="recent-works">
		<div class="headline">
			<h2>Recent Works</h2>
		</div>
		<div class="row zoom-rotate">
			<?php foreach ($items as $item): ?>
				<a href="<?php print $item['url'] ?>">
                        <em class="overflow-hidden">
                            <img class="img-responsive" src="<?php print $item['image'] ?>" alt="<?php print $item['title'] ?>">
                        </em>    
                        <span>
                            <strong><?php print $item['title'] ?></strong>
                            <i><?php print $item['caption'] ?></i>
                        </span>
                    </a>
			<?php endforeach; ?>
		</div>	

	</div>
</section>

<?php get_footer(); ?>