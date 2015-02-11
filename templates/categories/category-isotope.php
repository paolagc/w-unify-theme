<?php
	/*
	Template Name: Isotope Template
	*/

	//Get the category object
	$category = $wp_query->get_queried_object();
	$cat_id = $category->cat_ID;
	$cat_name = get_cat_name($cat_id)

	//Get the category terms
	$args = array(
	    'orderby'           => 'name', 
	    'order'             => 'ASC',
	    'hide_empty'        => true, 
	    'fields'            => 'all', 
	); 
	$terms = get_terms( array($cat_name) , $args);
	$count = count($terms); 
?>

<h2><?php echo $cat_name; ?> </h2>

<?php if ( $count > 0 ) : ?>
	<ul class="list-unstyled list-inline">
		<?php foreach ( $terms as $term ) : ?> 
				<li><a href='#' data-filter="<?php print $term->slug ?>"><?php print $term->name ?></a></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?php if ( $count > 0 ) : ?>
	<div id="isotope-list">
		<?php 
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$termsArray = get_the_terms( $post->ID, $cat_name );  //Get the terms for this particular item
			$term_list = ""; //initialize the string that will contain the terms
			foreach ( $termsArray as $term ) { // for each term 
				$term_list .= $term->slug.' '; //create a string that has all the slugs 
			}
		?>
		<div class="<?php echo $term_list; ?> item"> // 'item' is used as an identifier (see Setp 5, line 6)
			<h3><?php the_title(); ?></h3>
		        <?php if ( has_post_thumbnail() ) { 
	                      the_post_thumbnail();
	                } ?>
		</div> <!-- end item -->

		<?php endwhile; ?>
	</div> <!-- end isotope-list -->
<?php endif; ?>