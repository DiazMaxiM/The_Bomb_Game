<?php
/**
 * Longevity Theme Customizer
 *
 * @package Longevity
 */
 
  /**
 * We will add our theme info to the customizer as well as the Appearance admin menu
 */
 function longevity_customizer_registers() {
	
	wp_enqueue_script( 'longevity_customizer_script', get_template_directory_uri() . '/js/longevity_customizer.js', array("jquery"), '1.0', true  );
	wp_localize_script( 'longevity_customizer_script', 'longevityCustomizerObject', array(
		'setup' => __( 'Setup Tutorials', 'longevity' ),
		'support' => __( 'Theme Support', 'longevity' ),
		'review' => __( 'Please Rate Longevity', 'longevity' ),		
		'pro' => __( 'Get the Pro Version', 'longevity' ),
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'longevity_customizer_registers' );
 

function longevity_customize_register( $wp_customize ) {
	
// Lets make some changes to the default Wordpress sections and controls

	// lets remove the header text setting
  	$wp_customize->remove_control('display_header_text');
	// lets remove the header text color setting
  	$wp_customize->remove_control('header_textcolor');
	// lets remove the default background color setting so we can reposition it
	$wp_customize->remove_control('background_color');

// Setting group to show the site title  
  	$wp_customize->add_setting( 'show_site_title',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox'
    ) );  
  $wp_customize->add_control( 'show_site_title', array(
    'type'     => 'checkbox',
    'priority' => 1,
    'label'    => esc_html__( 'Show Site Title', 'longevity' ),
    'section'  => 'title_tagline',
  ) );

// Setting group to show the tagline  
  $wp_customize->add_setting( 'show_tagline',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox'
    ) );  
  $wp_customize->add_control( 'show_tagline', array(
    'type'     => 'checkbox',
    'priority' => 2,
    'label'    => esc_html__( 'Show Tagline', 'longevity' ),
    'section'  => 'title_tagline',
  ) );
  
// Setting group to show the tagline 
	$wp_customize->add_setting('logo_upload[logo]', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option',
		'sanitize_callback' => 'esc_url_raw',
    ));
	
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'site_logo', array(
        'label'    => esc_html__('Your Logo', 'longevity'),
        'section'  => 'title_tagline',
        'settings' => 'logo_upload[logo]',
		'priority' => 3,
    )));
			
// Setting group for the logo margin 
	$wp_customize->add_setting( 'logo_margin', array(
		'default'        => '5px 8px 0 0',
		'sanitize_callback' => 'longevity_sanitize_text',
	) );
	$wp_customize->add_control( 'logo_margin', array(
		'settings' => 'logo_margin',
		'label'    => esc_html__( 'Logo Margin Space', 'longevity' ),
		'section'  => 'title_tagline',		
		'type'     => 'text',
		'priority' => 4,
	) );
	
// Setting for site title colour
	$wp_customize->add_setting( 'site_title_colour', array(
		'default'        => '#333333',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_colour', array(
		'label'   => esc_html__( 'Site Title Colour', 'longevity' ),
		'section' => 'title_tagline',
		'settings'   => 'site_title_colour',
		'priority' => 5,			
	) ) );
// Setting for site description colour
	$wp_customize->add_setting( 'site_desc_colour', array(
		'default'        => '#8c8c8c',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_desc_colour', array(
		'label'   => esc_html__( 'Site Description Colour', 'longevity' ),
		'section' => 'title_tagline',
		'settings'   => 'site_desc_colour',
		'priority' => 6,			
	) ) );	

	
		
/*
 * Site Options Section
 */    
$wp_customize->add_section( 'site_options', array(
	'title' => esc_html__( 'Site Options', 'longevity' ),
	'priority'       => 30,
	) ); 

// Setting group main page header style
  $wp_customize->add_setting( 'header_style', array(
      'default' => 'default',
      'sanitize_callback' => 'longevity_sanitize_header_style',
    ) );  
	$wp_customize->add_control( 'header_style', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Header Style', 'longevity' ),
		  'section' => 'site_options',
		  'priority' => 1,
		  'choices' => array(
			  'default' 		=> esc_html__( 'Logo to the Left and Menu Right', 'longevity' ),
			  'centered' 	=> esc_html__( 'Centered Logo and Menu Below', 'longevity' ),
	) ) );
	
// Setting group for page width 
  $wp_customize->add_setting( 'page_width', array(
      'default' => 'fullwidth',
      'sanitize_callback' => 'longevity_sanitize_page_width',
    ) );  
	$wp_customize->add_control( 'page_width', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Page Width', 'longevity' ),
		  'section' => 'site_options',
		  'priority' => 1,
		  'choices' => array(
			  'fullwidth' 	=> esc_html__( 'Full Width', 'longevity' ),
			  'boxed1920' => esc_html__( 'Boxed 1920px Width', 'longevity' ),
			  'boxed1600' => esc_html__( 'Boxed 1600px Width', 'longevity' ),
			  'boxed1400' => esc_html__( 'Boxed 1400px Width', 'longevity' ),
			  'boxed1200' => esc_html__( 'Boxed 1200px Width', 'longevity' ),
	) ) );
