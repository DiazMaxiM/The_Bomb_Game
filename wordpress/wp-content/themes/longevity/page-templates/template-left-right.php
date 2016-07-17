<?php
/**
 * Template Name: Template Left &amp; Right Column
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
  
      <div class="col-lg-3">
	 	 <?php get_sidebar( 'left' ); ?>
      </div>	
      
      <div class="col-lg-6">
    
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                
                    <?php get_template_part( 'loop' );  ?>
                
            </main>
        </div>

	  </div>
 
      <div class="col-lg-3">
	 	 <?php get_sidebar( 'right' ); ?>
      </div> 
       
	</div>
    
    <?php get_sidebar( 'content-bottom' ); ?>    
    
</div><!-- .container -->
    
<?php get_footer(); ?>    