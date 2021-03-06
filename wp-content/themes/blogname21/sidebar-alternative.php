<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogname21
 */

if ( ! is_active_sidebar( 'sidebar-contact' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div class="container-fluid">
		<?php dynamic_sidebar( 'sidebar-contact' ); ?>
	</div>

</aside><!-- #secondary -->
