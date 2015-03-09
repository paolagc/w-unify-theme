<?php get_header(); ?>
	<div id="search">
		<?php get_search_form(); ?>
	</div>
	<section id="main-content"  role="main">
		<?php
			global $wp_query;
			$total_results = $wp_query->found_posts;
		?>
		<h3><?php print $total_results; ?> results</h3>
	</section>
<?php get_footer(); ?>