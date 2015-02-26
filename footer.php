<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
 */

// Theme settings
    $face_url = get_option("theme_settings_facebook_url");
    $twitter_url = get_option("theme_settings_twitter_url");
    $gplus_url = get_option("theme_settings_gplus_url");
    $linkedin_url = get_option("theme_settings_linkedin_url");
    $github_url = get_option("theme_settings_github_url");

    $has_social_links = $face_url || $twitter_url || $gplus_url || $linkedin_url || $github_url;

?>

			<?php if ( is_active_sidebar( 'after' ) ) : ?>
				<div id="before" class="widget-area row" role="complementary">
						<?php dynamic_sidebar( 'after' ); ?>
				</div><!-- #after content region -->
			<?php endif; ?>	
		</div><!-- end container-->
	</div><!-- end content -->
</div><!-- end wrapper -->

			<!-- Start footer -->
				<footer class="footer navbar-fixed-bottom">
					<div class="footer-inner">
						<div class="container">
							<?php if ( is_active_sidebar( 'footer' ) ) : ?>
								<div id="before" class="widget-area row">
										<?php dynamic_sidebar( 'footer' ); ?>
								</div><!-- #after content region -->
							<?php endif; ?>	
						</div>
					</div>
					<div class="copyright">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<?php wp_nav_menu( array( 'theme_location' => 'footer' , 'menu_class' => 'list-unstyled list-inline' )); ?>
								</div>
								<div class="col-md-6">
									<?php if($has_social_links): ?>
										<ul class="footer-socials list-inline">
											<?php if($face_url): ?>
												<li>
													<a href="<?php print $face_url; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
					                                    <i class="fa fa-facebook"></i>
					                                </a>
				                                </li>
											<?php endif; ?>
											<?php if($twitter_url): ?>
												<li>
													<a href="<?php print $twitter_url; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
					                                    <i class="fa fa-twitter"></i>
					                                </a>
				                                </li>
											<?php endif; ?>
											<?php if($gplus_url): ?>
												<li>
													<a href="<?php print $gplus_url; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
					                                    <i class="fa fa-google-plus"></i>
					                                </a>
				                                </li>
											<?php endif; ?>
											<?php if($linkedin_url): ?>
												<li>
													<a href="<?php print $linkedin_url; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
					                                    <i class="fa fa-linkedin"></i>
					                                </a>
				                                </li>
											<?php endif; ?>
											<?php if($linkedin_url): ?>
												<li>
													<a href="<?php print $gplus_url; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
					                                    <i class="fa fa-linkedin"></i>
					                                </a>
				                                </li>
											<?php endif; ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
							
						</div>
					</div>
				</footer>
			<!-- End footer -->
		</div>
		<!-- wp footer -->
		<?php wp_footer(); ?>
	</body>
</html>