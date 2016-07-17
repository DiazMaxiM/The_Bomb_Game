<?php
/**
 * Template Name: Template Left Column
 *
 * @package Longevity
 * 
 *
 */

get_header(); ?>

<div class="container">

<?php get_sidebar( 'cta' ); ?>

<?php get_sidebar( 'breadcrumbs' ); ?>

<?php get_sidebar( 'top' ); ?>

  <div class="row">
  
	
      
      <div class="col-md-9 col-md-push-3">
    
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
            
 			<?php get_template_part( 'loop' );  ?>
                
            </main>
        </div>

	  </div>
      <div class="col-md-3 col-md-pull-9">
	 	 <?php get_sidebar( 'left' ); ?>
      </div>       
	</div>
    
    <?php get_sidebar( 'content-bottom' ); ?>
        
</div>
    
<?php get_footer(); ?>    