// Setting group to enable font awesome 
  $wp_customize->add_setting( 'load_fontawesome',	array(
 		'default' => 1,
		'sanitize_callback' => 'longevity_sanitize_checkbox',
	) );  
  $wp_customize->add_control( 'load_fontawesome', array(
		'type'     => 'checkbox',
		'priority' => 2,
		'label'    => esc_html__( 'Load Font Awesome', 'longevity' ),
		'description' => esc_html__( 'Load Font Awesome if not you are not using a plugin for it.', 'longevity' ),
		'section'  => 'site_options',
  	) );
 // Setting group to show the banner curve  on the front page
  	$wp_customize->add_setting( 'show_fpcurve',  array(
		'default' => 1,
		'sanitize_callback' => 'longevity_sanitize_checkbox'
    ) );  
  $wp_customize->add_control( 'show_fpcurve', array(
		'type'     => 'checkbox',
		'priority' => 3,
		'label'    => esc_html__( 'Show Curve on Front Page', 'longevity' ),
		'description' => esc_html__( 'Show or hide the curved banner graphic on the front page.', 'longevity' ),
		'section'  => 'site_options',
  	) ); 
		
 // Setting group to show the banner curve  
  	$wp_customize->add_setting( 'show_curve',  array(
		'default' => 1,
		'sanitize_callback' => 'longevity_sanitize_checkbox'
    ) );  
  $wp_customize->add_control( 'show_curve', array(
		'type'     => 'checkbox',
		'priority' => 4,
		'label'    => esc_html__( 'Show Curve on Pages', 'longevity' ),
		'description' => esc_html__( 'Show or hide the curved banner graphic on inner pages.', 'longevity' ),
		'section'  => 'site_options',
  	) ); 
	
// Setting group to choose curve size  
  $wp_customize->add_setting( 'fplg_curve',	array(
  		'default' => 1,
		'sanitize_callback' => 'longevity_sanitize_checkbox'
	) );  
  $wp_customize->add_control( 'fplg_curve', array(
		'type'     => 'checkbox',
		'priority' => 5,
		'label'    => esc_html__( 'Use Large Curve on Front Page', 'longevity' ),
		'description' => esc_html__( 'Use the large banner curve on the front page when a banner is published, otherwise use the smaller curve.', 'longevity' ),
		'section'  => 'site_options',
  	) );
	
// Setting group to choose curve size  
  $wp_customize->add_setting( 'lg_curve',	array(
  		'default' => 0,
		'sanitize_callback' => 'longevity_sanitize_checkbox'
	) );  
  $wp_customize->add_control( 'lg_curve', array(
		'type'     => 'checkbox',
		'priority' => 6,
		'label'    => esc_html__( 'Use Large Curve on Pages', 'longevity' ),
		'description' => esc_html__( 'Use the large banner curve on ALL pages if each one has a banner published, otherwise use the smaller curve.', 'longevity' ),
		'section'  => 'site_options',
  	) );


// Setting group the top search 
	$wp_customize->add_setting( 'show_top_search', array(
		'default'        => 0,
		'sanitize_callback' => 'longevity_sanitize_text',
	) );
	$wp_customize->add_control( 'show_top_search', array(
		'settings' => 'show_top_search',
		'type'     => 'checkbox',
		'label'    => esc_html__( 'Show the Top Search', 'longevity' ),
		'description' =>  esc_html__( 'This will show a search field at the top of the page and to the right of your social bar menu.', 'longevity' ),
		'section'  => 'site_options',		
		'priority' => 7,
	) );
	
// Setting group for the preloader 
	$wp_customize->add_setting( 'show_preloader', array(
		'default' => 1,
		'sanitize_callback' => 'longevity_sanitize_checkbox',
	) );  
	$wp_customize->add_control( 'show_preloader', array(
		'type'     => 'checkbox',
		'priority' => 8,
		'label'    => esc_html__( 'Show the Preloader', 'longevity' ),
		'description' =>  esc_html__( 'Show the animated preloader graphic while the site loads up.', 'longevity' ),
		'section'  => 'site_options',
	) );   

	
// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => esc_html__( 'Your Name', 'longevity'),
		'sanitize_callback' => 'longevity_sanitize_text',
	) );
	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => esc_html__( 'Your Copyright Name', 'longevity' ),
		'section'  => 'site_options',		
		'type'     => 'text',
		'priority' => 9,
	) );

