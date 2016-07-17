<?php 
/**
 * Theme Widget positions
 *
 * @package Longevity 
 * 
 */

 
/**
 * Registers our main widget area and the front page widget areas.
 */
 
function longevity_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'longevity' ),
		'id' => 'blogright',
		'description' => esc_html__( 'Right sidebar for the blog', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'longevity' ),
		'id' => 'blogleft',
		'description' => esc_html__( 'Left sidebar for the blog', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'longevity' ),
		'id' => 'pageright',
		'description' => esc_html__( 'Right sidebar for pages', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'longevity' ),
		'id' => 'pageleft',
		'description' => esc_html__( 'Left sidebar for pages', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Top 1', 'longevity' ),
		'id' => 'top1',
		'description' => esc_html__( 'Top 1 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Top 2', 'longevity' ),
		'id' => 'top2',
		'description' => esc_html__( 'Top 2 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Top 3', 'longevity' ),
		'id' => 'top3',
		'description' => esc_html__( 'Top 3 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Top 4', 'longevity' ),
		'id' => 'top4',
		'description' => esc_html__( 'Top 4 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );			
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 1', 'longevity' ),
		'id' => 'contentbottom1',
		'description' => esc_html__( 'Content Bottom 1 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 2', 'longevity' ),
		'id' => 'contentbottom2',
		'description' => esc_html__( 'Content Bottom 2 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 3', 'longevity' ),
		'id' => 'contentbottom3',
		'description' => esc_html__( 'Content Bottom 3 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 4', 'longevity' ),
		'id' => 'contentbottom4',
		'description' => esc_html__( 'Content Bottom 4 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'longevity' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'longevity' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'longevity' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'longevity' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );		
	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'longevity' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'longevity' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Call to Action', 'longevity' ),
		'id' => 'cta',
		'description' => esc_html__( 'This is a call to action below the banner area', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'longevity' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'This is breadcrumbs position but can be used for other things', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'longevity' ),
		'id' => 'footer',
		'description' => esc_html__( 'This is a sidebar position that sits below the footer copyright', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Header Sidebar', 'longevity' ),
		'id' => 'header',
		'description' => esc_html__( 'This is a sidebar position that sits above the main menu that is meant for very small content such as posting a phone number or a donate button etc.', 'longevity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );	
		
}
add_action( 'widgets_init', 'longevity_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 * in the top group.
 */

function longevity_top() {
	$count = 0;
	if ( is_active_sidebar( 'top1' ) )
		$count++;
	if ( is_active_sidebar( 'top2' ) )
		$count++;
	if ( is_active_sidebar( 'top3' ) )
		$count++;		
	if ( is_active_sidebar( 'top4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-sm-6 col-md-6';
			break;
		case '3':
			$class = 'col-sm-6 col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}
/**
 * Count the number of widgets to enable resizable widgets
 * in the content bottom group.
 */

function longevity_contentbottom() {
	$count = 0;
	if ( is_active_sidebar( 'contentbottom1' ) )
		$count++;
	if ( is_active_sidebar( 'contentbottom2' ) )
		$count++;
	if ( is_active_sidebar( 'contentbottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'contentbottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-sm-6 col-md-6';
			break;
		case '3':
			$class = 'col-sm-6 col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Count the number of widgets to enable resizable widgets
 * in the bottom group.
 */

function longevity_bottom() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-lg-12';
			break;
		case '2':
			$class = 'col-sm-6 col-md-6';
			break;
		case '3':
			$class = 'col-sm-6 col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}
