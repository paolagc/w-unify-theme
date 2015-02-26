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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
	<header class="header" role="banner">
		<!-- Start Topbar -->
		<div class="topbar" role="menu"> 
			<div class="container">
				<?php wp_nav_menu( array( 'theme_location' => 'user' , 'menu_class' => 'loginbar pull-right', )); ?>
			</div>
		</div>
		<!-- End Topbar -->

		<div class="navbar navbar-default mega-menu" role="navigation">
	            <div class="container">
	            		<div class="navbar-header" role="button">
		                    <div class="site-branding">
								<h1 class="site-title"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							</div><!-- .site-branding -->
	            		</div>

	            		<div class="collapse navbar-collapse navbar-responsive-collapse">
		            		<nav id="site-navigation" class="main-navigation" role="navigation">
								   <!-- Mobile toggle button -->
						            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							            <span class="icon-bar"></span>
							            <span class="icon-bar"></span>
							            <span class="icon-bar"></span>
						            </button>

								<?php wp_nav_menu( array(  'theme_location' => 'main'  , 'menu_class' => 'nav navbar-nav') ); ?>
							</nav>
						</div><!-- #site-navigation -->
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
					      <img src="<?php print $item['image']?>" alt="<?php print $item['title']?>" width="1920" height="300">
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
<?php endif; ?>
<div id="wrapper">
	<div id="content">
		<div class="container">
			<?php if ( is_active_sidebar( 'before' ) ) : ?>
				<div id="before" class="widget-area row" role="complementary">
						<?php dynamic_sidebar( 'before' ); ?>
				</div><!-- #before content region -->
			<?php endif; ?>	