// Setting group for the main menu top margin 
	$wp_customize->add_setting( 'menu_margin', array(
		'default'        => '5',
		'sanitize_callback' => 'longevity_sanitize_text',
	) );
	$wp_customize->add_control( 'menu_margin', array(
		'settings' => 'menu_margin',
		'label'    => esc_html__( 'Main Menu Top Margin', 'longevity' ),
		'section'  => 'site_options',		
		'type'     => 'text',
		'priority' => 10,
	) );
	
/*
 * Blog Options
 */  
  $wp_customize->add_section( 'blog_options',
    array(
      'title' => esc_html__( 'Blog Options', 'longevity' ),
	  'priority' => 32,
    )
  ); 
 

// Setting group for blog style  
  $wp_customize->add_setting( 'blog_style', array(
      'default' => 'blog-lg-right',
      'sanitize_callback' => 'longevity_sanitize_blog_style',
    ) );  
	$wp_customize->add_control( 'blog_style', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Blog Style', 'longevity' ),
		  'section' => 'blog_options',
		  'priority' => 2,
		  'choices' => array(			  
			  'blog-lg-right' 	=> esc_html__( 'Large Featured Image Right Sidebar', 'longevity' ),
			  'blog-lg-left' 		=> esc_html__( 'Large Featured Image Left Sidebar', 'longevity' ),
			  'blog-sm-right' 	=> esc_html__( 'Small Featured Image Right Sidebar', 'longevity' ),
			  'blog-sm-left' 	=> esc_html__( 'Small Featured Image Left Sidebar', 'longevity' ),
	) ) );

// Setting group for blog style  
  $wp_customize->add_setting( 'single_style', array(
      'default' => 'single-right',
      'sanitize_callback' => 'longevity_sanitize_single_style',
    ) );  
	$wp_customize->add_control( 'single_style', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Single (full) Post Style', 'longevity' ),
		  'section' => 'blog_options',
		  'priority' => 3,
		  'choices' => array(			  
			  'single-right' => esc_html__( 'Single with Right Sidebar', 'longevity' ),
			  'single-left' 	=> esc_html__( 'Single with Left Sidebar', 'longevity' ),
			  'single' 		=> esc_html__( 'Single without Left &amp; Right Sidebar', 'longevity' ),
	) ) );

// Setting for content or excerpt
	$wp_customize->add_setting( 'excerpt_content', array(
		'default' 				=> 'excerpt',
		'sanitize_callback' 	=> 'longevity_sanitize_excerpt',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content', array(
    'label'   	=> esc_html__( 'Content or Excerpt', 'longevity' ),
    'section' => 'blog_options',
    'type'    	=> 'radio',
        'choices' 		=> array(
            'content' 	=> esc_html__( 'Content', 'longevity' ),
            'excerpt' 	=> esc_html__( 'Excerpt', 'longevity' ),	
        ),
	'priority'       => 4,
    ));

// Setting for content or excerpt for the image post format
	$wp_customize->add_setting( 'excerpt_content_image', array(
		'default' => 'excerpt',
		'sanitize_callback' => 'longevity_sanitize_excerpt_image',
	) );
// Control for Content or excerpt
	$wp_customize->add_control( 'excerpt_content_image', array(
    'label'   => esc_html__( 'Content or Excerpt for Image Post Format', 'longevity' ),
    'section' => 'blog_options',
    'type'    => 'radio',
        'choices' => array(
            'content' => esc_html__( 'Content', 'longevity' ),
            'excerpt' => esc_html__( 'Excerpt', 'longevity' ),	
        ),
	'priority'       => 5,
    ));
// Setting group for a excerpt
	$wp_customize->add_setting( 'excerpt_limit', array(
		'default'        => '50',
		'sanitize_callback' => 'longevity_sanitize_number',
	) );
	$wp_customize->add_control( 'excerpt_limit', array(
		'settings' => 'excerpt_limit',
		'label'    => esc_html__( 'Excerpt Length', 'longevity' ),
		'section'  => 'blog_options',
		'type'     => 'text',
		'priority'   => 6,
	) );
		  
// Setting group to show the edit links  
  $wp_customize->add_setting( 'show_edit',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    ) );  
  $wp_customize->add_control( 'show_edit', array(
    'type'     => 'checkbox',
    'priority' => 7,
    'label'    => esc_html__( 'Show Edit Link', 'longevity' ),
	'description' => esc_html__( 'Show the front-end edit links.', 'longevity' ),
    'section'  => 'blog_options',
  ) );
  
