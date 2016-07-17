<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Longevity
 * 
 */
 
 
 $pagewidth = esc_attr(get_theme_mod( 'page_width', 'fullwidth' ) ) ;
 $preloader = esc_attr(get_theme_mod( 'show_preloader', 1 ) ) ;

 ?>
 
 
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if( $preloader ) : ?>
<div class="preloader">
  <div class="spinner">
    <div class="double-bounce1"></div>
    <div class="double-bounce2"></div>
  </div>
</div>
<?php endif; ?>

<div id="page" class="hfeed site <?php echo $pagewidth ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'longevity' ); ?></a>  
    
    
      
<div id="topbar">
  <div class="container">
    <div class="row">
    
    
  <?php if( esc_attr(get_theme_mod( 'show_top_search', 0 ) ) == '1') : ?> 
    <div id="social-wrapper" class="col-lg-10">
    
    <?php else : ?>
    
      <div id="social-wrapper" class="col-lg-12">
    
      <?php endif; ?>
      
      <?php // Social links
	if ( has_nav_menu( 'social' ) ) :
		echo '<nav class="social-menu" role="navigation">';		
			wp_nav_menu( array(
				'theme_location' => 'social',
				'depth'          => 1,
				'container'		 => false,
				'menu_class'     => 'social',
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
			) );		
		echo '</nav>';	
	endif;          
	?>
     </div> 
     <?php if( esc_attr(get_theme_mod( 'show_top_search', 0 ) ) ) : ?> 
      <div id="top-search" class="col-lg-2">		
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		  <span class="screen-reader-text"><?php echo _x( 'Search for:', 'Search for:', 'longevity' ); ?></span>
          <div class="input-group">
            <input type="text" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="<?php echo esc_attr_x( 'Search Words', 'Search field Text', 'longevity' ); ?>">       
          </div>
        </form>				
      </div> 
      <?php endif; ?>
      
    </div>
  </div>
</div>
  
 
<?php get_template_part( 'template-parts/headers' ); ?>

<?php get_sidebar( 'banner' ); ?>

<div id="content" class="site-content">


