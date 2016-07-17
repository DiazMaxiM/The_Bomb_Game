<?php
/**
 * The template for displaying image attachments 
 *
 * @package Longevity
 * 
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header(); ?>


<div class="container">
  <div class="row">
  
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
          <div class="col-lg-12">
  <?php
				// Start the loop.
				while ( have_posts() ) : the_post();
			?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>            
              
              <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                
                </header><!-- .entry-header -->
              
              <div class="entry-content">
                
                <div class="entry-attachment">
		<?php
			$image_size = apply_filters( 'longevity_attachment_size', 'large' );
			echo wp_get_attachment_image( get_the_ID(), $image_size );
            ?>
                  
                  <?php if ( has_excerpt() ) : ?>
                  <div class="entry-caption">
                    <?php the_excerpt(); ?>
                    </div>
                  <?php endif; ?>
                  
                  </div>
                
                <?php
				the_content();
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'longevity' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'longevity' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
                </div>
              
              <footer class="entry-footer">
                
                <nav id="image-navigation" class="navigation image-navigation">
                  <div class="nav-links">
                    <div class="nav-previous"><?php previous_image_link( false,  esc_html__( 'Previous Image', 'longevity' ) ); ?></div>
                    <div class="nav-next"><?php next_image_link( false,  esc_html__( 'Next Image', 'longevity' ) ); ?></div>
                    </div>
                  </nav>                    
                
                </footer>
              
              </article>
            
            <?php	// End the loop.
				endwhile;
			?>
          </div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
    </div>
    </div>
    
<?php
get_footer();
