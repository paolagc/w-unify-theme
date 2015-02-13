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
							<?php if ( is_active_sidebar( 'footer' ) ) : ?>
								<div id="before" class="widget-area row">
										<?php dynamic_sidebar( 'footer' ); ?>
								</div><!-- #after content region -->
							<?php endif; ?>	
						</div>
					</div>
					<div class="copyright">
						<div class="container">
							<?php wp_nav_menu( array( 'menu' => 'footer' , 'menu_class' => 'nav navbar-nav pull-right' )); ?>
						</div>
					</div>
				</footer>
			<!-- End footer -->
		</div>
		<!-- Back to top -->
		<a href="#" class="topcontrol"><i class="fa fa-angle-up active"></i></a>
		<!-- wp footer -->
		<?php wp_footer(); ?>
	</body>
</html>