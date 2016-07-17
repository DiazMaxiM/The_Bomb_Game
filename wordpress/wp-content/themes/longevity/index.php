<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Longevity
 * 
 */

get_header(); ?>

<div class="container">

<?php get_sidebar( 'breadcrumbs' ); ?>

  <div class="row">
  

			<?php 
            $blogstyle = esc_attr(get_theme_mod( 'blog_style', 'blog-lg-right' ) );
                    
                switch ($blogstyle) {
                    
                    // Blog with large featured image and a right sidebar
                    case "blog-lg-right" : 
						echo '<div class="col-md-9"><div id="primary" class="content-area"><main id="main" class="site-main" role="main">';                        						
							get_template_part( 'loop' );
						echo '</main></div></div><div class="col-md-3">';
							get_sidebar( 'right' );
						echo '</div>';					
                    break;		        

                    // Blog with large featured image and a left sidebar
                    case "blog-lg-left" :                         						
						echo '<div class="col-md-9 col-md-push-3"><div id="primary" class="content-area"><main id="main" class="site-main" role="main">';                        						
							get_template_part( 'loop' );
						echo '</main></div></div><div class="col-md-3 col-md-pull-9">';
							get_sidebar( 'left' );
						echo '</div>';					
                    break;
					
                    // Blog with small featured image and a right sidebar
                    case "blog-sm-right" : 
						echo '<div class="col-md-9"><div id="primary" class="content-area"><main id="main" class="site-main blog-small-right" role="main">';                        						
							get_template_part( 'loop' );						
						echo '</main></div></div><div class="col-md-3">';
							get_sidebar( 'right' );
						echo '</div>';					
                    break;		        

                    // Blog with small featured image and a left sidebar
                    case "blog-sm-left" :                         						
						echo '<div class="col-md-9 col-md-push-3"><div id="primary" class="content-area"><main id="main" class="site-main blog-small-left" role="main">';                        						
							get_template_part( 'loop' );
						echo '</main></div></div><div class="col-md-3 col-md-pull-9">';
							get_sidebar( 'left' );
						echo '</div>';					
                    break; 			        
                
                } 
            ?> 
            
	</div><!-- .row -->
        
</div><!-- .container -->

<?php get_footer(); ?>
