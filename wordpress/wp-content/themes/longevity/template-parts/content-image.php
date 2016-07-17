<?php
/**
 * The template for displaying image post formats
 *
 * @package Longevity
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">

    <header class="entry-header">
		<?php longevity_post_header(); ?>    
 		<div class="entry-meta">
          
			<?php 
			$format = get_post_format();
				if ( current_theme_supports( 'post-formats', $format ) ) {
					printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
					sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'longevity' ) ),
					esc_url( get_post_format_link( $format ) ),
					esc_html(get_post_format_string( $format ) )
				);
			}
	 		?> 
             <?php longevity_entry_meta(); ?>  
        </div>
    </header>

<?php longevity_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
			// Option of content or excerpt
			$readmore = esc_html__( 'Read More', 'longevity' );
			$excerptcontentimage = esc_attr(get_theme_mod( 'excerpt_content_image', 'excerpt' ));
				$excerptsize = esc_attr(get_theme_mod( 'excerpt_limit', '50' ));
					 switch ($excerptcontentimage) {
						case "content" :
							the_content(esc_html__('Read More', 'longevity'));
						break;
						case "excerpt" : 
							echo '<p>' . longevity_excerpt($excerptsize) . '</p>' ;
							echo '<p class="read-more"><a class="more-link" href="' . get_permalink() . '" itemprop="url">'  . $readmore .  '</a></p>' ;
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
