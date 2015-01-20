<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
 * */
?>

<!DOCTYPE html>
!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
	
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
		
		<?php
			$favicon = '';
			if (empty($favicon)) { ?>
			<link link rel="shortcut icon" href="<?php echo get_template_directory_uri().'/img/favicon.ico' ?>" />
		<?php }	else { ?>
			<link rel="icon" type="image/png" href="<?php echo $favicon ?>" />
		<?php } ?>	
		
		<!-- wp head -->
		<?php 
		wp_head(); 
		?>
	</head>
	<body <?php body_class( 'body' ); ?>>
		<!-- Start wrapper -->
		<div class="wrapper">
			<!-- Start header -->
			<header class="header">
				<div class="container">
					<div class="row">

					</div>
				</div>
				<div class="breadcrumbs">
					<div class="container">

					</div>
				</div>
			</header>
			<!-- End header -->
			
			