// Setting group to show the categories  
  $wp_customize->add_setting( 'show_categories',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    ) );  
  $wp_customize->add_control( 'show_categories', array(
    'type'     => 'checkbox',
    'priority' => 8,
    'label'    => esc_html__( 'Show Categories in Summary', 'longevity' ),
	'description' => esc_html__( 'Show the categories list on the post summaries.', 'longevity' ),
    'section'  => 'blog_options',
  ) );
  
// Setting group to show the categories  
  $wp_customize->add_setting( 'show_single_categories',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_single_categories', array(
    'type'     => 'checkbox',
    'priority' => 9,
    'label'    => esc_html__( 'Show Categories on Full Post', 'longevity' ),
	'description' => esc_html__( 'Show the categories list on the full post view.', 'longevity' ),
    'section'  => 'blog_options',
  ) );  
  
// Setting group to show the date  
  $wp_customize->add_setting( 'show_posted_date',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_posted_date', array(
    'type'     => 'checkbox',
    'priority' => 10,
    'label'    => esc_html__( 'Show Posted Date', 'longevity' ),
	'description' => esc_html__( 'Show posted date.', 'longevity' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show tags  
  $wp_customize->add_setting( 'show_tags_list',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_tags_list', array(
    'type'     => 'checkbox',
    'priority' => 11,
    'label'    => esc_html__( 'Show Tags', 'longevity' ),
	'description' => esc_html__( 'Show tags list on posts.', 'longevity' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show share buttons  
  $wp_customize->add_setting( 'show_single_thumbnail',
    array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_single_thumbnail', array(
    'type'     => 'checkbox',
    'priority' => 12,
    'label'    => esc_html__( 'Show Featured Image on Full Post', 'longevity' ),
	'description' => esc_html__( 'Show or hide the featured image on the full post view.', 'longevity' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show published by  
  $wp_customize->add_setting( 'show_post_author', array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    ) ); 
  $wp_customize->add_control( 'show_post_author', array(
    'type'     => 'checkbox',
    'priority' => 13,
    'label'    => esc_html__( 'Show Post Author', 'longevity' ),
	'description' => esc_html__( 'Show the post author.', 'longevity' ),
    'section'  => 'blog_options',
  ) );
 
 // Setting group to show comments link 
  $wp_customize->add_setting( 'show_comments_link', array(
      'default' => 1,
      'sanitize_callback' => 'longevity_sanitize_checkbox',
    ) ); 
  $wp_customize->add_control( 'show_comments_link', array(
    'type'     => 'checkbox',
    'priority' => 14,
    'label'    => esc_html__( 'Show Comments Count', 'longevity' ),
	'description' => esc_html__( 'Show the comments count and link on the post summaries.', 'longevity' ),
    'section'  => 'blog_options',
  ) );

  	
/*
 * Colours Section
 */
 
 // Setting group for colour scheme 
$wp_customize->add_setting(  'colour_scheme',  array(
        	'default' => 'default',
		'sanitize_callback' => 'longevity_sanitize_colour_scheme',
    ) ) ;
 
$wp_customize->add_control( 'colour_scheme',  array(
	'type' => 'select',
	'label' => esc_html__( 'Colour Scheme', 'longevity' ),
	'section' => 'colors',
	'priority' => 1,
	'choices' => array(
		'default'      	=> esc_html__( 'Default', 'longevity' ),
		'grey'          		=> esc_html__( 'Grey', 'longevity' ),
		'burgandy' 	=> esc_html__( 'Burgandy', 'longevity' ),
		'green'       		=> esc_html__( 'Green', 'longevity' ),
		'yellow'       	=> esc_html__( 'Yellow', 'longevity' ),
		'white'       	=> esc_html__( 'White', 'longevity' ),
		'taupe'        	=> esc_html__( 'Taupe', 'longevity' ),
		'aqua'          	=> esc_html__( 'Aqua', 'longevity' ),
		'orange'      	=> esc_html__( 'Orange', 'longevity' ),
        ) ) ) ;
 
 // Setting group to enable colour scheme stylesheets
  $wp_customize->add_setting( 'add_colourscheme_css',	array(
 		'default' => 1,
		'sanitize_callback' => 'longevity_sanitize_checkbox',
	) );  
  $wp_customize->add_control( 'add_colourscheme_css', array(
		'type'     => 'checkbox',
		'priority' => 2,
		'label'    => esc_html__( 'Load Colour Scheme Stylesheet', 'longevity' ),
		'description' => esc_html__( 'Check this box to use the preset colours. If you decide to use your own custom colours below, you still need to choose the curved banner graphic of colour.', 'longevity' ),
		'section'  => 'colors',
  	) );
	
// Setting group to enable your custom colours 
  $wp_customize->add_setting( 'load_custom_colours',	array(
 		'default' => 0,
		'sanitize_callback' => 'longevity_sanitize_checkbox',
	) );  
  $wp_customize->add_control( 'load_custom_colours', array(
		'type'     => 'checkbox',
		'priority' => 3,
		'label'    => esc_html__( 'Load Custom Colour Styles', 'longevity' ),
		'description' => esc_html__( 'Check this box if you want to override the preset colour options and then use the colour selectors below to customize your own. Please note you cannot customize the curved graphic colour.', 'longevity' ),
		'section'  => 'colors',
  	) );		
// Setting for the top social bar background
	$wp_customize->add_setting( 'top_bar_bg', array(
		'default'        => '#769cd0',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bg', array(
		'label'   => esc_html__( 'Top Social Bar Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'top_bar_bg',
		'priority' => 3,			
	) ) );	

// Setting for the top social icon
	$wp_customize->add_setting( 'top_social_icon_bg', array(
		'default'        => '#5477a7',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_social_icon_bg', array(
		'label'   => esc_html__( 'Top Social Icon Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'top_social_icon_bg',
		'priority' => 5,			
	) ) );	
// Setting for the top social icon
	$wp_customize->add_setting( 'top_social_icon', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_social_icon', array(
		'label'   => esc_html__( 'Top Social Icon', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'top_social_icon',
		'priority' => 6,			
	) ) );		
	
// Setting for the top social icon hover
	$wp_customize->add_setting( 'top_social_icon_hbg', array(
		'default'        => '#d5b886',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_social_icon_hbg', array(
		'label'   => esc_html__( 'Top Social Icon Background Hover', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'top_social_icon_hbg',
		'priority' => 7,			
	) ) );	
// Setting for the top social icon hover
	$wp_customize->add_setting( 'top_social_hicon', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_social_hicon', array(
		'label'   => esc_html__( 'Top Social Icon Hover', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'top_social_hicon',
		'priority' => 8,			
	) ) );			
	
// Setting for the footerp social icon
	$wp_customize->add_setting( 'footer_social_bg', array(
		'default'        => '#686868',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_bg', array(
		'label'   => esc_html__( 'Footer Social Icon Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_social_bg',
		'priority' => 9,			
	) ) );		
	
// Setting for the footer social icon
	$wp_customize->add_setting( 'footer_social_icon', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_icon', array(
		'label'   => esc_html__( 'Footer Social Icon', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_social_icon',
		'priority' => 10,			
	) ) );		
	
	// Setting for the footer social icon hover
	$wp_customize->add_setting( 'footer_social_hbg', array(
		'default'        => '#afafaf',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_hbg', array(
		'label'   => esc_html__( 'Footer Social Icon Background Hover', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_social_hbg',
		'priority' => 11,			
	) ) );	
// Setting for the footer social icon hover
	$wp_customize->add_setting( 'footer_social_hicon', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_social_hicon', array(
		'label'   => esc_html__( 'Footer Social Icon Hover', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_social_hicon',
		'priority' => 12,			
	) ) );		
	
// Setting for the header background
	$wp_customize->add_setting( 'header_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg', array(
		'label'   => esc_html__( 'Header Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'header_bg',
		'priority' => 13,			
	) ) );	
	
// Setting for the top menu colour
	$wp_customize->add_setting( 'mainmenu_colour', array(
		'default'        => '#222222',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mainmenu_colour', array(
		'label'   => esc_html__( 'Main Menu Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'mainmenu_colour',
		'priority' => 14,			
	) ) );		
	
// Setting for the top menu hover active colour
	$wp_customize->add_setting( 'mainmenu_hcolour', array(
		'default'        => '#dcc593',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mainmenu_hcolour', array(
		'label'   => esc_html__( 'Main Menu Active/Hover Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'mainmenu_hcolour',
		'priority' => 15,			
	) ) );	
	
// Setting for the top menu submenu background
	$wp_customize->add_setting( 'submenu_bg', array(
		'default'        => '#fbfbfb',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg', array(
		'label'   => esc_html__( 'Submenu Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'submenu_bg',
		'priority' => 16,			
	) ) );		
	
// Setting for the top menu submenu border
	$wp_customize->add_setting( 'submenu_border', array(
		'default'        => '#d9d9d9',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_border', array(
		'label'   => esc_html__( 'Submenu Border', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'submenu_border',
		'priority' => 17,			
	) ) );		

// Setting for the top menu submenu border
	$wp_customize->add_setting( 'submenu_link', array(
		'default'        => '#727679',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_link', array(
		'label'   => esc_html__( 'Submenu Link', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'submenu_link',
		'priority' => 18,			
	) ) );	
	
// Setting for the banner background
	$wp_customize->add_setting( 'banner_bg', array(
		'default'        => '#eaeaea',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'banner_bg', array(
		'label'   => esc_html__( 'Banner Backround', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'banner_bg',
		'priority' => 19,			
	) ) );	

// Setting for entry titles
	$wp_customize->add_setting( 'entry_title', array(
		'default'        => '#616161',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'entry_title', array(
		'label'   => esc_html__( 'Post Entry Title Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'entry_title',
		'priority' => 20,			
	) ) );	
// Setting for content area links hover
	$wp_customize->add_setting( 'content_text', array(
		'default'        => '#616161',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_text', array(
		'label'   => esc_html__( 'Content Area Text Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'content_text',
		'priority' => 20,			
	) ) );		
	
// Setting for content area links
	$wp_customize->add_setting( 'content_links', array(
		'default'        => '#c69171',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_links', array(
		'label'   => esc_html__( 'Content Area Link Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'content_links',
		'priority' => 21,			
	) ) );	

// Setting for content area links hover
	$wp_customize->add_setting( 'content_hlinks', array(
		'default'        => '#616161',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_hlinks', array(
		'label'   => esc_html__( 'Content Area Link Hover Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'content_hlinks',
		'priority' => 22,			
	) ) );		

// Setting for sidebar text
	$wp_customize->add_setting( 'sidebar_text', array(
		'default'        => '#616161',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text', array(
		'label'   => esc_html__( 'Left &amp; Right Sidebar Text Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'sidebar_text',
		'priority' => 23,			
	) ) );		
	
// Setting for sidebar link hover colour
	$wp_customize->add_setting( 'sidebar_hlink', array(
		'default'        => '#c69171',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_hlink', array(
		'label'   => esc_html__( 'Left &amp; Right Sidebar Link Hover Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'sidebar_hlink',
		'priority' => 24,			
	) ) );	
	
// Setting for the bottom sidebars background 
	$wp_customize->add_setting( 'bottom_sidebars_bg', array(
		'default'        => '#c0a268',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_sidebars_bg', array(
		'label'   => esc_html__( 'Bottom Sidebar Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'bottom_sidebars_bg',
		'priority' => 25,			
	) ) );		
	
// Setting for the bottom sidebars text 
	$wp_customize->add_setting( 'bottom_sidebars_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_sidebars_text', array(
		'label'   => esc_html__( 'Bottom Sidebar Text', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'bottom_sidebars_text',
		'priority' => 26,			
	) ) );	
	
// Setting for the bottom sidebars link colour 
	$wp_customize->add_setting( 'bottom_sidebar_links', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_sidebar_links', array(
		'label'   => esc_html__( 'Bottom Sidebar Link Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'bottom_sidebar_links',
		'priority' => 27,			
	) ) );	
	
// Setting for the bottom sidebars link hover colour 
	$wp_customize->add_setting( 'bottom_sidebar_hlinks', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_sidebar_hlinks', array(
		'label'   => esc_html__( 'Bottom Sidebar Link Hover Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'bottom_sidebar_hlinks',
		'priority' => 28,			
	) ) );		
	
	
// Setting for the bottom sidebars list border colour
	$wp_customize->add_setting( 'bottom_sidebar_list_border', array(
		'default'        => '#d3bb8d',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_sidebar_list_border', array(
		'label'   => esc_html__( 'Bottom Sidebar List Border Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'bottom_sidebar_list_border',
		'priority' => 29,			
	) ) );		
	
	
	
// Setting for the footer background
	$wp_customize->add_setting( 'footer_bg', array(
		'default'        => '#000000',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg', array(
		'label'   => esc_html__( 'Footer Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_bg',
		'priority' => 30,			
	) ) );		
	
// Setting for the footer text
	$wp_customize->add_setting( 'footer_text', array(
		'default'        => '#cccccc',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'   => esc_html__( 'Footer Text Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_text',
		'priority' => 31,			
	) ) );		
	
