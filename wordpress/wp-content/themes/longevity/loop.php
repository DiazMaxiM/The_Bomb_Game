<?php
/**
 * Various loops for this theme.
 *
 * @package Longevity
 * 
 */
?>


<?php if ( is_home() ) : ?>

	<?php if ( have_posts() ) :
        if ( is_home() && ! is_front_page() ) :		 
            echo '<header><h1 class="page-title screen-reader-text">' , single_post_title() , '</h1></header>';	endif; 	
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', get_post_format() );
        endwhile;
            longevity_blog_pagination();
        else :
            get_template_part( 'template-parts/content', 'none' ); 
    endif; ?>

<?php elseif (is_single()) : ?>

	<?php while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', 'single' );
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile; ?>

<?php elseif (is_archive()) : ?>

		<?php if ( have_posts() ) : ?>
			<header class="page-header">
            		<?php if ( is_author() ) :
							
						else :
							echo '<h1 id="page-title">' . longevity_get_archive_title(). '</h1>'; 			
						endif;
				
                if ( is_category() ) {
                    // show an optional category description
                    $category_description = category_description();
                    if ( ! empty( $category_description ) )
                        echo apply_filters( 'longevity_category_archive', '<div class="category-description">' . $category_description . '</div>' );
    
                }
                elseif ( is_tag() ) {
                    // show an optional tag description
                    $tag_description = tag_description();
                    if ( ! empty( $tag_description ) )
                        echo apply_filters( 'longevity_tag_archive', '<div class="category-description">' . $tag_description . '</div>' );
                }
                else {
                    $description = term_description();
                    if ( ! empty( $description ) )
                        echo apply_filters( 'longevity_category_archive', '<div class="category-description">' . $description . '</div>' );
                }
                ?>               
			</header>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() );	?>
			<?php endwhile; ?>
			<?php longevity_blog_pagination();	?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
        

<?php elseif (is_search()) : ?>

        <?php if ( have_posts() ) : ?>
          
          <header class="page-header">
            <h1 class="page-title"><?php printf( esc_html__('Search Results for: %s', 'longevity' ), get_search_query() ); ?></h1>
            </header>
          
          <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'search' );
		// End the loop.
		endwhile;
			// Previous/next page navigation.
			longevity_blog_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

<?php elseif (is_page()) : ?>

	<?php while ( have_posts() ) : the_post();  
        get_template_part( 'template-parts/content', 'page' );
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif; 
    endwhile; ?>


<?php endif; ?>