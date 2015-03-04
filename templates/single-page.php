<?php
	/*
	Template Name: Single page
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
		<div class="topbar" role="menu"> 
			<div class="container">
				<nav class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<?php 
							// define how pages will display
						$args = array(
							'sort_order' => 'ASC',
							'sort_column' => 'menu_order', //post_title
							'post_type' => 'page',
							'post_status' => 'publish'
						);
						$pages = get_pages($args);
						$cont =0;
						foreach ($pages as $page):
							$title = $page->post_title;
							$slug = $page->post_name;

						?>
						<li <?php if($cont == 0) print 'class="active"' ?> ><a href="#<?php print $slug?>"><?php print $title ?></a></li>
						<?php 
							$cont++;
							endforeach;
						?>
					</ul>
				</nav>
			</div>
		</div>
		<!-- End Topbar -->
	</header>
	<div id="wrapper">
		<div id="content">
			<div class="container page-scroll">
				<?php
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
			</div>
		</div>
	</div>
<?php get_footer(); ?>
