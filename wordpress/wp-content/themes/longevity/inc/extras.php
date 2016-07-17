<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Longevity
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 

 
function longevity_body_classes( $classes ) {
	if( ! esc_attr(get_theme_mod( 'show_preloader', 1 ) ) ) {
		$classes[] = 'loaded';
	}

	return $classes;
}
add_filter( 'body_class', 'longevity_body_classes' );




if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function longevity_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'longevity' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'longevity_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function longevity_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'longevity_render_title' );
endif;

/**
 * Move the More Link outside from the contents last summary paragraph tag.
 */
if ( ! function_exists( 'longevity_move_more_link' ) ) :
	function longevity_move_more_link($link) {
			$link = '<p>'.$link.'</p>';
			return $link;
		}
	add_filter('the_content_more_link', 'longevity_move_more_link');
endif;


/**
 * Gives the flexibility to change the excerpt length from the Theme Customizer to the users choice.
 * Thanks to http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 */ 
function longevity_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/**
 * Prevent page scroll after clicking read more to load the full post.
 */
if ( ! function_exists( 'longevity_remove_more_link_scroll' ) ) : 
	function longevity_remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
		}
	add_filter( 'the_content_more_link', 'longevity_remove_more_link_scroll' );
endif;	


/**
 * Special thanks to Justin Tadlock for this.
 *
 * http://justintadlock.com/archives/2012/08/27/post-formats-quote
 */

function longevity_my_quote_content( $content ) {

	/* Check if we're displaying a 'quote' post. */
	if ( has_post_format( 'quote' ) ) {

		/* Match any <blockquote> elements. */
		preg_match( '/<blockquote.*?>/', $content, $matches );

		/* If no <blockquote> elements were found, wrap the entire content in one. */
		if ( empty( $matches ) )
			$content = "<blockquote>{$content}</blockquote>";
	}

	return $content;
}
add_filter( 'the_content', 'longevity_my_quote_content' );



/**
 * Print the attached image with a link to the next attached image.
 * Maximum width is 1140 pixels for this theme.
 */
if ( ! function_exists( 'longevity_the_attached_image' ) ) :

function longevity_the_attached_image() {
	$post                = get_post();

	$attachment_size     = apply_filters( 'longevity_attachment_size', array( 1140, 1140 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Lets modify our archive labels depending on which page is being displayed.
 * 
 * @since longevity 1.0.0
 */

if( !function_exists( 'longevity_get_archive_title' ) ) :
function longevity_get_archive_title(){
	$title = '';
	global $wp_query;
	if ( is_category() ) {
		$title = sprintf( esc_html__('%s', 'longevity' ), '<span>' . single_cat_title( '', false ) . '</span>' );
	}
	elseif ( is_tag() ) {
		$title = sprintf( esc_html__('Articles with the Tag %s', 'longevity' ), '<span>' . single_tag_title( '', false ) . '</span>' );
	}
	elseif ( is_author() ) {
		the_post();
		$title = sprintf( esc_html__('Articles written by %s', 'longevity' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
		rewind_posts();
	}
	elseif ( is_day() ) {
		$title = sprintf( esc_html__('Articles for %s', 'longevity' ), '<span>' . get_the_date() . '</span>' );
	}
	elseif ( is_month() ) {
		$title = sprintf( esc_html__('Articles for %s', 'longevity' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
	}
	elseif ( is_year() ) {
		$title = sprintf( esc_html__('Archives for %s', 'longevity' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
	}
	elseif ( !empty($wp_query->query_vars['taxonomy']) ) {
		$value = get_query_var($wp_query->query_vars['taxonomy']);
		$term = get_term_by('slug',$value,$wp_query->query_vars['taxonomy']);
		$tax = get_taxonomy( $wp_query->query_vars['taxonomy'] );
		$title = sprintf( esc_html__('%s: %s', 'longevity' ), $tax->label, $term->name );
	}
	else {
		$title = esc_html__( 'Archives', 'longevity' );
	}
	return apply_filters('longevity_archive_title', $title);
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function longevity_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'longevity_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'longevity_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so longevity_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so longevity_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in longevity_categorized_blog.
 */
function longevity_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'longevity_categories' );
}
add_action( 'edit_category', 'longevity_category_transient_flusher' );
add_action( 'save_post',     'longevity_category_transient_flusher' );
