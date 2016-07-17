<?php
/**
 * The template used for displaying page content
 *
 * @package Longevity
 * 
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="" itemtype="http://schema.org/Article">
<time class="entry-date" datetime="<?php the_date(); ?>" itemprop="datePublished" pubdate></time>
  <div class="article-body" itemprop="articleBody">
      <header class="entry-header">
        <?php 
          the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' );
                 
          if( esc_attr(get_theme_mod( 'show_edit', 1 ) ) ) {
                  edit_post_link( esc_html__( 'Edit this Post', 'longevity' ), '<div class="entry-meta"><span class="edit-link post-meta">', '</span></div>' );
                }
        ?>
      </header>
    
    	<?php longevity_post_thumbnail(); ?>
    
        <div class="entry-content">
          <?php 
          the_content();
          
          wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'longevity' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => ' %',
            'separator'   => ', ',
          ) );
            ?>
          </div>
    
    	<footer class="entry-footer"></footer>
    </div>
</article>
