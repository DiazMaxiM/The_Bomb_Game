<?php
/**
 * Add inline styles to the head area
 * These styles represents options from the customizer
 * @package Longevity
 */
 
 // Dynamic styles
function longevity_inline_styles($custom) {


// Logo margin	
	$logo_margin = get_theme_mod( 'logo_margin', '5px 8px 0 0' );
	$custom .= "@media (min-width: 992px) {
         	.header-image, .logo-image { margin: " . esc_attr($logo_margin) . ";}}"."\n";
			
// Main nav margin top	
	$menu_margin = get_theme_mod( 'menu_margin', '5' );
	$custom .= "@media (min-width: 992px) {
         	.primary-navigation ul { margin-top: " . esc_attr($menu_margin) . "px;}}"."\n";

// Page background
	$background_color = get_theme_mod( 'background_color', '#494d51' );
	$custom .= "body {background-color:" . esc_attr($background_color) . "}"."\n";
	
// Page background size
	$page_bg_size = get_theme_mod( 'page_bg_size', 'auto' );
	$custom .= "body.custom-background {background-size:" . esc_attr($page_bg_size) . "}"."\n";		

		
/* 
 * This group of inline styles are for customizing your theme
 * with your own colour selections when the preset colours are disabled.
 * Please note that the curved graphic cannot be customized with colour, so you still need to 
 * use the preset colour selection for it.
 */
			
