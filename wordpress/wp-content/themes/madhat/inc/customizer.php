<?php
/**
 * madhat Theme Customizer
 *
 * @package madhat
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function madhat_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'madhat' ),
	    'priority'   => 30,
	) );
	
	
	$wp_customize->add_setting( 'madhat_logo_resize' , array(
	    'default'     => 100,
	    'sanitize_callback' => 'madhat_sanitize_positive_number',
	) );
	$wp_customize->add_control(
	        'madhat_logo_resize',
	        array(
	            'label' => __('Resize & Adjust Logo','madhat'),
	            'section' => 'title_tagline',
	            'settings' => 'madhat_logo_resize',
	            'priority' => 6,
	            'type' => 'range',
	            'active_callback' => 'madhat_logo_enabled',
	            'input_attrs' => array(
			        'min'   => 30,
			        'max'   => 200,
			        'step'  => 5,
			    ),
	        )
	);
	
	function madhat_logo_enabled($control) {
		$option = $control->manager->get_setting('custom_logo');
		return $option->value() == true;
		//return true;
	}
	
	
	
	//Replace Header Text Color with, separate colors for Title and Description
	//Override madhat_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('header_textcolor');
	$wp_customize->add_setting('madhat_site_titlecolor', array(
	    'default'     => '#FFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'madhat_site_titlecolor', array(
			'label' => __('Site Title Color','madhat'),
			'section' => 'colors',
			'settings' => 'madhat_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting('madhat_header_desccolor', array(
	    'default'     => '#FFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'madhat_header_desccolor', array(
			'label' => __('Site Tagline Color','madhat'),
			'section' => 'colors',
			'settings' => 'madhat_header_desccolor',
			'type' => 'color'
		) ) 
	);
	
	//Settings for Nav Area
	$wp_customize->add_setting( 'madhat_disable_active_nav' , array(
	    'default'     => true,
	    'sanitize_callback' => 'madhat_sanitize_checkbox',
	) );
	
	$wp_customize->add_control(
	'madhat_disable_active_nav', array(
		'label' => __('Disable Highlighting of Current Active Item on the Menu.','madhat'),
		'section' => 'nav',
		'settings' => 'madhat_disable_active_nav',
		'type' => 'checkbox'
	) );
	
	//Settings for Header Image
	$wp_customize->add_setting( 'madhat_himg_style' , array(
	    'default'     => true,
	    'sanitize_callback' => 'madhat_sanitize_himg_style'
	) );
	
	/* Sanitization Function */
	function madhat_sanitize_himg_style( $input ) {
		if (in_array( $input, array('contain','cover') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
	'madhat_himg_style', array(
		'label' => __('Header Image Arrangement','madhat'),
		'section' => 'header_image',
		'settings' => 'madhat_himg_style',
		'type' => 'select',
		'choices' => array(
				'contain' => __('Contain','madhat'),
				'cover' => __('Cover Completely','madhat'),
				)
	) );
	
	$wp_customize->add_setting( 'madhat_himg_align' , array(
	    'default'     => true,
	    'sanitize_callback' => 'madhat_sanitize_himg_align'
	) );
	
	/* Sanitization Function */
	function madhat_sanitize_himg_align( $input ) {
		if (in_array( $input, array('center','left','right') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
	'madhat_himg_align', array(
		'label' => __('Header Image Alignment','madhat'),
		'section' => 'header_image',
		'settings' => 'madhat_himg_align',
		'type' => 'select',
		'choices' => array(
				'center' => __('Center','madhat'),
				'left' => __('Left','madhat'),
				'right' => __('Right','madhat'),
			)
		
	) );
	
	$wp_customize->add_setting( 'madhat_himg_repeat' , array(
	    'default'     => true,
	    'sanitize_callback' => 'madhat_sanitize_checkbox'
	) );
	
	$wp_customize->add_control(
	'madhat_himg_repeat', array(
		'label' => __('Repeat Header Image','madhat'),
		'section' => 'header_image',
		'settings' => 'madhat_himg_repeat',
		'type' => 'checkbox',
	) );
	
	
	//Settings For Logo Area
	
	$wp_customize->add_setting(
		'madhat_hide_title_tagline',
		array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'madhat_hide_title_tagline', array(
		    'settings' => 'madhat_hide_title_tagline',
		    'label'    => __( 'Hide Title and Tagline.', 'madhat' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'madhat_branding_below_logo',
		array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'madhat_branding_below_logo', array(
		    'settings' => 'madhat_branding_below_logo',
		    'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'madhat' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		    'active_callback' => 'madhat_title_visible'
		)
	);
	
	function madhat_title_visible( $control ) {
		$option = $control->manager->get_setting('madhat_hide_title_tagline');
	    return $option->value() == false ;
	}
	
	$wp_customize->add_setting(
		'madhat_center_logo',
		array( 
			'sanitize_callback' => 'madhat_sanitize_checkbox',
			'default' => true )
	);
	
	$wp_customize->add_control(
			'madhat_center_logo', array(
		    'settings' => 'madhat_center_logo',
		    'label'    => __( 'Center Align.', 'madhat' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	

	
	// CREATE THE FCA PANEL
	$wp_customize->add_panel( 'madhat_fca_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => 'Featured Content Areas',
	    'description'    => '',
	) );
	
	
	//FEATURED AREA 1
	$wp_customize->add_section(
	    'madhat_fc_boxes',
	    array(
	        'title'     => 'Featured Area 1',
	        'priority'  => 10,
	        'panel'     => 'madhat_fca_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'madhat_box_enable',
		array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'madhat_box_enable', array(
		    'settings' => 'madhat_box_enable',
		    'label'    => __( 'Enable Featured Area 1.', 'madhat' ),
		    'section'  => 'madhat_fc_boxes',
		    'type'     => 'checkbox',
		)
	);
	
 
	$wp_customize->add_setting(
		'madhat_box_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'madhat_box_title', array(
		    'settings' => 'madhat_box_title',
		    'label'    => __( 'Title for the Boxes','madhat' ),
		    'section'  => 'madhat_fc_boxes',
		    'type'     => 'text',
		)
	);
 
 	$wp_customize->add_setting(
	    'madhat_box_cat',
	    array( 'sanitize_callback' => 'madhat_sanitize_category' )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Category_Control(
	        $wp_customize,
	        'madhat_box_cat',
	        array(
	            'label'    => __('Category For Square Boxes.','madhat'),
	            'settings' => 'madhat_box_cat',
	            'section'  => 'madhat_fc_boxes'
	        )
	    )
	);
	
	//FEATURED AREA 2
	$wp_customize->add_section(
	    'madhat_fc_fa2',
	    array(
	        'title'     => __('Featured Area 2','madhat'),
	        'priority'  => 10,
	        'panel'     => 'madhat_fca_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'madhat_fa2_enable',
		array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'madhat_fa2_enable', array(
		    'settings' => 'madhat_fa2_enable',
		    'label'    => __( 'Enable Featured Area 1.', 'madhat' ),
		    'section'  => 'madhat_fc_fa2',
		    'type'     => 'checkbox',
		)
	);
	
 
	$wp_customize->add_setting(
		'madhat_fa2_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'madhat_fa2_title', array(
		    'settings' => 'madhat_fa2_title',
		    'label'    => __( 'Title for the fa2','madhat' ),
		    'section'  => 'madhat_fc_fa2',
		    'type'     => 'text',
		)
	);
 
 	$wp_customize->add_setting(
	    'madhat_fa2_cat',
	    array( 'sanitize_callback' => 'madhat_sanitize_category' )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Category_Control(
	        $wp_customize,
	        'madhat_fa2_cat',
	        array(
	            'label'    => __('Category For Square.','madhat'),
	            'settings' => 'madhat_fa2_cat',
	            'section'  => 'madhat_fc_fa2'
	        )
	    )
	);
	
	
	// Layout and Design
	$wp_customize->add_panel( 'madhat_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Design & Layout','madhat'),
	) );
	
	$wp_customize->add_section(
	    'madhat_design_options',
	    array(
	        'title'     => __('Blog Layout','madhat'),
	        'priority'  => 0,
	        'panel'     => 'madhat_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'madhat_blog_layout',
		array( 'sanitize_callback' => 'madhat_sanitize_blog_layout' )
	);
	
	function madhat_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('grid','grid_2_column','grid_3_column','madhat') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'madhat_blog_layout',array(
				'label' => __('Select Layout','madhat'),
				'settings' => 'madhat_blog_layout',
				'section'  => 'madhat_design_options',
				'type' => 'select',
				'choices' => array(
						'grid' => __('Basic Blog Layout','madhat'),
						'madhat' => __('MadHat Default Layout','madhat'),
						'grid_2_column' => __('Grid - 2 Column','madhat'),
						'grid_3_column' => __('Grid - 3 Column','madhat'),
					)
			)
	);
	
	$wp_customize->add_section(
	    'madhat_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','madhat'),
	        'priority'  => 0,
	        'panel'     => 'madhat_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'madhat_disable_sidebar',
		array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'madhat_disable_sidebar', array(
		    'settings' => 'madhat_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','madhat' ),
		    'section'  => 'madhat_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'madhat_disable_sidebar_home',
		array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'madhat_disable_sidebar_home', array(
		    'settings' => 'madhat_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Home/Blog.','madhat' ),
		    'section'  => 'madhat_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'madhat_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'madhat_disable_sidebar_front',
		array( 'sanitize_callback' => 'madhat_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'madhat_disable_sidebar_front', array(
		    'settings' => 'madhat_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','madhat' ),
		    'section'  => 'madhat_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'madhat_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'madhat_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'madhat_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'madhat_sidebar_width', array(
		    'settings' => 'madhat_sidebar_width',
		    'label'    => __( 'Sidebar Width','madhat' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','madhat'),
		    'section'  => 'madhat_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'madhat_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function madhat_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('madhat_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	class MadHat_Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	$wp_customize-> add_section(
    'madhat_custom_codes',
    array(
    	'title'			=> __('Custom CSS','madhat'),
    	'description'	=> __('Enter your Custom CSS to Modify design.','madhat'),
    	'priority'		=> 11,
    	'panel'			=> 'madhat_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'madhat_custom_css',
	array(
		'default'		=> '',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		
		)
	);
	
	$wp_customize->add_control(
	    new MadHat_Custom_CSS_Control(
	        $wp_customize,
	        'madhat_custom_css',
	        array(
	            'section' => 'madhat_custom_codes',
	            'settings' => 'madhat_custom_css'
	        )
	    )
	);
	
	function madhat_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'madhat_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','madhat'),
    	'description'	=> __('Enter your Own Copyright Text.','madhat'),
    	'priority'		=> 11,
    	'panel'			=> 'madhat_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'madhat_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'madhat_footer_text',
	        array(
	            'section' => 'madhat_custom_footer',
	            'settings' => 'madhat_footer_text',
	            'type' => 'text'
	        )
	);	
	
	$wp_customize->add_section(
	    'madhat_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','madhat'),
	        'description' => __('Defaults: Playfair Display','madhat'),
	        'priority'  => 41,
	    )
	);
	
	$font_array = array('Playfair Display','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'madhat_title_font',
		array(
			'default'=> 'Playfair Display',
			'sanitize_callback' => 'madhat_sanitize_gfont' 
			)
	);
	
	function madhat_sanitize_gfont( $input ) {
		if ( in_array($input, array('Playfair Display','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'madhat_title_font',array(
				'label' => __('Title','madhat'),
				'settings' => 'madhat_title_font',
				'section'  => 'madhat_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'madhat_body_font',
			array(	'default'=> 'Playfair Display',
					'sanitize_callback' => 'madhat_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'madhat_body_font',array(
				'label' => __('Body','madhat'),
				'settings' => 'madhat_body_font',
				'section'  => 'madhat_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
	
	// Social Icons
	$wp_customize->add_section('madhat_social_section', array(
			'title' => __('Social Icons','madhat'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','madhat'),
					'facebook' => __('Facebook','madhat'),
					'twitter' => __('Twitter','madhat'),
					'google-plus' => __('Google Plus','madhat'),
					'instagram' => __('Instagram','madhat'),
					'rss' => __('RSS Feeds','madhat'),
					'vine' => __('Vine','madhat'),
					'vimeo-square' => __('Vimeo','madhat'),
					'youtube' => __('Youtube','madhat'),
					'flickr' => __('Flickr','madhat'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'madhat_social_'.$x, array(
				'sanitize_callback' => 'madhat_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'madhat_social_'.$x, array(
					'settings' => 'madhat_social_'.$x,
					'label' => __('Icon ','madhat').$x,
					'section' => 'madhat_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'madhat_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'madhat_social_url'.$x, array(
					'settings' => 'madhat_social_url'.$x,
					'description' => __('Icon ','madhat').$x.__(' Url','madhat'),
					'section' => 'madhat_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function madhat_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}	
	
	$wp_customize->add_section(
	    'madhat_sec_pro',
	    array(
	        'title'     => __('Upgrade to MadHat Plus','madhat'),
	        'priority'  => 10,
	    )
	);
	
	$wp_customize->add_setting(
			'madhat_pro',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'madhat_pro',
	        array(
	            'label' => __('Upgrade to Madhat Plus','madhat'),
	            'description' => __('<a href="https://inkhive.com/product/madhat-plus/"><strong>Madhat Plus</strong></a> has so many features that it will make you fall in love with it. <ul class="prolists">
	            <li>Better Responsiveness</li>
	            <li>650+ Google Fonts</li>
	            <li>Carousel, Flex Grid and More Featured Content</li>
	            <li>More Blog Layouts</li>
	            <li>More Page Layouts</li>
	            <li>Advanced Sidebar</li>
	            <li>Advanced Menubar</li>
	            <li>Better Customizer</li>
	            <li><strong>Unlimited Skins, Colors & Designer</strong></li>
	            <li>SEO Optimized</li>
	            <li>Header Layouts</li>
	            <li>Footer Layouts</li>
	            <li>Boxed Layout</li>
	            <li>Custom Widgets</li>
	            <li>More Social Icons</li>
	            <li>Easy to Remove Footer Credit Links</li>
	            <li>And so much more...</li>
	            
	            </ul> <a href="https://inkhive.com/product/madhat-plus/">Upgrade Now</a>.','madhat'),
	            'section' => 'madhat_sec_pro',
	            'settings' => 'madhat_pro',			       
	        )
		)
	);
	
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function madhat_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function madhat_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function madhat_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}			
}
add_action( 'customize_register', 'madhat_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function madhat_customize_preview_js() {
	wp_enqueue_script( 'madhat_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'madhat_customize_preview_js' );
