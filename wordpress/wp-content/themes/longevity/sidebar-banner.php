<?php
/**
 * Sidebar for the banner area 
 * @package Longevity
 *  
 */
 
$fpcurve = esc_attr(get_theme_mod( 'show_fpcurve', 1 ) ) ;
$curve = esc_attr(get_theme_mod( 'show_curve', 1 ) ) ;
$colourscheme = esc_attr(get_theme_mod( 'colour_scheme', 'default' ) ) ; 
$fplgcurve = esc_attr(get_theme_mod( 'fplg_curve', 1 ) ) ;
$lgcurve = esc_attr(get_theme_mod( 'lg_curve', 1 ) ) ;

?>

<?php // for the front page
 if ( is_front_page()) : ?>

 	<aside id="fp-banner" role="complementary">
        
		<?php // if a banner is active
		if (  is_active_sidebar( 'banner' ) ) : ?>
         
          		<?php dynamic_sidebar( 'banner' );
				if( $fpcurve ) : // show or hide the curve on the front page
                	if( $fplgcurve ) : // show the large curve on the front page
                        echo '<div id="banner-curve"><img src="' . get_template_directory_uri()  . '/images/wave-fp-' . $colourscheme . '.png" alt="banner curve" /></div>';
                	else :  // otherwise show the small one
                        echo '<div id="banner-curve"><img src="' . get_template_directory_uri()  . '/images/wave-page-' . $colourscheme . '.png" alt="banner curve" /></div>';
                	endif; 
				endif;
				?>
                
        <?php // if no banner is published
		else : ?>
        
           <?php if( $fpcurve ) : // show the curve when no banner is published
					echo '<div id="no-banner"></div>';
					echo '<div id="banner-curve"><img src="' . get_template_directory_uri()  . '/images/wave-page-' . $colourscheme . '.png" alt="banner curve" /></div>';
				else : // hide the curve if this is set and has no banner
					echo '<div id="no-banner" class="no-curve"></div>';								
			endif; ?>
                
        <?php endif; ?>
        
 	</aside>

<?php // for inner pages
else : ?>

        <aside id="page-banner" role="complementary">

		<?php // if a banner is active
		if (  is_active_sidebar( 'banner' ) ) : ?>
         
          		<?php dynamic_sidebar( 'banner' );
				if( $curve ) : // show or hide the curves
                	if( $lgcurve ) : // show the large curve on the front page
                        echo '<div id="banner-curve"><img src="' . get_template_directory_uri()  . '/images/wave-fp-' . $colourscheme . '.png" alt="banner curve" /></div>';
                	else :  // otherwise show the small one
                        echo '<div id="banner-curve"><img src="' . get_template_directory_uri()  . '/images/wave-page-' . $colourscheme . '.png" alt="banner curve" /></div>';
                	endif; 
				endif;
				?>
                
        <?php // if no banner is published
		else : ?>
        
           <?php if( $curve ) : // show the curve when no banner is published
					echo '<div id="no-banner"></div>';
					echo '<div id="banner-curve"><img src="' . get_template_directory_uri()  . '/images/wave-page-' . $colourscheme . '.png" alt="banner curve" /></div>';
				else : // hide the curve if this is set and has no banner
					echo '<div id="no-banner" class="no-curve"></div>';								
			endif; ?>
                
        <?php endif; ?>
         
        </aside>

<?php endif; ?>