<?php
	/*
	Template Name: Team Page
	*/

 get_header(); ?>
<section id="main-content" role="main">
	<div class="container content">
		<div class="page-descrition margin-bottom-40">
			<?php while ( have_posts() ) : the_post() ;
				the_content(); 
			endwhile ;?>
		</div>
		<hr>

		<?php 
			$args = array( 'post_type' => 'team_member', 'order' => 'DESC' );
			$cont = 0;
		    query_posts( $args );
			if ( have_posts() ) :
			while ( have_posts() ) : the_post(); ?>

			<?php if($cont % 3 == 0): ?>
				<div class="row">
			<?php endif; ?>
				<div class="col-lg-4 col-md-6 col-sm-12">
	                <div class="thumbnail-style">
	                    <?php the_post_thumbnail('grid3');?>
	                    <h3><?php the_title(); ?>
	                    	<br><small><?php print get_post_meta($post->ID, 'member_position', true); ?></small>
	                    </h3>
	                    <p><?php print get_post_meta($post->ID, 'member_caption', true); ?></p>
	                    <ul class="list-unstyled list-inline team-socail">
	                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                    </ul>
	                </div>
	            </div>
					
			<?php if($cont % 3 == 2): ?>
				</div>
			<?php endif; ?>

		<?php 
			$cont++;
			endwhile;
			endif;
		 ?>
	</div>
</section>