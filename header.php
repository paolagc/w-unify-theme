<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<title><?php bloginfo( 'title' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	</script>
	<?php wp_head(); ?> 
</head>
<body>
	<header class="header" role="banner">
		<!-- Start Topbar -->
		<div class="topbar" role="menu"> 
			<div class="container">
				<?php wp_nav_menu( array( 'menu' => 'user' , 'menu_class' => 'loginbar pull-right', )); ?>
			</div>
		</div>
		<!-- End Topbar -->

		<div class="navbar navbar-default mega-menu" role="navigation">
	            <div class="container">
	            		<div class="navbar-header" role="button">
	            			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		                        <span class="sr-only">Toggle navigation</span>
		                        <span class="fa fa-bars"></span>
		                    </button>
	            			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
	            		</div>
	            		<div class="collapse navbar-collapse navbar-responsive-collapse">
	            			<?php wp_nav_menu( array( 'menu' => 'main' , 'menu_class' => 'nav navbar-nav' )); ?>
	            		</div>
	            </div>
	    </div>

	    <?php if(!is_front_page()) : ?>
		    <div class="breadcrumbs">
		    	<div class="container">
		    		<h1 class="pull-left"><?php the_title() ?></h1>
		    		<?php print the_breadcrumb(); ?>
		    	</div>
		    </div>
		<?php endif; ?>
	</header>
<?php if(is_front_page()) : ?>
	<?php query_posts(array('post_type' => 'slider','order' => 'DESC'));
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
					      <img src="<?php print $item['image']?>" alt="<?php print $item['title']?>" width="9999" height="400">
					      <div class="carousel-caption row-fluid"><h3 class="carousel-title">
					      		<h3 class="carousel-title"><?php print $item['title']?></h3>
					        	<p><?php print $item['caption']?></p>
					        	<div class="more-link">
					        		<?php print dm_format_link($item['url'])?>
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
<?php endif; ?>