<?php
/**
 * Content Bottom Sidebar  
 *
 * @package Longevity
 */


if (   ! is_active_sidebar( 'contentbottom1'  )
	&& ! is_active_sidebar( 'contentbottom2' )
	&& ! is_active_sidebar( 'contentbottom3'  )
	&& ! is_active_sidebar( 'contentbottom4'  )		
		
	)

		return;
	// If we get this far, we have widgets. Let do this.
?>

<div id="content-bottom-group">

        <div class="row">
        
            <aside class="widget-area clearfix" role="complementary">			
              
              <?php if ( is_active_sidebar( 'contentbottom1' ) ) : ?>
              <div id="contentbottom1" <?php longevity_contentbottom(); ?>>
                <?php dynamic_sidebar( 'contentbottom1' ); ?>
                </div><!-- #contentbottom1 -->
              <?php endif; ?>
              
              <?php if ( is_active_sidebar( 'contentbottom2' ) ) : ?>           
              <div id="contentbottom2" <?php longevity_contentbottom(); ?>>
                <?php dynamic_sidebar( 'contentbottom2' ); ?>
                </div><!-- #contentbottom2 -->          
              <?php endif; ?>
              
              <?php if ( is_active_sidebar( 'contentbottom3' ) ) : ?>            
              <div id="contentbottom3" <?php longevity_contentbottom(); ?>>
                <?php dynamic_sidebar( 'contentbottom3' ); ?>
                </div><!-- #contentbottom3 -->
              <?php endif; ?>
              
              <?php if ( is_active_sidebar( 'contentbottom4' ) ) : ?>        
              <div id="contentbottom4" <?php longevity_contentbottom(); ?>>
                <?php dynamic_sidebar( 'contentbottom4' ); ?>
                </div><!-- #contentbottom4 -->
              <?php endif; ?>
              
              </aside>
              
    </div>  
</div>
