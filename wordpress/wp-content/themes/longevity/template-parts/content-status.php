<?php
/**
 * The template for displaying status post formats
 *
 * @package Longevity
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">

    <header class="entry-header">
    
     <?php echo get_avatar( get_the_author_meta( 'ID' ), 70 ); ?>
     
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

  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  
</article>