if( esc_attr(get_theme_mod( 'load_custom_colours', 0 ) ) ) :
	// Top social bar area
		$top_bar_bg = get_theme_mod( 'top_bar_bg', '#769cd0' );
		$top_bar_text = get_theme_mod( 'top_bar_text', '#ffffff' );
		$custom .= "#topbar, #topbar-social {color: " . esc_attr($top_bar_text) . "; background-color:" . esc_attr($top_bar_bg) . "}"."\n";		
	
	// top social  icon background
		$top_social_icon_bg = get_theme_mod( 'top_social_icon_bg', '#5477a7' );
		$top_social_icon = get_theme_mod( 'top_social_icon', '#ffffff' );
		$custom .= "#topbar .social a { color: " . esc_attr($top_social_icon) . "; background-color:" . esc_attr($top_social_icon_bg) . "}"."\n";	
		
	// social  hover colour
		$top_social_icon_hbg = get_theme_mod( 'top_social_icon_hbg', '#d5b886' );
		$top_social_hicon = get_theme_mod( 'top_social_hicon', '#ffffff' );
		$custom .= "#topbar .social a:hover { color: " . esc_attr($top_social_hicon) . "; background-color:" . esc_attr($top_social_icon_hbg) . "}"."\n";	
	
	// footer social  colour
		$footer_social_bg = get_theme_mod( 'footer_social_bg', '#686868' );
		$footer_social_icon = get_theme_mod( 'footer_social_icon', '#ffffff' );
		$custom .= "#footer-social a { color: " . esc_attr($footer_social_icon) . "; background-color:" . esc_attr($footer_social_bg) . "}"."\n";	
	// footer social  hover colour
		$footer_social_hbg = get_theme_mod( 'footer_social_hbg', '#afafaf' );
		$footer_social_hicon = get_theme_mod( 'footer_social_hicon', '#ffffff' );
		$custom .= "#footer-social a:hover { color: " . esc_attr($footer_social_hicon) . "; background-color:" . esc_attr($footer_social_hbg) . "}"."\n";	
	
	// Site header bg
		$header_bg = get_theme_mod( 'header_bg', '#ffffff' );
		$custom .= ".site-header { background-color:" . esc_attr($header_bg) . "}"."\n";	
			
	//Top level menu items color
		$mainmenu_colour = get_theme_mod( 'mainmenu_colour', '#222' );
		$custom .= ".primary-navigation li.home a, .primary-navigation li a { color:" . esc_attr($mainmenu_colour) . "}"."\n";
		
	//Top Level Hover and Active colour
		$mainmenu_hcolour = get_theme_mod( 'mainmenu_hcolour', '#dcc593' );
		$custom .= ".primary-navigation a:hover, 
		.primary-navigation .current-menu-item > a, 
		.primary-navigation .current-menu-item > a, 
		.primary-navigation .current-menu-ancestor > a { color:" . esc_attr($mainmenu_hcolour) . "}"."\n";
		
	//Sub menu background
		$submenu_bg = get_theme_mod( 'submenu_bg', '#fbfbfb' );
		$custom .= ".primary-navigation ul ul { background:" . esc_attr($submenu_bg) . "}"."\n";	
	
	//Sub menu border 
		$submenu_border = get_theme_mod( 'submenu_border', '#d9d9d9' );
		$custom .= ".primary-navigation ul ul { border-color:" . esc_attr($submenu_border) . "}"."\n";		
		
	//Sub menu items color
		$submenu_link = get_theme_mod( 'submenu_link', '#727679' );
		$custom .= ".primary-navigation li li > a { color:" . esc_attr($submenu_link) . "}"."\n";
			
	// Banner background
		$banner_bg = get_theme_mod( 'banner_bg', '#eaeaea' );
		$custom .= "#fp-banner, #page-banner, #no-banner { background-color:" . esc_attr($banner_bg) . "}"."\n";
	
	// Content text colour
		$content_hlinks = get_theme_mod( 'content_text', '#616161' );
		$custom .= "body { color:" . esc_attr($content_hlinks) . "}"."\n";
		
	// Content post entry colour
		$entry_title = get_theme_mod( 'entry_title', '#616161' );
		$custom .= ".entry-title a, .entry-title a:visited { color:" . esc_attr($entry_title) . "}"."\n";	
	
		
	// Content link colour
		$content_links = get_theme_mod( 'content_links', '#c69171' );
		$custom .= "a, a:visited, .entry-title a:hover { color:" . esc_attr($content_links) . "}"."\n";	
	
	// Content link hover colour
		$content_hlinks = get_theme_mod( 'content_hlinks', '#616161' );
		$custom .= "a:hover { color:" . esc_attr($content_hlinks) . "}"."\n";	
	
	// Sidebar text colour
		$sidebar_links = get_theme_mod( 'sidebar_text', '#9a9a9a' );
		$custom .= "#left-sidebar, #right-sidebar, #left-sidebar li a, #left-sidebar aside li a:visited, #right-sidebar li a, #right-sidebar aside li a:visited { color:" . esc_attr($sidebar_links) . "}"."\n";	
		
	// Sidebar link hover colour
		$sidebar_hlink = get_theme_mod( 'sidebar_hlink', '#c69171' );
		$custom .= "#left-sidebar a:hover, #right-sidebar a:hover { color:" . esc_attr($sidebar_hlink) . "}"."\n";
		
	//Site title
		$site_title = get_theme_mod( 'site_title_colour', '#333333' );
		$custom .= ".site-title a, .site-title a:hover { color:" . esc_attr($site_title) . "}"."\n";	
	
	//Site desc
		$site_desc = get_theme_mod( 'site_desc_colour', '#8c8c8c' );
		$custom .= ".site-description { color:" . esc_attr($site_desc) . "}"."\n";			
		
	// Bottom sidebars background 
		$bottom_sidebars_bg = get_theme_mod( 'bottom_sidebars_bg', '#c0a268' );
		$bottom_sidebars_text = get_theme_mod( 'bottom_sidebars_text', '#ffffff' );
		$custom .= "#bottom-group { color:" . esc_attr($bottom_sidebars_text) ."; background-color:" . esc_attr($bottom_sidebars_bg) . "}"."\n";	
		
	// Bottom sidebars link colour
		$bottom_sidebar_links = get_theme_mod( 'bottom_sidebar_links', '#ffffff' );
		$custom .= "#bottom-group a, #bottom-group a:visited { color:" . esc_attr($bottom_sidebar_links) . "}"."\n";	
		
	// Bottom sidebars link hover colour
		$bottom_sidebar_hlinks = get_theme_mod( 'bottom_sidebar_hlinks', '#ffffff' );
		$custom .= "#bottom-group a:hover { color:" . esc_attr($bottom_sidebar_hlinks) . "}"."\n";	
			
	// Bottom sidebars list border colour
		$bottom_sidebar_list_border = get_theme_mod( 'bottom_sidebar_list_border', '#d3bb8d' );
		$custom .= "#bottom-group li,#bottom-group .widget_nav_menu .sub-menu { border-color:" . esc_attr($bottom_sidebar_list_border) . "}"."\n";	
		
	// Footer 
		$footer_bg = get_theme_mod( 'footer_bg', '#000000' );
		$footer_text = get_theme_mod( 'footer_text', '#cccccc' );
		$custom .= ".site-footer { color:" . esc_attr($footer_text) ."; background-color:" . esc_attr($footer_bg) . "}"."\n";	
	
	// Footer link Colour
		$footer_links = get_theme_mod( 'footer_links', '#cccccc' );
		$custom .= ".site-footer a, .site-footer a:visited,#footer-menu li:after { color:" . esc_attr($footer_links) ."}"."\n";	
	// Footer link  hover Colour
		$footer_hlinks = get_theme_mod( 'footer_hlinks', '#ffffff' );
		$custom .= ".site-footer a:hover { color:" . esc_attr($footer_hlinks) ."}"."\n";	
	
	// Blog read more button
		$readmore_button_bg = get_theme_mod( 'readmore_button_bg', '#ffffff' );
		$readmore_button_border = get_theme_mod( 'readmore_button_border', '#d3d3d3' );
		$readmore_button_label = get_theme_mod( 'readmore_button_label', '#ffffff' );
		$custom .= "a.more-link { color:" . esc_attr($readmore_button_label) ."; background-color: " . esc_attr($readmore_button_bg) ."; border-color: " . esc_attr($readmore_button_border) ."}"."\n";
		
	// Blog read more button hover
		$readmore_button_hbg = get_theme_mod( 'readmore_button_hbg', '#ffffff' );
		$readmore_button_hborder = get_theme_mod( 'readmore_button_hborder', '#d3d3d3' );
		$readmore_button_hlabel = get_theme_mod( 'readmore_button_hlabel', '#000000' );
		$custom .= "a.more-link:hover { color:" . esc_attr($readmore_button_hlabel) ."; background-color: " . esc_attr($readmore_button_hbg) ."; border-color: " . esc_attr($readmore_button_hborder) ."}"."\n";
	
	// Button  colour
		$button_bg = get_theme_mod( 'button_bg', '#62686e' );
		$button_text = get_theme_mod( 'button_text', '#ffffff' );		
		$custom .= "button, input[type='button'], input[type='submit'], input[type='reset'], .btn, 
		button:visited, input[type='button']:visited, input[type='submit']:visited, input[type='reset']:visited, .btn:visited { color: " . esc_attr(		$button_text) . "; background-color:" . esc_attr($button_bg) . "}"."\n";				
		
	// Button hover colour
		$button_hbg = get_theme_mod( 'button_hbg', '#dfe3e6' );
		$button_htext = get_theme_mod( 'button_htext', '#ffffff' );
		$custom .= "button:hover, input[type='button']:hover, input[type='submit']:hover, input[type='reset']:hover, .btn:hover { color: " . esc_attr($button_htext) . "; background-color:" . esc_attr($button_hbg) . "}"."\n";	
	
	// Top search styling
		$top_search_bg = get_theme_mod( 'top_search_bg', '#5477A7' );
		$top_search_text = get_theme_mod( 'top_search_text', '#ffffff' );
		$custom .= "#top-search input[type=\"text\"] { color: " . esc_attr($top_search_text) . "; border-color: " . esc_attr($top_search_bg) . "; background-color:" . esc_attr($top_search_bg) . "}"."\n";	

	// Top search field placeholder webkit
		$top_search_text = get_theme_mod( 'top_search_text', '#5477A7' );
		$custom .= "#top-search ::-webkit-input-placeholder { color: " . esc_attr($top_search_text) . ";}"."\n";	
	// Top search field placeholder mozilla
		$top_search_text = get_theme_mod( 'top_search_text', '#5477A7' );
		$custom .= "#top-search ::-moz-placeholder { color: " . esc_attr($top_search_text) . ";}"."\n";	
	// Top search field placeholder ms
		$top_search_text = get_theme_mod( 'top_search_text', '#5477A7' );
		$custom .= "#top-search :-ms-input-placeholder { color: " . esc_attr($top_search_text) . ";}"."\n";

		
endif;
	
	//Output all the styles
	wp_add_inline_style( 'longevity-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'longevity_inline_styles' );	