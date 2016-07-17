<?php
/**
 * Custom template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Longevity
 * @since Longevity 1.0.4
 */



/**
 * Blog post header
 * Displays the post title with or without the sticky label.
 * Displays categories in the summary view with option to show or hide.
 */

if ( ! function_exists( 'longevity_post_header' ) ) :

function longevity_post_header() { 
    
    if ( is_single() ) :
	
        echo '<h1 class="entry-title" itemprop="name">';		
		if(the_title( '', '', false ) !='') the_title(); 
			else esc_html_e('Untitled', 'longevity'); 
		echo '</h1>';
	  
    else :
	
      echo '<h2 class="entry-title" itemprop="name"><a href="' .esc_url( get_permalink() ) .'">';		
		if(the_title( '', '', false ) !='') the_title(); 
			else esc_html_e('Untitled', 'longevity'); 
		echo '</a></h2>';
	  
    endif;
}
endif;



if ( ! function_exists( 'longevity_post_thumbnail' ) ) : 
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function longevity_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
        <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image")); ?>
	</div>

	<?php else : ?>

	<div class="post-thumbnail">
        <a class="post-thumbnail-link" href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php
                the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "thumbnailUrl"));
            ?>
        </a>
    <?php if( is_sticky() && is_home() ) :
      printf( '<span class="featured">%s</span>', esc_attr(get_theme_mod( 'sticky_post_label' )) ? esc_html( get_theme_mod( 'sticky_post_label' ) ) : esc_html__('Featured', 'longevity' ) );
    endif; ?>
    
	</div>
    
	<?php endif; // End is_singular()
}
endif; 
 

if ( ! function_exists( 'longevity_entry_meta' ) ) :
  /**
   * Prints HTML with meta information for the categories, post date.
   */
  function longevity_entry_meta() {
    if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) && get_theme_mod( 'show_posted_date', 1 ) ) {
      longevity_posted_on( sprintf( '%s', _x( 'Published on', 'Used before publish date.', 'longevity' ) ) );

    }
	if ( 'post' == get_post_type() ) {
		if ( esc_attr(get_theme_mod( 'show_post_author', 1 )) ) {

			printf( '<span class="byline post-meta" itemprop="author" itemscope="" itemtype="http://schema.org/Person"><span class="author vcard">%1$s <a class="url fn n" href="%2$s" itemprop="url"><span itemprop="name">%3$s</span></a></span></span>',
				_x( 'By', 'Used before post author name.', 'longevity' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}	
	}
	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		if ( esc_attr(get_theme_mod( 'show_comments_link', 1 )) ) :
			echo '<span class="comments-link">';
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'longevity' ), get_the_title() ) );
			echo '</span>';
		endif;
	}	
	if( esc_attr(get_theme_mod( 'show_edit', 1 ) ) ) {
              edit_post_link( esc_html__( 'Edit this Post', 'longevity' ), '<span class="edit-link post-meta">', '</span>' );
            }		
  	}
endif;

/**
 * Prints HTML with date the post was created.
 */
if ( ! function_exists( 'longevity_posted_on' ) ) :
  function longevity_posted_on( $before = '', $after = '' ) {
    $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';

    $time_string = sprintf( $time_string,
      esc_attr( get_the_date( 'c' ) ),
      get_the_date()
    );

    printf( '<span class="posted-on post-meta">%s %s%s</span>', $before, $time_string, $after );
  }
endif;

/**
 * Prints HTML with post categories list.
 */
if ( ! function_exists( 'longevity_categories_list' ) ) :
  function longevity_categories_list() {
	  
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'longevity' ) );
    if ( $categories_list && longevity_categorized_blog() && is_single() ) {
      printf( '<span class="category-label">%1$s</span> <span itemprop="genre">%2$s</span>',		
				_x( 'Categories', 'Used before category names.', 'longevity' ), 
				$categories_list 
			);	  
   		}
		else {
			printf( '<span class="category-links" itemprop="genre">%s</span>', 
			$categories_list 
			);
		}
  }
endif;

/**
 * Prints HTML with post tags list.
 */
if ( ! function_exists( 'longevity_tags_list' ) ) :
  function longevity_tags_list() {

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'longevity' ) );
		if ( $tags_list ) {
			printf( '<span class="tag-list"><span class="tags-label">%1$s</span> %2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'longevity' ),
				$tags_list
			);
		}	
  }
endif;


/**
 * Check if post has more tag.
 */
function longevity_has_more() {
  global $post;
  
  if( is_singular() )
    return false;
  
  if( strpos( $post->post_content, '<!--more-->' ) )
    return true;
  
  return false;
}


/**
 * Blog pagination when more than one page of post summaries.
 */

if ( ! function_exists( 'longevity_blog_pagination' ) ) :
function longevity_blog_pagination() {	
	the_posts_pagination( array(
		'prev_text'      => '<span class="previous">' . esc_html__( 'Prev', 'longevity' ) . '</span>',		
		'next_text'      => '<span class="next">' . esc_html__( 'Next', 'longevity' ) . '</span>',		
		'before_page_number' => ''
	) );	
}
endif;

/**
 * Single Post previous or next navigation.
 */

if ( ! function_exists( 'longevity_post_pagination' ) ) :
function longevity_post_pagination() {
	the_post_navigation( array(	
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Article', 'longevity' ) . '</span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Next Article:', 'longevity' ) . '</span> ' .
			'<span class="post-title">%title</span>',
			
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Article', 'longevity' ) . '</span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Previous Article:', 'longevity' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}
endif;

/**
 * Multi-page navigation.
 */

if ( ! function_exists( 'longevity_multipage_nav' ) ) :
function longevity_multipage_nav() {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'longevity' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'longevity' ) . ' </span>%',
		'separator'   => ', ',
	) );
}
endif;



