<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogname21
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div class="container-fluid">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php if ( ! empty( get_theme_mod( 'img-upload' ) ) ) { ?>
		<div class="banner">
			<img src="<?php echo get_theme_mod( 'img-upload' ) ?>" alt="banner">
		</div>
		<?php
	} ?>
	</div>
</aside><!-- #secondary -->
