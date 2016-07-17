<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Longevity
 */
?>

	</div><!-- .site-content -->  

    <div id="bottom-group">       
        <?php get_sidebar( 'bottom' ); ?>   
    </div>
    
    <footer id="colophon" class="site-footer" role="contentinfo">
    	
 <?php get_sidebar( 'footer' ); ?>  
        
 <?php  // Social links
	  if ( has_nav_menu( 'social-footer' ) ) :
			echo '<div id="footer-social"><nav class="social-menu" role="navigation">';
				
			wp_nav_menu( array(
				'theme_location' => 'social-footer',
				'depth'          => 1,
				'container' => false,
				'menu_class'         => 'social',
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',
			) );
				
			echo '</nav></div>';
		endif;          
	?>       

        <nav id="footer-nav" role="navigation">
            <?php wp_nav_menu( array( 
                    'theme_location' => 'footer', 
                    'fallback_cb' => false, 
                    'depth' => 1,
                    'container' => false, 
                    'menu_id' => 'footer-menu', 
                ) ); 
            ?>
        </nav> 
        
      
                
        <div id="copyright">
          <?php esc_html_e('Copyright &copy;', 'longevity'); ?>  <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod( 'copyright',  esc_html__('Your Name', 'longevity') ) ); ?>.&nbsp;<?php esc_html_e('All rights reserved.', 'longevity'); ?>
        </div>          
    

    
    </footer>  
     
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>