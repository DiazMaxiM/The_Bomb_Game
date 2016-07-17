<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package madhat
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
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'madhat' ); ?></a>
	<div id="jumbosearch">
		<span class="fa fa-remove closeicon"></span>
		<div class="form">
			<?php get_search_form(); ?>
		</div>
	</div>	
	
	<div id="top-bar">
		<div class="container">
			<div id="social-icons">
				<?php get_template_part('social', 'fa'); ?>
			</div>
		</div>
	</div>
	
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php if ( madhat_logo() ) : ?>
				<div id="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo madhat_logo(); ?>"></a>
				</div>
				<?php endif; ?>
				<div id="text-title-desc">
				<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>	
		</div>	
		
		<!--
<div id="search-icon">
			<a id="searchicon">
				<span class="fa fa-search"></span>
			</a>
		</div>	
-->
		
	</header><!-- #masthead -->
	
	<div id="top-menu">
		<div class="container">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>	
	</div>

		
	<div class="mega-container">
			
		<?php get_template_part('featured', 'skew'); ?>
		<?php get_template_part('featured', 'area2'); ?>
		
		<?php if( class_exists('rtslider') ) {
			 get_template_part('slider', 'nivo' ); 
		} ?>
	
		<div id="content" class="site-content container">