<?php
/*
Template Name: Contact Page
*/
get_header(); ?>
	<div id="contact-page">
		<div class="row">
					<section id="main-content" class="col-md-<?php print $width; ?>" role="main">
						<div class="page-descrition margin-bottom-40">
							<?php while ( have_posts() ) : the_post() ;
								the_content(); 
							endwhile ;?>
						</div>
						<hr>
						<div class="row  margin-bottom-40">
							<div id="googlemaps" class="google-map">
							</div>
						</div>
						
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform" method="post" class="validateform">

					<h3 class="headline">Contact Us</h3>
					<div class="row margin-bottom-40">
						<div class="col-lg-4 field">
							<input type="text" class="requiredField input-lg"  name="contactName" id="contactName" placeholder="* <?php echo __('Enter your full name'); ?>" data-rule="maxlen:4" data-msg="<?php echo __('Please enter at least 4 chars'); ?>" />
							<div class="validation">
							</div>
						</div>
						
						<div class="col-lg-4 field">
							<input type="text" class="requiredField input-lg"  name="email" id="email" placeholder="* <?php echo __('Enter your email address'); ?>" data-rule="email" data-msg="<?php echo __('Please enter a valid email'); ?>" />
							<div class="validation">
							</div>
						</div>
						
						<div class="col-lg-4 field">
							<input type="text" name="subject" id="subject" class="input-lg" placeholder="<?php echo __('Enter your subject'); ?>" data-rule="maxlen:4" data-msg="<?php echo __('Please enter at least 4 chars'); ?>" />
							<div class="validation">
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col-lg-10 field">
								<textarea rows="12" name="comments" class="requiredField input-lg"  id="comments" class="input-block-level" placeholder="* <?php echo __('Your message here'); ?>..." data-rule="required" data-msg="<?php echo __('Please write something'); ?>"></textarea>
								<div class="validation clearfix">
								</div>
							</div>
							<div class="col-lg-2 field">
								<p>
									<button name="Mysubmitted" id="Mysubmitted" class="btn btn-theme pull-left" type="submit"><?php echo __('Submit message'); ?></button>
									<span class="pull-right">* <?php echo __('Please fill all required form field, thanks'); ?>!</span>
								</p>
								<input type="hidden" name="submitted" id="submitted" value="true" />
								<input type="hidden" name="contact_success" id="contact_success" value="<?php echo iwebtheme_smof_data('contact_success');?>" />
							</div>					
						</div>
						
						
					</div>
					
				</form>

					</section>
			</div>
	</div>
<?php get_footer(); ?>