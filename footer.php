<?php
/**
 * @package WordPress
 * @subpackage Unify Base Theme
 */
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
							<?php wp_nav_menu( array( 'menu' => 'footer' , 'menu_class' => 'list-unstyled list-inline pull-left' )); ?>
						</div>
					</div>
				</footer>
			<!-- End footer -->
		</div>
		<!-- wp footer -->
		<?php wp_footer(); ?>
	</body>
</html>