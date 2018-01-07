<?php
/**
 * professional Theme Customizer
 *
 * @package professional
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function professional_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'professional' ),
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'professional_logo' , array(
	    'default'     => '',
	    'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'professional_logo',
	        array(
	            'label' => __('Upload Logo','professional'),
	            'section' => 'title_tagline',
	            'settings' => 'professional_logo',
	            'priority' => 5,
	        )
		)
	);
		
	
	
	//Replace Header Text Color with, separate colors for Title and Description
	//Override professional_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('header_textcolor');
	$wp_customize->add_setting('professional_site_titlecolor', array(
	    'default'     => '#ad4f18',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'professional_site_titlecolor', array(
			'label' => __('Site Title Color','professional'),
			'section' => 'colors',
			'settings' => 'professional_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	//Settings For Logo Area
	
	function professional_title_visible( $control ) {
		$option = $control->manager->get_setting('professional_hide_title_tagline');
	    return $option->value() == false ;
	}
	
	// SLIDER PANEL
	$wp_customize->add_panel( 'professional_slider_panel', array(
	    'priority'       => 35,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => 'Main Slider',
	) );
	
	$wp_customize->add_section(
	    'professional_sec_slider_options',
	    array(
	        'title'     => __('Enable/Disable','professional'),
	        'priority'  => 0,
	        'panel'     => 'professional_slider_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'professional_main_slider_enable',
		array( 'sanitize_callback' => 'professional_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'professional_main_slider_enable', array(
		    'settings' => 'professional_main_slider_enable',
		    'label'    => __( 'Enable Slider.', 'professional' ),
		    'section'  => 'professional_sec_slider_options',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'professional_main_slider_count',
			array(
				'default' => '0',
				'sanitize_callback' => 'professional_sanitize_positive_number'
			)
	);
	
	// Select How Many Slides the User wants, and Reload the Page.
	$wp_customize->add_control(
			'professional_main_slider_count', array(
		    'settings' => 'professional_main_slider_count',
		    'label'    => __( 'No. of Slides(Min:0, Max: 5)' ,'professional'),
		    'section'  => 'professional_sec_slider_options',
		    'type'     => 'number',
		    'description' => __('Save the Settings, and Reload this page to Configure the Slides.','professional'),
		    
		)
	);
	
		
	
	if ( get_theme_mod('professional_main_slider_count') > 0 ) :
		$slides = get_theme_mod('professional_main_slider_count');
		
		for ( $i = 1 ; $i <= $slides ; $i++ ) :
			
			//Create the settings Once, and Loop through it.
			
			$wp_customize->add_setting(
				'professional_slide_img'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
			    new WP_Customize_Image_Control(
			        $wp_customize,
			        'professional_slide_img'.$i,
			        array(
			            'label' => '',
			            'section' => 'professional_slide_sec'.$i,
			            'settings' => 'professional_slide_img'.$i,			       
			        )
				)
			);
			
			
			$wp_customize->add_section(
			    'professional_slide_sec'.$i,
			    array(
			        'title'     => 'Slide '.$i,
			        'priority'  => $i,
			        'panel'     => 'professional_slider_panel'
			    )
			);
			
			$wp_customize->add_setting(
				'professional_slide_title'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'professional_slide_title'.$i, array(
				    'settings' => 'professional_slide_title'.$i,
				    'label'    => __( 'Slide Title','professional' ),
				    'section'  => 'professional_slide_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			$wp_customize->add_setting(
				'professional_slide_desc'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'professional_slide_desc'.$i, array(
				    'settings' => 'professional_slide_desc'.$i,
				    'label'    => __( 'Slide Description','professional' ),
				    'section'  => 'professional_slide_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			
			$wp_customize->add_setting(
				'professional_slide_url'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
					'professional_slide_url'.$i, array(
				    'settings' => 'professional_slide_url'.$i,
				    'label'    => __( 'Target URL','professional' ),
				    'section'  => 'professional_slide_sec'.$i,
				    'type'     => 'url',
				)
			);
			
		endfor;
	
	
	endif;
	
	
	//Showcase
	$wp_customize->add_panel( 'professional_showcase_panel', array(
	    'priority'       => 35,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Showcases','professional'),
	) );
	
	$wp_customize->add_section(
	    'professional_sec_showcase_options',
	    array(
	        'title'     => __('Enable/Disable','professional'),
	        'priority'  => 0,
	        'panel'     => 'professional_showcase_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'professional_main_showcase_enable',
		array( 'sanitize_callback' => 'professional_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'professional_main_showcase_enable', array(
		    'settings' => 'professional_main_showcase_enable',
		    'label'    => __( 'Enable Showcase.', 'professional' ),
		    'section'  => 'professional_sec_showcase_options',
		    'type'     => 'checkbox',
		)
	);
		
	
		$showcases = 3;
		
		for ( $i = 1 ; $i <= $showcases ; $i++ ) :
			
			//Create the settings Once, and Loop through it.
			
			$wp_customize->add_setting(
				'professional_showcase_img'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
			    new WP_Customize_Image_Control(
			        $wp_customize,
			        'professional_showcase_img'.$i,
			        array(
			            'label' => '',
			            'section' => 'professional_showcase_sec'.$i,
			            'settings' => 'professional_showcase_img'.$i,			       
			        )
				)
			);
			
			
			$wp_customize->add_section(
			    'professional_showcase_sec'.$i,
			    array(
			        'title'     => 'Showcase '.$i,
			        'priority'  => $i,
			        'panel'     => 'professional_showcase_panel'
			    )
			);
			
			$wp_customize->add_setting(
				'professional_showcase_title'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'professional_showcase_title'.$i, array(
				    'settings' => 'professional_showcase_title'.$i,
				    'label'    => __( 'Showcase Title','professional' ),
				    'section'  => 'professional_showcase_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			$wp_customize->add_setting(
				'professional_showcase_desc'.$i,
				array( 'sanitize_callback' => 'sanitize_text_field' )
			);
			
			$wp_customize->add_control(
					'professional_showcase_desc'.$i, array(
				    'settings' => 'professional_showcase_desc'.$i,
				    'label'    => __( 'Showcase Description','professional' ),
				    'section'  => 'professional_showcase_sec'.$i,
				    'type'     => 'text',
				)
			);
			
			
			$wp_customize->add_setting(
				'professional_showcase_url'.$i,
				array( 'sanitize_callback' => 'esc_url_raw' )
			);
			
			$wp_customize->add_control(
					'professional_showcase_url'.$i, array(
				    'settings' => 'professional_showcase_url'.$i,
				    'label'    => __( 'Target URL','professional' ),
				    'section'  => 'professional_showcase_sec'.$i,
				    'type'     => 'url',
				)
			);
			
		endfor;
	
	if (class_exists('WP_Customize_Control')) {
		class professional_WP_Customize_Upgrade_Control extends WP_Customize_Control {
	        /**
	         * Render the control's content.
	         */
	        public function render_content() {
	             printf(
	                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
	                $this->label,
	                $this->description
	            );
	        }
	    }
	}
	
	
	//Upgrade
	$wp_customize->add_section(
	    'professional_sec_upgrade',
	    array(
	        'title'     => __('Discover PROFESSIONAL PLUS','professional'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'professional_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new professional_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'professional_upgrade',
	        array(
	            'label' => __('More of Everything','professional'),
	            'description' => __('Professional Plus has more of Everything. More New Features, More Options, Unlimited Colors, More Fonts, More Layouts, Configurable Slider, More Widgets, and a lot more options and comes with Dedicated Support. To Know More about the Pro Version, click here: <a href="http://inkhive.com/product/professional-plus/">Upgrade to Pro</a>.','professional'),
	            'section' => 'professional_sec_upgrade',
	            'settings' => 'professional_upgrade',			       
	        )
		)
	);
		
	
	class professional_Custom_CSS_Control extends WP_Customize_Control {
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
    'professional_custom_codes',
    array(
    	'title'			=> __('Custom CSS','professional'),
    	'description'	=> __('Enter your Custom CSS to Modify design.','professional'),
    	'priority'		=> 41,
    	)
    );
    
	$wp_customize->add_setting(
	'professional_custom_css',
	array(
		'default'		=> '',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);
	
	$wp_customize->add_control(
	    new professional_Custom_CSS_Control(
	        $wp_customize,
	        'professional_custom_css',
	        array(
	            'section' => 'professional_custom_codes',
	            

	        )
	    )
	);
	
	function professional_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	
	
	// Social Icons
	$wp_customize->add_section('professional_social_section', array(
			'title' => __('Social Icons','professional'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','professional'),
					'facebook' => __('Facebook','professional'),
					'twitter' => __('Twitter','professional'),
					'google' => __('Google Plus','professional'),
					'instagram' => __('Instagram','professional'),
					'rss' => __('RSS Feeds','professional'),
					'flickr' => __('Flickr','professional'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'professional_social_'.$x, array(
				'sanitize_callback' => 'professional_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'professional_social_'.$x, array(
					'settings' => 'professional_social_'.$x,
					'label' => __('Icon ','professional').$x,
					'section' => 'professional_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'professional_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'professional_social_url'.$x, array(
					'settings' => 'professional_social_url'.$x,
					'description' => __('Icon ','professional').$x.__(' Url','professional'),
					'section' => 'professional_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function professional_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google',
					'instagram',
					'rss',
					'flickr',
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function professional_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function professional_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function professional_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}
	
	
}
add_action( 'customize_register', 'professional_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function professional_customize_preview_js() {
	wp_enqueue_script( 'professional_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'professional_customize_preview_js' );
