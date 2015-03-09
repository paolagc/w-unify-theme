<?php
/*
Template Name: Contact Page
*/
get_header(); ?>
	<div id="contact-page">
		<div class="row">
					<sectionid="main-content" class="col-md-<?php print $width; ?>" role="main">
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

						<fieldset>                  
	                        <div class="row">
	                            <section class="form-group">
	                                <label class="col-lg-1" for="name">Name</label>
	                                <div class="input-group col-lg-5">
	                                    <div class="input-group-addon"><i class="icon-append fa fa-user"></i></div>
	                                    <input type="text" class="input-lg" name="name" id="name">
	                                </div>
	                            </section>
	                            <section class="form-group">
	                                <label class="col-lg-1" for="email">E-mail</label>
	                                <div class="input-group  col-lg-5">
	                                    <div class="input-group-addon"><i class="icon-append fa fa-envelope-o"></i></div>
	                                    <input type="email"  class="input-lg"  name="email" id="email">
	                                </div>
	                            </section>
	                        </div>
	                        
	                        <section class="form-group">
	                            <label class="col-lg-2" for="subject">Subject</label>
	                            <div class="input-group">
	                                <div class="input-group-addon"><i class="icon-append fa fa-tag"></i></div>
	                                <input type="text"  class="input-lg" name="subject" id="subject">
	                            </div>
	                        </section>
	                        
	                        <section class="form-group">
	                            <label  for="message">Message</label>
	                            <div class="input-group">
	                                <div class="input-group-addon"><i class="icon-append fa fa-comment"></i></div>
	                                <textarea rows="4" name="message" id="message"></textarea>
	                            </div>
	                        </section>
	                        </section>
	                        
	                        <section class="form-group">
	                            <label class="checkbox"><input type="checkbox" name="copy">Send a copy to my e-mail address</label>
	                        </section>
	                    </fieldset>
					
						</form>

					</section>
			</div>
	</div>
<?php get_footer(); ?>