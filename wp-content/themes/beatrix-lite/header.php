<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Beatrix Lite
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'beatrix-lite' ); ?></a>	
<div class="<?php if(is_page() || is_single()) { echo 'beatrix-lite-col-12'; } else { echo 'beatrix-lite-col-6'; } ?> beatrix-lite-columns padding-right clearfix">	
	<header id="masthead" class="site-header" role="banner">	
		<div class="header-content">		
				<div class="header-content__container container">
						 <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { ?>
									<?php the_custom_logo(); ?>
						<?php } else { ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php } ?>
						<nav id="site-navigation" class="main-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'beatrix-lite' ); ?></button>
								<?php wp_nav_menu( array(
										'theme_location' => 'menu-1',
										'menu_id' => 'primary-menu',
								) ); ?>	
						</nav><!-- #site-navigation -->
				</div>
		</div><!-- .header-content -->  	
	</header><!-- #masthead -->	
</div>	
	<div id="content" class="site-content container">