<?php
/**
 * Template Name: Template Page Builder
 *
 * This is a special template if you use a page builder plugin.
 * Page builders generate their own layouts, so this is a blank template for you.
 * 
 * @package Longevity
 * 
 *
 */

get_header(); ?>

    
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                
 			<?php get_template_part( 'loop' );  ?>
                
            </main>
        </div>

    
<?php get_footer(); ?>    