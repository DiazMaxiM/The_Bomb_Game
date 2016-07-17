<?php
/**
 * The template for displaying all single posts
 *
 * @package Longevity
 * 
 */

get_header(); ?>

<?php get_sidebar( 'breadcrumbs' ); ?>

<div class="container">

  <div class="row">
  

			<?php 
            $singlestyle = esc_attr(get_theme_mod( 'single_style', 'single-right' ) );
                    
                switch ($singlestyle) {
                    
                    // Single with a right sidebar column
                    case "single-right" : 
						echo '<div class="col-md-9"><div id="primary" class="content-area"><main id="main" class="site-main" role="main">';                        						
							get_template_part( 'loop' );
						echo '</main></div></div><div class="col-md-3">';
							get_sidebar( 'right' );
						echo '</div>';					
                    break;		        

                    // Single with a left sidebar column
                    case "single-left" :                         						
						echo '<div class="col-md-9 col-md-push-3"><div id="primary" class="content-area"><main id="main" class="site-main" role="main">';                        						
							get_template_part( 'loop' );
						echo '</main></div></div><div class="col-md-3 col-md-pull-9">';
							get_sidebar( 'left' );
						echo '</div>';					
                    break;
					
                    // Single without a left or right sidebar
                    case "single" : 
						echo '<div class="col-md-12"><div id="primary" class="content-area"><main id="main" class="site-main" role="main">';                        						
							get_template_part( 'loop' );						
						echo '</main></div></div>';
                    break;
                
                } 
            ?> 
            
	</div><!-- .row -->
        
</div><!-- .container -->



<?php get_footer(); ?>
