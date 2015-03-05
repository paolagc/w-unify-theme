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
	            		<div class="navbar-header col-sm-2" role="button">
	            			<!-- Mobile toggle button -->
						           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			                            <span class="fa fa-bars"></span>
			                    	</button>
		                    <div class="site-branding">
								<h1 class="site-title"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							</div><!-- .site-branding -->
	            		</div>

	            		<div class="collapse navbar-collapse navbar-responsive-collapse col-sm-5">
		            		<nav id="site-navigation" class="main-navigation" role="navigation">
								   

								<?php wp_nav_menu( array(  'theme_location' => 'main'  , 'menu_class' => 'nav navbar-nav' , 'walker' => new wp_bootstrap_navwalker()) ); ?>
							</nav>
						</div><!-- #site-navigation -->

						<div class="collapse navbar-collapse navbar-responsive-collapse col-sm-5">
		            		<nav role="navigation">
								<?php wp_nav_menu( array(  'theme_location' => 'user'  , 'menu_class' => 'loginbar') ); ?>
							</nav>
						</div><!-- user-navigation -->
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
	 				<div id="horizontal-slider">
	 					<?php while(have_posts()) : the_post(); ?>
	 						<div class="horizontal-slide">
	 							<img src="<?php print get_post_meta($post->ID, 'slider_image', true), ?>">
	 							<span class="title"><?php the_title(); ?></span>
	 							<p><?php print get_post_meta($post->ID, 'slider_caption', true)?></p>
	 							<a class="btn" href="<?php print get_post_meta($post->ID, 'slider_url', true)?>"><?php __('Read More')?></a>
	 						</div>	

		 				<?php endwhile; ?>
	 				</div>
	 				<div class="bottom-menu">
	 					<div class="controls pull-left">
	 						<span class="toggle-fullpage">
	 							<i class="fa fa-expand"></i>
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
	 				</div>
					<?php endif; ?>
				<?php wp_reset_query();?>
				<div class="controls">
					
				</div>
			</div>
			<!-- End Main Slider -->
			<div class="col-md-5">
				
			</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
