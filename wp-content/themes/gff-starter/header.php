<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GFF_Starter
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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gff-starter' ); ?></a>

	<header id="masthead" class="site-header " role="banner">
		<div class="container"><div class="site-branding row">
      <!-- Widget header code containing logos, CTA, etc. --> 
	  <?php dynamic_sidebar('header-widget-1');?>
		</div></div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
		
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'menu', 'container' => 'div', 'container_class' => 'container' ) ); ?><!-- menu_id must = menu for slicknav mobile menu to work -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
 <!-- CSS slideout form --> 
     <?php if (is_active_sidebar('slideout-widget')) {
     ?>
     <?php dynamic_sidebar('slideout-widget');?>
   
 <?php
     }
 ?>  
    
	<div id="content" class="site-content">