// Setting for the footer links
	$wp_customize->add_setting( 'footer_links', array(
		'default'        => '#cccccc',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_links', array(
		'label'   => esc_html__( 'Footer Link Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_links',
		'priority' => 32,			
	) ) );	
	
// Setting for the footer link hover colour
	$wp_customize->add_setting( 'footer_hlinks', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_hlinks', array(
		'label'   => esc_html__( 'Footer Link Hover Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'footer_hlinks',
		'priority' => 33,			
	) ) );		
	
// Setting for the read more colour
	$wp_customize->add_setting( 'readmore_button_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_bg', array(
		'label'   => esc_html__( 'Read More Button Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'readmore_button_bg',
		'priority' => 34,			
	) ) );		
	
// Setting for the read more border colour
	$wp_customize->add_setting( 'readmore_button_border', array(
		'default'        => '#d3d3d3',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_border', array(
		'label'   => esc_html__( 'Read More Button Border', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'readmore_button_border',
		'priority' => 35,			
	) ) );	
	
// Setting for the read more label colour
	$wp_customize->add_setting( 'readmore_button_label', array(
		'default'        => '#888888',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_label', array(
		'label'   => esc_html__( 'Read More Button Label', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'readmore_button_label',
		'priority' => 36,			
	) ) );
	
// Setting for the read more colour
	$wp_customize->add_setting( 'readmore_button_hbg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_hbg', array(
		'label'   => esc_html__( 'Read More Button Hover Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'readmore_button_hbg',
		'priority' => 37,			
	) ) );		
	
