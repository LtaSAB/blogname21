<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogname21
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-fluid">
			<div class="site-info ">
				<span class="copyright"> &copy; <?php echo __('Copyright'); ?> </span>
				<span class="date"><?php the_date('Y');?></span>
			</div><!-- .site-info -->
			<ul class="social-icons clearfix ">
				<?php if (!empty(get_theme_mod('social_icon_facebook'))){
					?>
					<li><a href="<?php  echo get_theme_mod('social_icon_facebook')?>"><span class="fa fa-facebook"></span></a></li>
					<?php
				}
				?>
				<?php if (!empty(get_theme_mod('social_icon_twitter'))){
					?>
					<li><a href="<?php echo get_theme_mod('social_icon_twitter')?>"><span class="fa fa-twitter"></span></a></li>
					<?php
				}
				?>
				<?php if (!empty(get_theme_mod('social_icon_pinterest'))){
					?>
					<li><a href="<?php echo get_theme_mod('social_icon_pinterest')?>"><span class="fa fa-pinterest"></span></a></li>
					<?php
				}
				?>
				<?php if (!empty(get_theme_mod('social_icon_linkedin'))){
					?>
					<li><a href="<?php echo get_theme_mod('social_icon_linkedin')?>"><span class="fa fa-linkedin"></span></a></li>
					<?php
				}
				?>
				<?php if (!empty(get_theme_mod('social_icon_google'))){
					?>
					<li><a href="<?php echo get_theme_mod('social_icon_google')?>"><span class="fa fa-google"></span></a></li>
					<?php
				}
				?>
			</ul>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
