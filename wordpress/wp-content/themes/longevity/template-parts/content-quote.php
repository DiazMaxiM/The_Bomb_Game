<?php
/**
 * The template for displaying status post formats
 *
 * @package Longevity
 * 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">

		<div class="row">
			 <?php  // Check for post thumbnail and insert it
					if ( has_post_thumbnail() ) :
						echo '<div class="col-sm-2 col-md-2 col-lg-2">';
						the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image"));	
						echo '</div>';
						echo '<div class="col-sm-10 col-md-10 col-lg-10">';
					
					// If no thumbnail and is featured
					else :	
					   echo '<div class="col-lg-12">';
					endif;                                    
				?>

    <header class="entry-header">     
     <?php the_title( '<h2 class="entry-title" itemprop="name">', '</h2>' );	?>
    </header>

  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  
  </div>
</div>
</article>