// Setting for the read more border colour
	$wp_customize->add_setting( 'readmore_button_hborder', array(
		'default'        => '#d3d3d3',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_hborder', array(
		'label'   => esc_html__( 'Read More Button Hover Border', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'readmore_button_hborder',
		'priority' => 38,			
	) ) );	
	
// Setting for the read more label colour
	$wp_customize->add_setting( 'readmore_button_hlabel', array(
		'default'        => '#000000',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readmore_button_hlabel', array(
		'label'   => esc_html__( 'Read More Button Hover Label', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'readmore_button_hlabel',
		'priority' => 39,			
	) ) );	

// Setting for button backgrounds
	$wp_customize->add_setting( 'button_bg', array(
		'default'        => '#838588',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bg', array(
		'label'   => esc_html__( 'Button Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'button_bg',
		'priority' => 40,			
	) ) );	
// Setting for button label
	$wp_customize->add_setting( 'button_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text', array(
		'label'   => esc_html__( 'Button Text', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'button_text',
		'priority' => 41,			
	) ) );		

// Setting for button background hover
	$wp_customize->add_setting( 'button_hbg', array(
		'default'        => '#6a6c6f',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_hbg', array(
		'label'   => esc_html__( 'Button Background Hover', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'button_hbg',
		'priority' => 42,			
	) ) );	
