<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
 */
?>

			<!-- Start footer -->
				<footer class="footer">
					<div class="footer-inner">
						<div class="container">
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6">
									<?php dynamic_sidebar('footer-1'); ?>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<?php dynamic_sidebar('footer-2'); ?>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<?php dynamic_sidebar('footer-3'); ?>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<?php dynamic_sidebar('footer-4'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="copyright">
						<div class="container">
							<div class="row">
								<div class="col-lg-6">

								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled list-inline social-network">

									</ul>
								</div>
							</div>
						</div>
					</div>
				</footer>
			<!-- End footer -->
		</div>
		<!-- Back to top -->
		<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
		<!-- wp footer -->
		<?php wp_footer(); ?>
	</body>
</html>