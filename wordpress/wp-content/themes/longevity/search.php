<?php
/**
 * The template for displaying search results.
 *
 * @package Longevity
 * 
 */

get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
          
          <?php get_template_part( 'loop' );	?>
          
          </main><!-- .site-main -->
      </section><!-- .content-area -->
      </div>
  </div>
</div>

<?php get_footer(); ?>