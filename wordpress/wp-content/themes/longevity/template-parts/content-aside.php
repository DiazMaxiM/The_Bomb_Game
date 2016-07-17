<?php
/**
 * The template for displaying aside post formats
 *
 * @package Longevity
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
 
 		<?php longevity_post_thumbnail(); ?>        
 
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

  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  
</article>
