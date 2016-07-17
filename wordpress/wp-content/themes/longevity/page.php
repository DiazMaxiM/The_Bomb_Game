<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Longevity
 */

get_header(); ?>

<div class="container">

<?php get_sidebar( 'cta' ); ?>

<?php get_sidebar( 'breadcrumbs' ); ?>

<?php get_sidebar( 'top' ); ?>

  <div class="row">
	<div class="col-md-9">
    
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                
                <?php get_template_part( 'loop' );  ?>
    
            </main>
        </div>

	  </div>
      
      <div class="col-md-3">
	 	 <?php get_sidebar( 'right' ); ?>
      </div>
        
	</div><!-- .row -->
    
    <?php get_sidebar( 'content-bottom' ); ?>
    
</div><!-- .container -->

<?php get_footer(); ?>