// Setting for button label hover
	$wp_customize->add_setting( 'button_htext', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_htext', array(
		'label'   => esc_html__( 'Button Text on Hover', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'button_htext',
		'priority' => 43,			
	) ) );
	
// Setting for top search background
	$wp_customize->add_setting( 'top_search_bg', array(
		'default'        => '#5477A7',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_search_bg', array(
		'label'   => esc_html__( 'Top Search Background', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'top_search_bg',
		'priority' => 44,			
	) ) );	
// Setting for top search text
	$wp_customize->add_setting( 'top_search_text', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_search_text', array(
		'label'   => esc_html__( 'Top Search Text Colour', 'longevity' ),
		'section' => 'colors',
		'settings'   => 'top_search_text',
		'priority' => 45,			
	) ) );
			
/*
 * Lets add our page background to the 
 * background image tab of our customizer.
 */ 	
// Setting for the page background
	$wp_customize->add_setting( 'background_color', array(
		'default'        => '#494d51',
		'sanitize_callback' => 'longevity_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'   => esc_html__( 'Page Background Colour', 'longevity' ),
		'section' => 'background_image',
		'settings'   => 'background_color',
		'priority' => 3,			
	) ) );
	
// Setting group for the page header bg size
	$wp_customize->add_setting( 'page_bg_size', array(
		'default' => 'auto',
		'sanitize_callback' => 'longevity_sanitize_background_size',
	) );  
	$wp_customize->add_control( 'page_bg_size', array(
		  'type' => 'radio',
		  'label' => esc_html__( 'Page Background size', 'longevity' ),
		  'section' => 'background_image',
		  'priority' => 12,
		  'choices' => array(
			  'auto' => esc_html__( 'Auto', 'longevity' ),
			  'cover' => esc_html__( 'Cover', 'longevity' ),
			  'contain' => esc_html__( 'Contain', 'longevity' ),
	) ) );	

}
add_action( 'customize_register', 'longevity_customize_register' );




/**
 * This is our theme sanitization settings.
 * Remember to sanitize any additional theme settings you add to the customizer.
 */

