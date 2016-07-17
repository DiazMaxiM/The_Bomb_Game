<?php

/**
 * Global Header
 *
 * @package Longevity
 */

  $logo_upload = get_option( 'logo_upload' );
?>


<?php 
            $headerstyle = esc_attr(get_theme_mod( 'header_style', 'default' ) );
                    
                switch ($headerstyle) {
                    
                    // Single with a right sidebar column
                    case "default" :  ?>

  
<header id="masthead" class="site-header" role="banner">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-lg-5">  
                <div id="site-branding">
                    
                <?php if ( $logo_upload['logo'] ) : ?>
                    <div class="header-image">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> 
                        <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" 
                        rel="home"><img id="logo" src="<?php echo esc_url( $logo_upload['logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>"></a>    
                    </div>                
                <?php 
                    endif;            
                        // Site title & tagline
						
                        if( esc_attr(get_theme_mod( 'show_site_title', 1 ) ) ) : ?>  
                           
                        <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                       
                    <?php endif;
                              
                        if ( esc_attr(get_theme_mod( 'show_tagline', 1 ) ) ) : {
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                        <div class="site-description"><?php echo $description; ?></div>
                    <?php endif;				 		  		  
                    }
                    endif;
                ?>
                </div>        
      		</div>
            
          <div class="main-menu col-md-12 col-lg-7">
            
            <?php get_sidebar( 'header' ); ?>
            
            <nav id="site-navigation" class="site-navigation primary-navigation" role="navigation">
              <div class="toggle-container visible-xs visible-sm hidden-md hidden-lg">
                <button class="menu-toggle"><?php  esc_html_e( 'Menu', 'longevity' ); ?></button></div>
              
              <?php if ( has_nav_menu( 'primary' ) ) {																			
                        wp_nav_menu( array( 							
                            'theme_location' => 'primary', 
                            'menu_class' => 'nav-menu'
                                                        
                        ) ); } else {
                    
                        wp_nav_menu( array(															
                            'container' => '',
                            'menu_class' => '',
                            'title_li' => ''							
                            ));							
                       } 
                    ?>                    
              </nav>
            
          </div>
    	</div>
  </div>
</header>
					
                  <?php   break;		        

                    // Single with a left sidebar column
                    case "centered" :        ?>                 						


<header id="masthead" class="site-header header-centered" role="banner">
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">  
                <div id="site-branding" class="header-centered">
                    
                <?php if ( $logo_upload['logo'] ) : ?>
                    <div class="header-image">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> 
                        <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" 
                        rel="home"><img id="logo" src="<?php echo esc_url( $logo_upload['logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>"></a>    
                    </div>                
                <?php 
                    endif;            
                        // Site title & tagline
                        if( esc_attr(get_theme_mod( 'show_site_title', 1 ) ) ) : ?>  
                           
                        <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                       
                    <?php endif;
					
                        if ( esc_attr(get_theme_mod( 'show_tagline', 1 ) ) ) : {
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                        <h2 class="site-description"><?php echo $description; ?></h2>
                    <?php endif;				 		  		  
                    }
                    endif;
                ?>
                </div>        
      		</div>
            
          <div class="main-menu col-md-12">
          
            <?php get_sidebar( 'header' ); ?>
            
            <nav id="site-navigation" class="site-navigation primary-navigation header-centered" role="navigation">
              <div class="toggle-container visible-xs visible-sm hidden-md hidden-lg">
                <button class="menu-toggle"><?php esc_html_e( 'Menu', 'longevity' ); ?></button></div>
              
              <?php if ( has_nav_menu( 'primary' ) ) {																			
                        wp_nav_menu( array( 							
                            'theme_location' => 'primary', 
                            'menu_class' => 'nav-menu'
                                                        
                        ) ); } else {
                    
                        wp_nav_menu( array(															
                            'container' => '',
                            'menu_class' => '',
                            'title_li' => ''							
                            ));							
                       } 
                    ?>                    
              </nav>
            
          </div>
    	</div>
  </div>
</header>        
  
					
                 <?php   break;
				
                } 

            ?> 

            