<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package horizonweb
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</div><!-- #secondary -->