// adds sanitization callback function for the header style : radio
	function longevity_sanitize_header_style( $input ) {
		$valid = array(
			  'default' => esc_html__( 'Logo to the Left and Menu Right', 'longevity' ),
			  'centered' => esc_html__( 'Centered Logo and Menu Below', 'longevity' ),		
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}  
	
// adds sanitization callback function for the page width : radio
	function longevity_sanitize_page_width( $input ) {
		$valid = array(
			  'fullwidth' 	=> esc_html__( 'Full Width', 'longevity' ),
			  'boxed1920' => esc_html__( 'Boxed 1920px Width', 'longevity' ),
			  'boxed1600' => esc_html__( 'Boxed 1600px Width', 'longevity' ),
			  'boxed1400' => esc_html__( 'Boxed 1400px Width', 'longevity' ),
			  'boxed1200' => esc_html__( 'Boxed 1200px Width', 'longevity' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
	
// adds sanitization callback function for the blog style : radio
	function longevity_sanitize_blog_style( $input ) {
		$valid = array(
			  'blog-lg-right' 	=> esc_html__( 'Large Featured Image Right Sidebar', 'longevity' ),
			  'blog-lg-left' 		=> esc_html__( 'Large Featured Image Left Sidebar', 'longevity' ),
			  'blog-sm-right' 	=> esc_html__( 'Small Featured Image Right Sidebar', 'longevity' ),
			  'blog-sm-left' 	=> esc_html__( 'Small Featured Image Left Sidebar', 'longevity' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
	
// adds sanitization callback function for the single style : radio
	function longevity_sanitize_single_style( $input ) {
		$valid = array(
			  'single-right' => esc_html__( 'Single with Right Sidebar', 'longevity' ),
			  'single-left' => esc_html__( 'Single with Left Sidebar', 'longevity' ),
			  'single' => esc_html__( 'Single without Left &amp; Right Sidebar', 'longevity' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	
	
// adds sanitization callback function for the excerpt : radio
	function longevity_sanitize_excerpt( $input ) {
		$valid = array(
			'content' => esc_html__( 'Content', 'longevity' ),
			'excerpt' => esc_html__( 'Excerpt', 'longevity' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	
// adds sanitization callback function for the excerpt on the image post format : radio
	function longevity_sanitize_excerpt_image( $input ) {
		$valid = array(
			'content' => esc_html__( 'Content', 'longevity' ),
			'excerpt' => esc_html__( 'Excerpt', 'longevity' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}	
		
// adds sanitization callback function for background size
if ( ! function_exists( 'longevity_sanitize_background_size' ) ) :
  function longevity_sanitize_background_size( $value ) {
    $background_sizes = array( 'auto', 'cover', 'contain' );
    if ( ! in_array( $value, $background_sizes ) ) {
      $value = 'cover';
    }

    return $value;
  }
endif;

// adds sanitization callback function : textarea
if ( ! function_exists( 'longevity_sanitize_textarea' ) ) :
  function longevity_sanitize_textarea( $value ) {
    if ( !current_user_can('unfiltered_html') )
			$value  = stripslashes( wp_filter_post_kses( addslashes( $value ) ) ); // wp_filter_post_kses() expects slashed

    return $value;
  }
endif;

// adds sanitization callback function for numeric data : number
if ( ! function_exists( 'longevity_sanitize_number' ) ) :
	function longevity_sanitize_number( $value ) {
		$value = (int) $value; // Force the value into integer type.
		return ( 0 < $value ) ? $value : null;
	}
endif;

// adds sanitization callback function : colors
if ( ! function_exists( 'longevity_sanitize_hex_colour' ) ) :
	function longevity_sanitize_hex_colour( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
			return '#' . $unhashed;
	
		return $color;
	}
endif;

// adds sanitization callback function : text 
if ( ! function_exists( 'longevity_sanitize_text' ) ) :
	function longevity_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
endif;

// adds sanitization callback function : url
if ( ! function_exists( 'longevity_sanitize_url' ) ) :
	function longevity_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}
endif;

// adds sanitization callback function : checkbox
if ( ! function_exists( 'longevity_sanitize_checkbox' ) ) :
	function longevity_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}	 
endif;

// adds sanitization callback function : absolute integer
if ( ! function_exists( 'longevity_sanitize_integer' ) ) :
function longevity_sanitize_integer( $input ) {
	return absint( $input );
}
endif;

// adds sanitization callback function for uploading : uploader
if ( ! function_exists( 'longevity_sanitize_upload' ) ) :
	add_filter( 'longevity_sanitize_image', 'longevity_sanitize_upload' );
	add_filter( 'longevity_sanitize_file', 'longevity_sanitize_upload' );
	
	function longevity_sanitize_upload( $input ) {        
			$output = '';        
			$filetype = wp_check_filetype($input);       
			if ( $filetype["ext"] ) {        
					$output = $input;        
			}       
			return $output;
	}
endif;

// adds sanitization callback function for uploading : select
function longevity_sanitize_colour_scheme( $input ) {
    $valid = array(
		'default'      	=> esc_html__( 'Default', 'longevity' ),
		'grey'          	=> esc_html__( 'Grey', 'longevity' ),
		'burgandy' 	=> esc_html__( 'Burgandy', 'longevity' ),
		'green'       	=> esc_html__( 'Green', 'longevity' ),
		'yellow'       	=> esc_html__( 'Yellow', 'longevity' ),
		'white'       	=> esc_html__( 'White', 'longevity' ),
		'taupe'        	=> esc_html__( 'Taupe', 'longevity' ),
		'aqua'          	=> esc_html__( 'Aqua', 'longevity' ),
		'orange'      	=> esc_html__( 'Orange', 'longevity' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}



















?>