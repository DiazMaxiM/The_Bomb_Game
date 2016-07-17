<?php
/**
 * The template for displaying author info and posts.
 *
 * @package Longevity
 *
 */
 
 get_header(); ?>
<div class="container">

<?php get_sidebar( 'breadcrumbs' ); ?>
    
			<?php 
            $blogstyle = esc_attr(get_theme_mod( 'blog_style', 'blog-lg-right' ) );
                    
                switch ($blogstyle) {
                    
                    // Blog with large featured image and a right sidebar
                    case "blog-lg-right" : 
					
						echo '<div class="col-md-9"><div id="primary" class="content-area"><main id="main" class="site-main" role="main">'; ?>
						  
                            <div class="author-information" itemscope="" itemtype="http://schema.org/Person">
                                  
                                      <div class="author-page-header">
                                        <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
                                        <h1><span class="contact-name" itemprop="name"><?php echo esc_html($curauth->display_name); ?></span></h1>					
                                      </div>
                                      <div class="author-description">
                                        <p class="author-bio"><?php echo esc_html($curauth->user_description); ?></p>	
                                      </div>
                                      <div class="author-website">
                                        <a href="<?php echo esc_url($curauth->user_url); ?>" target="_blank" itemprop="url"><?php echo esc_url($curauth->user_url); ?></a>
                                      </div>                                   
                            </div>
    																
  					<div class="author-posts">
                   
                    <?php get_template_part( 'loop' ); ?>
                    
                 	</div>
					<?php							
						echo '</main></div></div><div class="col-md-3">';
							get_sidebar( 'right' );
						echo '</div>';					
                    break;		        

                    // Blog with large featured image and a left sidebar
                    case "blog-lg-left" :                         						
						echo '<div class="col-md-9 col-md-push-3"><div id="primary" class="content-area"><main id="main" class="site-main" role="main">'; ?>
						  
                            <div class="author-information" itemscope="" itemtype="http://schema.org/Person">
                                  
                                      <div class="author-page-header">
                                        <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
                                        <h1><span class="contact-name" itemprop="name"><?php echo esc_html($curauth->display_name); ?></span></h1>					
                                      </div>
                                      <div class="author-description">
                                        <p class="author-bio"><?php echo esc_html($curauth->user_description); ?></p>	
                                      </div>
                                      <div class="author-website">
                                        <a href="<?php echo esc_url($curauth->user_url); ?>" target="_blank" itemprop="url"><?php echo esc_url($curauth->user_url); ?></a>
                                      </div>                                    
                           
    					</div>											
  					<div class="author-posts">
                   
                    <?php get_template_part( 'loop' ); ?>
                    
                 	</div>                        
                        <?php                       						
							get_template_part( 'loop' );
						echo '</main></div></div><div class="col-md-3 col-md-pull-9">';
							get_sidebar( 'left' );
						echo '</div>';					
                    break;
					
                    // Blog with small featured image and a right sidebar
                    case "blog-sm-right" : 
						echo '<div class="col-md-9"><div id="primary" class="content-area"><main id="main" class="site-main blog-small-right" role="main">';  ?>
						  
                            <div class="author-information" itemscope="" itemtype="http://schema.org/Person">
                                  
                                      <div class="author-page-header">
                                        <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
                                        <h1><span class="contact-name" itemprop="name"><?php echo esc_html($curauth->display_name); ?></span></h1>					
                                      </div>
                                      <div class="author-description">
                                        <p class="author-bio"><?php echo esc_html($curauth->user_description); ?></p>	
                                      </div>
                                      <div class="author-website">
                                        <a href="<?php echo  esc_url($curauth->user_url); ?>" target="_blank" itemprop="url"><?php echo  esc_url($curauth->user_url); ?></a>
                                      </div>                                    
                                		
                            
    					</div>											
  					<div class="author-posts">
                   
                    <?php get_template_part( 'loop' ); ?>
                    
                 	</div>                        
                        <?php                       						
													
						echo '</main></div></div><div class="col-md-3">';
							get_sidebar( 'right' );
						echo '</div>';					
                    break;		        

                    // Blog with small featured image and a left sidebar
                    case "blog-sm-left" :                         						
						echo '<div class="col-md-9 col-md-push-3"><div id="primary" class="content-area"><main id="main" class="site-main blog-small-left" role="main">';  ?>
					 
                            <div class="author-information" itemscope="" itemtype="http://schema.org/Person">
                                  
                                      <div class="author-page-header">
                                        <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
                                        <h1><span class="contact-name" itemprop="name"><?php echo esc_html($curauth->display_name); ?></span></h1>					
                                      </div>
                                      <div class="author-description">
                                        <p class="author-bio"><?php echo esc_html($curauth->user_description); ?></p>	
                                      </div>
                                      <div class="author-website">
                                        <a href="<?php echo  esc_url($curauth->user_url); ?>" target="_blank" itemprop="url"><?php echo esc_url($curauth->user_url); ?></a>
                                      </div>                                    
                                		
                            </div>
    															
  					<div class="author-posts">
                   
                    <?php get_template_part( 'loop' ); ?>
                    
                 	</div>
                    <?php
						echo '</main></div></div><div class="col-md-3 col-md-pull-9">';
							get_sidebar( 'left' );
						echo '</div>';					
                    break; 			        
                
                } 
            ?>     
    
    </div>
</div>     
      
<?php
get_footer();

	