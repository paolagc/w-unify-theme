<?php get_header(); ?>


<section id="main-content" role="main">
<?php query_posts(array('post_type' => 'showcase','orderby' => 'name'));
 if(have_posts()) : while(have_posts()) : the_post();
	$items[] = array(
				'title' => get_the_title(),
				'company' => get_post_meta($post->ID, 'showcase_company', true), 
				'caption' => get_post_meta($post->ID, 'showcase_caption', true),
				'company' => get_post_meta($post->ID, 'showcase_features', true), 
				'caption' => get_post_meta($post->ID, 'showcase_date', true),
				'company' => get_post_meta($post->ID, 'showcase_images', true),
				'url' => get_post_meta($post->ID, 'showcase_url', true),
			);
		endwhile; 
	endif; 
wp_reset_query();?>
	
</section>

<?php get_footer(); ?>