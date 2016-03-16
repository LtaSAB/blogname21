<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogname21
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="container-fluid">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
					                          rel="home"><img src="<?php echo get_theme_mod( 'logo-upload' ) ?>"
					                                          alt="logotype"></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
					                         rel="home"><img src="<?php echo get_theme_mod( 'logo-upload' ) ?>"
					                                         alt="logotype"></a></p>
					<?php
				endif;
				?>
			</div><!-- .site-branding -->
			<div class="search">
				<form action="#">
					<div class="search-inner">
						<label for="search"></label>
						<input type="search" id="search" placeholder="<?php echo __( 'Search' ); ?>">
						<button class=" fa fa-search" type="submit"></button>
					</div>
				</form>
			</div>
		</div>
		<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
			<button class="hamburger">&#9776;</button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content clearfix">
