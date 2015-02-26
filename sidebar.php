<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _s
 */
if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-md-3" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside><!-- #secondary -->
