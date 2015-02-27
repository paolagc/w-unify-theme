<?php
	/*
	Template Name: Isotope page
	*/

 	get_header(); ?>
<section id="main-content" role="main">

	<div id="options">
	           <?php 
	               //check to see if our custom tag cloud exists and display it
	               $terms = theme_base_term_list_isotope();
	               print $terms;
	           ?>
	</div>

	<div class="grid">
		<ul>
			<?php 
				$args = array( 'order_by' => 'date', 'order' => 'desc');
	    		query_posts( $args );
				if ( have_posts() ) :
				while ( have_posts() ) : the_post();
			?>
				<li class="col-md-3 col-sm-6 col-xs-12" data-cat="1" style="  display: inline-block; opacity: 1;">
                    <a href="<?php the_permalink();?>">
                        <?php the_post_thumbnail( array( 330, 200)); ?>
                        <span>
                            <span><?php the_title(); ?></span>
                        </span>
                    </a>
                </li>

			<?php 
			 	endwhile;
			 	endif;
			?>
		</ul>
	</div>

</section>
<?php get_footer(); ?>