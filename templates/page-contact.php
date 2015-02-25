<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

			<?php $width = 12;
				if( is_active_sidebar( 'left' ) ) $width -=3;
			 ?>
			<div class="row">
					<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
						<aside id="sidebar" class="widget-area" role="complementary">
								<?php dynamic_sidebar( 'sidebar' ); ?>
						</aside><!-- #left sidebar region -->
					<?php endif; ?>	

					<section id="main-content" class="col-md-<?php print $width; ?>" role="main">
						<div id="googlemaps" class="google-map">
						</div>
						<h3>Contact Us</h3>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform" method="post" class="validateform">

					<div class="row">
						<div class="col-lg-4 field">
							<input type="text" class="requiredField" name="contactName" id="contactName" placeholder="* <?php echo __('Enter your full name'); ?>" data-rule="maxlen:4" data-msg="<?php echo __('Please enter at least 4 chars'); ?>" />
							<div class="validation">
							</div>
						</div>
						
						<div class="col-lg-4 field">
							<input type="text" class="requiredField" name="email" id="email" placeholder="* <?php echo __('Enter your email address'); ?>" data-rule="email" data-msg="<?php echo __('Please enter a valid email'); ?>" />
							<div class="validation">
							</div>
						</div>
						
						<div class="col-lg-4 field">
							<input type="text" name="subject" id="subject" placeholder="<?php echo __('Enter your subject'); ?>" data-rule="maxlen:4" data-msg="<?php echo __('Please enter at least 4 chars'); ?>" />
							<div class="validation">
							</div>
						</div>
						
						<div class="col-lg-12 margintop10 field">
							<textarea rows="12" name="comments" class="requiredField" id="comments" class="input-block-level" placeholder="* <?php echo __('Your message here'); ?>..." data-rule="required" data-msg="<?php echo __('Please write something'); ?>"></textarea>
							<div class="validation clearfix">
							</div>
						</div>
						<div class="col-lg-12 field">
							<p>
								<button name="Mysubmitted" id="Mysubmitted" class="btn btn-theme margintop20 pull-left" type="submit"><?php echo __('Submit message'); ?></button>
								<span class="pull-right margintop20">* <?php echo __('Please fill all required form field, thanks'); ?>!</span>
							</p>
							<input type="hidden" name="submitted" id="submitted" value="true" />
							<input type="hidden" name="contact_success" id="contact_success" value="<?php echo iwebtheme_smof_data('contact_success');?>" />
						</div>					
					</div>
					
				</form>

					</section>
			</div>
<?php get_footer(); ?>