<?php
/**
 * The default template for displaying the full single post
 *.
 * @package Longevity
 * 
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">
           
		<?php if( esc_attr(get_theme_mod( 'show_single_thumbnail', 1 ) ) ) :           
             longevity_post_thumbnail(); 
         endif; ?>
             
    <header class="entry-header">
		<?php longevity_post_header(); ?>             
            <div class="entry-meta">
                <?php longevity_entry_meta(); ?>
            </div>        
    </header>

  <div class="entry-content">
    <?php the_content();
      
	  // load our nav is our post is split into multiple pages
	 longevity_multipage_nav();
    ?>
  </div>
  
	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?> 
  
<footer class="entry-footer">

	<?php longevity_post_pagination(); ?>
        
	<?php if( esc_attr(get_theme_mod( 'show_tags_list', 1 ) ) ) :
        longevity_tags_list( '<div class="entry-tags">', '</div>' );
    endif; ?>
    <div class="category-list">      
        <?php if( esc_attr(get_theme_mod( 'show_single_categories', 1 ) ) ) :
            longevity_categories_list();
        endif; ?>
    </div>	
</footer>
  
</article>