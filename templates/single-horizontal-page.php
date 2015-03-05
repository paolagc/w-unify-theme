<?php
	/*
	Template Name: Vertical horizontal page
	*/
?>
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
		<div class="navbar navbar-default mega-menu" role="navigation">
	            <div class="container-full">
	            	<div class="row">
	            		<div class="col-sm-2">
	            			<div class="navbar-header" role="button">
		            			<!-- Mobile toggle button -->
							           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				                            <span class="fa fa-bars"></span>
				                    	</button>
			                    <div class="site-branding">
									<h1 class="site-title"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								</div><!-- .site-branding -->
		            		</div>
	            		</div>
	            		<div class="col-sm-5">
	            			<div class="collapse navbar-collapse navbar-responsive-collapse">
			            		<nav id="site-navigation" class="main-navigation" role="navigation">
									<?php wp_nav_menu( array(  'theme_location' => 'main'  , 'menu_class' => 'nav navbar-nav' , 'walker' => new wp_bootstrap_navwalker()) ); ?>
								</nav>
							</div><!-- #site-navigation -->
	            		</div>
	            		<div class="col-sm-5">
	            			<div class="collapse navbar-collapse navbar-responsive-collapse">
			            		<nav role="navigation">
									<?php wp_nav_menu( array(  'theme_location' => 'user'  , 'menu_class' => 'loginbar pull-right') ); ?>
								</nav>
							</div><!-- user-navigation -->
	            		</div>
	            	</div>
	            </div>
	    </div>
		<!-- End Topbar -->
	</header>
	<div id="wrapper">
		<div id="content">
			<div class="container-full">
			<!-- Main Slider -->
			<div class="col-md-7">
				<?php query_posts(array('post_type' => 'slider','order' => 'DESC'));
	 				if(have_posts()) : ?>
	 				<div class="aside-fixed">
	 					<div id="horizontal-slider" class="carousel slide">
		 					<div class="carousel-inner">
		 						<?php while(have_posts()) : the_post(); ?>
			 						<div class="item">
			 							<img src="<?php print get_post_meta($post->ID, 'slider_image', true); ?>">
			 							<span class="title"><?php the_title(); ?></span>
			 							<p><?php print get_post_meta($post->ID, 'slider_caption', true)?></p>
			 							<a class="btn" href="<?php print get_post_meta($post->ID, 'slider_url', true)?>"><?php __('Read More')?></a>
			 						</div>
				 				<?php endwhile; ?>
		 					</div>
		 					<div class="bottom-menu">
			 					<div class="controls pull-left">
			 						<span class="toggle-fullpage">
			 							<i class="fa fa-expand fa-3"></i>
			 						</span>
			 						<a class="left carousel-control" href="#horizontal-slider" role="button" data-slide="prev">
									    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									    <span class="sr-only">Previous</span>
									 </a>

									 <a class="right carousel-control" href="#horizontal-slider" role="button" data-slide="next">
									    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									    <span class="sr-only">Previous</span>
									 </a>
			 					</div>
			 					<span class="pull-right">
			 							<i class="fa fa-bars fa-3"></i>
			 					</span>
			 				</div>
		 				</div>
						<?php endif; ?>
					<?php wp_reset_query();?>
	 				</div>
			</div>
			<!-- End Main Slider -->
			<div class="col-md-5">
				<?php
					$args = array(
							'sort_order' => 'ASC',
							'sort_column' => 'menu_order', //post_title
							'post_type' => 'page',
							'post_status' => 'publish'
					);
					$pages = get_pages($args);
					foreach ($pages as $page):
						$content = apply_filters('the_content', $page->post_content);
					    $title = $page->post_title;
					    $slug = $page->post_name;
				?>
					<section id="<?php print $slug?>">
						<h2><?php print $title ?></h2>
						<?php print $content ?>
					</section>
				<?php endforeach; ?>
				<!-- End Footer -->
				<footer class="footer">
					
				</footer>
				<!-- End Footer -->
			</div>
			</div>
		</div>
	</div>

