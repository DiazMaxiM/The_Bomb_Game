<?php
/**
 * The default template for displaying content
 * Used for both single and index/archive.
 *
 * @package Longevity
 *
 */
?>



<?php 
$blogstyle = esc_attr(get_theme_mod( 'blog_style', 'blog-lg-right' ) );
		
	switch ($blogstyle) {
		
		// Blog with large featured image and a right sidebar
		case "blog-lg-right" : ?>
        				
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">           
                <header class="entry-header">
                    <?php  // Check for post thumbnail and insert it
                        if ( has_post_thumbnail() ) {
                            longevity_post_thumbnail();	
                        }
                        // If no thumbnail and is featured
                        else {	
                            if( is_sticky() && is_home() ) :
							$sticky = esc_html__( 'Featured', 'longevity' );
							echo '<div class="sticky-wrapper"><span class="featured">' . $sticky . '</span></div>';
                        endif;
                        }
                    ?>
                    <?php longevity_post_header(); ?>
                    <div class="category-list">      
                        <?php if( esc_attr(get_theme_mod( 'show_categories', 1 ) ) ) {
                            longevity_categories_list();
                        } ?>
                    </div> 
                    <div class="entry-meta">
                        <?php longevity_entry_meta(); ?>
                    </div>
                </header>
                <div class="entry-content">
                         <?php
 			// Option of content or excerpt
			$readmore = esc_html__( 'Read More', 'longevity' );
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'excerpt' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'longevity'));
						break;
						case "excerpt" : 
							echo '<p>' . longevity_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">'  . $readmore . '</a>' ;
						break;
				}
                       		 // load our nav is our post is split into multiple pages
                       		longevity_multipage_nav(); 
                        ?>
                </div>
              <footer class="entry-footer">
              <?php
                if( is_single() && esc_attr(get_theme_mod( 'show_tags_list', 1 ) ) ) {
                  longevity_tags_list( '<div class="entry-tags">', '</div>' );
                }
              ?>
              </footer>
            </article>			
				
				
		<?php break;		        
        
            // Blog with large featured image and a left sidebar
            case "blog-lg-left" :  ?>                       						

           <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">           
                <header class="entry-header">
                    <?php  // Check for post thumbnail and insert it
                        if ( has_post_thumbnail() ) {
                            longevity_post_thumbnail();	
                        }
                        // If no thumbnail and is featured
                        else {	
                            if( is_sticky() && is_home() ) :
							$sticky = esc_html__( 'Featured', 'longevity' );
							echo '<div class="sticky-wrapper"><span class="featured">' . $sticky . '</span></div>';
                        endif;
                        }
                    ?>
                    <?php longevity_post_header(); ?>
                    <div class="category-list">      
                        <?php if( esc_attr(get_theme_mod( 'show_categories', 1 ) ) ) {
                            longevity_categories_list();
                        } ?>
                    </div> 
                    <div class="entry-meta">
                        <?php longevity_entry_meta(); ?>
                    </div>
                </header>
                <div class="entry-content">
                         <?php
 			// Option of content or excerpt
			$readmore = esc_html__( 'Read More', 'longevity' );
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'excerpt' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'longevity'));
						break;
						case "excerpt" : 
							echo '<p>' . longevity_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">'  . $readmore . '</a>' ;
						break;
				}
                       		 // load our nav is our post is split into multiple pages
                       		longevity_multipage_nav(); 
                        ?>
                </div>
              <footer class="entry-footer">
              <?php
                if( is_single() && esc_attr(get_theme_mod( 'show_tags_list', 1 ) ) ) {
                  longevity_tags_list( '<div class="entry-tags">', '</div>' );
                }
              ?>
              </footer>
            </article>			
				


        
           <?php break;
            
            // Blog with small featured image and a right sidebar
            case "blog-sm-right" : ?>


               <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">            
                <div class="row"> 
                  
					<?php  // Check for post thumbnail and insert it
                    if ( has_post_thumbnail() ) {							
                        echo '<div class="col-lg-4">';
                        echo '<div class="post-thumbnail"><a class="post-thumbnail-link" href="', the_permalink(),'" aria-hidden="true">';
                        the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "thumbnailUrl"));
                        echo '</a></div></div><div class="col-lg-8">';
                        if( is_sticky() && is_home() ) :
							$sticky = esc_html__( 'Featured', 'longevity' );
							echo '<div class="sticky-wrapper small-featured"><span class="featured">' . $sticky . '</span></div>';
                        endif;
                     }
                    // If no thumbnail and is featured
                    else {	
                    echo '<div class="col-lg-12">';
           if( is_sticky() && is_home() ) :
							$sticky = esc_html__( 'Featured', 'longevity' );
							echo '<div class="sticky-wrapper"><span class="featured">' . $sticky . '</span></div>';
                    endif;
                    }
                ?>
               <header class="entry-header small-featured">             
                 <?php longevity_post_header(); ?>
                     <div class="category-list">      
                         <?php if( esc_attr(get_theme_mod( 'show_categories', 1 ) ) ) {
                                longevity_categories_list();
                            } ?>
                     </div> 
                     <div class="entry-meta">
                         <?php longevity_entry_meta(); ?>
                     </div>
                     </header>
                     <div class="entry-content">
                         <?php
 			// Option of content or excerpt
			$readmore = esc_html__( 'Read More', 'longevity' );
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'excerpt' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'longevity'));
						break;
						case "excerpt" : 
							echo '<p>' . longevity_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">'  . $readmore . '</a>' ;
						break;
				}
                       		 // load our nav is our post is split into multiple pages
                       		longevity_multipage_nav(); 
                        ?>
                     </div>
                     <footer class="entry-footer">
                       <?php
                    if( is_single() && esc_attr(get_theme_mod( 'show_tags_list', 1 ) ) ) {
                      longevity_tags_list( '<div class="entry-tags">', '</div>' );
                    }
                  ?>
                     </footer>
                   </div>
                  </div>
                </article>
                
           <?php break;		        
        
            // Blog with small featured image and a left sidebar
            case "blog-sm-left" :  ?>                    						


               <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">            
                <div class="row"> 
                  
					<?php  // Check for post thumbnail and insert it
                    if ( has_post_thumbnail() ) {							
                        echo '<div class="col-lg-4">';
                        echo '<div class="post-thumbnail"><a class="post-thumbnail-link" href="', the_permalink(),'" aria-hidden="true">';
                        the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "thumbnailUrl"));
                        echo '</a></div></div><div class="col-lg-8">';
                        if( is_sticky() && is_home() ) :
							$sticky = esc_html__( 'Featured', 'longevity' );
							echo '<div class="sticky-wrapper small-featured"><span class="featured">' . $sticky . '</span></div>';
                        endif;
                     }
                    // If no thumbnail and is featured
                    else {	
                    echo '<div class="col-lg-12">';
           if( is_sticky() && is_home() ) :
							$sticky = esc_html__( 'Featured', 'longevity' );
							echo '<div class="sticky-wrapper"><span class="featured">' . $sticky . '</span></div>';
                    endif;
                    }
                ?>
               <header class="entry-header small-featured">             
                 <?php longevity_post_header(); ?>
                     <div class="category-list">      
                         <?php if( esc_attr(get_theme_mod( 'show_categories', 1 ) ) ) {
                                longevity_categories_list();
                            } ?>
                     </div> 
                     <div class="entry-meta">
                         <?php longevity_entry_meta(); ?>
                     </div>
                     </header>
                     <div class="entry-content">
                         <?php
 			// Option of content or excerpt
			$readmore = esc_html__( 'Read More', 'longevity' );
			$excerptcontent = esc_attr(get_theme_mod( 'excerpt_content', 'excerpt' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontent) {
						case "content" :
							the_content(esc_html__('Read More', 'longevity'));
						break;
						case "excerpt" : 
							echo '<p>' . longevity_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">'  . $readmore . '</a>' ;
						break;
				}
                       		 // load our nav is our post is split into multiple pages
                       		longevity_multipage_nav(); 
                        ?>
                     </div>
                     <footer class="entry-footer">
                       <?php
                    if( is_single() && esc_attr(get_theme_mod( 'show_tags_list', 1 ) ) ) {
                      longevity_tags_list( '<div class="entry-tags">', '</div>' );
                    }
                  ?>
                     </footer>
                   </div>
                  </div>
                </article>
                
                            
          <?php  break; 			        
        
        } 
        ?> 