<?php get_header(); ?>

<?php query_posts(array('post_type' => 'slider','orderby' => 'rand'));
 if(have_posts()) : while(have_posts()) : the_post();
	$items[] = array(
				'title' => get_the_title(),
				'caption' => get_post_meta($post->ID, 'slider_caption', true), 
				'image' => get_post_meta($post->ID, 'slider_image', true),
				'url' => get_post_meta($post->ID, 'slider_url', true),
			);
		endwhile; 
	endif; 
wp_reset_query();?>
<?php if(count($items)>0): ?>
	<section id="main-slider" class="carousel slide" data-ride="carousel">
		
		<!-- Indicators -->
  		<ol class="carousel-indicators">
    		<?php for($i = 0; $i < count($items); $i++): ?>
    			<li data-target="#main-slider" data-slide-to="<?php print $i ?>" class="<?php if($i === 0)  print active?>"></li>
    		<?php endfor; ?>
    	</ol>

    	<!-- Wrapper for slides -->
		 <div class="carousel-inner" role="listbox">
		 	<?php 
		 	$cont = 0;
		 	foreach ($items as $item): ?>
		 		<div class="item <?php if($cont === 0)  print active?>">
			      <img src="<?php print $item['image']?>" alt="<?php print $item['title']?>" width="1999" height="400" class="center-block">
			      <div class="carousel-caption row-fluid"><h3 class="carousel-title">
			      		<h3 class="carousel-title"><?php print $item['title']?></h3>
			        	<p><?php print $item['caption']?></p>
			        	<div class="more-link">
			        		<?php print theme_base_format_link($item['url'])?>
			        	</div>
			      </div>
			    </div>
			<?php $cont++; ?>
		 	<?php endforeach; ?>
		  </div>

		 <!-- Controls -->
		  <a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
	</section>
<?php endif; ?>


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