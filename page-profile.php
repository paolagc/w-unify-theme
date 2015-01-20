<?php
/**
 * Template Name: User profile page
 */

get_header();

if ( !is_user_logged_in() ) {
wp_die('Access Denied!');
}

// current user
$user = wp_get_current_user();
$current_role = array_keys($user->wp_capabilities);
$current_role = $current_role[0];

?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<?php echo get_avatar( $user, $size, '440', $user ); ?> 
		</div>
		<div class="col-md-7">
			<div class="info">
				<div class="pull-left">
					<h2></h2>
					<small></small>
				</div>
				<ul class="pull-right list-unstyled list-inline social-network">

				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<?php dynamic_sidebar('user-1'); ?>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<?php dynamic_sidebar('user-2'); ?>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<?php dynamic_sidebar('user-3'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>