<?php
/**
* Density Theme Customizer
*
* @package Density
*/

/**
* Add postMessage support for site title and description for the Theme Customizer.
*
* @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/


function density_customize_register( $wp_customize ) {	

// Density theme choice options
if (!function_exists('density_section_choice_option')) :
function density_section_choice_option()
{
	$density_section_choice_option = array(
		'show' => esc_html__('Show', 'density'),
		'hide' => esc_html__('Hide', 'density')
	);
	return apply_filters('density_section_choice_option', $density_section_choice_option);
}
endif;

/**
* Sanitizing the select callback example
*
*/
if ( !function_exists('density_sanitize_select') ) :
function density_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_text_field( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;

/**
	 * Important Link
	*/
	 class density_theme_info_text extends WP_Customize_Control{
        public function render_content(){  ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }
	
	 
	
	$wp_customize->add_section( 'density_implink_section', array(
	  'title'       => esc_html__( 'Important Links', 'density' ),
	  'priority'      => 200
	) );

	    $wp_customize->add_setting( 'density_imp_links', array(
	      'sanitize_callback' => 'density_text_sanitize'
	    ));

	    $wp_customize->add_control( new density_theme_info_text( $wp_customize,'munix_imp_links', array(
	        'settings'    => 'density_imp_links',
	        'section'   => 'density_implink_section',
	        'description' => '<a class="implink" href="http://wpalter.com/docs/density-documentation/index.html" target="_blank">'.esc_html__('Documentation', 'density').'</a><a class="implink" href="http://wpalter.com/product/pro-detail/" target="_blank">'.esc_html__('Live Demo', 'density').'</a><a class="implink" href="https://wordpress.org/support/theme/density" target="_blank">'.esc_html__('Support Forum', 'density').'</a>',
	      )
	    ));

	    $wp_customize->add_setting( 'density_rate_us', array(
	      'sanitize_callback' => 'density_text_sanitize'
	    ));

	    $wp_customize->add_control( new density_theme_info_text( $wp_customize, 'density_rate_us', array(
	          'settings'    => 'density_rate_us',
	          'section'   => 'density_implink_section',
              /* translators: 1.text 2.theme */
	          'description' => sprintf(__( 'Please do rate our theme if you liked it %1$s', 'density'), '<a class="implink" href="https://wordpress.org/support/theme/density/reviews/?filter=5" target="_blank">'.esc_html__('Rate/Review','density').'</a>' ),
	        )
	    ));

/**
* Drop-down Pages sanitization callback example.
*
* - Sanitization: dropdown-pages
* - Control: dropdown-pages
* 
* Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
* as an absolute integer, and then validates that $input is the ID of a published page.
* 
* @see absint() https://developer.wordpress.org/reference/functions/absint/
* @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
*
* @param int                  $page    Page ID.
* @param WP_Customize_Setting $setting Setting instance.
* @return int|string Page ID if the page is published; otherwise, the setting default.
*/
function density_sanitize_dropdown_pages( $page_id, $setting ) {
// Ensure $input is an absolute integer.
$page_id = absint( $page_id );

// If $page_id is an ID of a published page, return it; otherwise, return the default.
return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


/** Front Page Section Settings starts **/	

$wp_customize->add_panel(
	'frontpage', 
	array(
		'title' => esc_html__('Density Options', 'density'),        
		'description' => '',                                        
		'priority' => 3,
	));

	// Image Info

$wp_customize->add_section('density_image_info', array(
  'title'   => esc_html__('Home Intro', 'density'),
  'description' => '',
  'panel' => 'frontpage',
  'priority'    => 151
));

$wp_customize->add_setting(
'density_image_section_hideshow',
array(
	'default' => 'hide',
	'sanitize_callback' => 'density_sanitize_select',
)
);
$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
'density_image_section_hideshow',
array(
	'type' => 'radio',
	'label' => esc_html__('Show/hide option for Image Section.', 'density'),
	'description' => '',
	'section' => 'density_image_info',
	'choices' => $density_section_choice_option,
	'priority' => 1
)
);

$wp_customize->add_setting('density_b_image', array(     
'default'   => '',
'type'      => 'theme_mod',
'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'density_b_image', array(
  'label'   => esc_html__('Image', 'density'),
  'section' => 'density_image_info',
  'settings' => 'density_b_image',
  'priority'  => 2
)));

$wp_customize->add_setting('density_image_heading', array(
 'default'   => '',
  'type'      => 'theme_mod',
  'sanitize_callback'	=> 'sanitize_text_field'
));

$wp_customize->add_control('density_image_heading', array(
  'label'   => esc_html__('Heading', 'density'),
  'section' => 'density_image_info',
  'priority'  => 4
));	

$wp_customize->add_setting('density_image_subheading', array(
 'default'   => '',
  'type'      => 'theme_mod',
  'sanitize_callback'	=> 'sanitize_text_field'
));

$wp_customize->add_control('density_image_subheading', array(
  'label'   => esc_html__('Sub Heading', 'density'),
  'section' => 'density_image_info',
  'priority'  => 4
));

$wp_customize->add_setting('density_image_more', array(
  'default'   =>'',
  'type'      => 'theme_mod',
  'sanitize_callback'	=> 'sanitize_text_field'
));

$wp_customize->add_control('density_image_more', array(
  'label'   => esc_html__('Button 1 - Text', 'density'),
  'section' => 'density_image_info',
  'priority'  => 7
));

$wp_customize->add_setting('density_image_more_url', array(
 'default'   =>  '',
  'type'      => 'theme_mod',
'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('density_image_more_url', array(
  'label'   => esc_html__('Button 1 - URL', 'density'),
  'section' => 'density_image_info',
  'priority'  => 8
));

$wp_customize->add_setting('density_image_contact', array(
  'default'   => '',
  'type'      => 'theme_mod',
  'sanitize_callback'	=> 'sanitize_text_field'
));

$wp_customize->add_control('density_image_contact', array(
  'label'   => esc_html__('Button 2 - Text', 'density'),
  'section' => 'density_image_info',
  'priority'  => 9
));

$wp_customize->add_setting('density_image_contact_url', array(
'default'   => '',
  'type'      => 'theme_mod',
'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('density_image_contact_url', array(
  'label'   => esc_html__('Button 2 - URL', 'density'),
  'section' => 'density_image_info',
  'priority'  => 10
));

/** Start About info Section **/
$wp_customize->add_section(
	'general', 
	array(
		'title'   => esc_html__('General Section', 'density'),
		'description' => '',
		'panel' => 'frontpage',
		'priority'    => 100
	));

$wp_customize->add_setting(
	'density_general_section_hideshow',
	array(
		'default' => 'hide',
		'sanitize_callback' => 'density_sanitize_select',
	));

$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
	'density_general_section_hideshow',
	array(
		'type' => 'radio',
		'label' => esc_html__('General Option', 'density'),
		'description' => esc_html__('Show/hide option for Search Button.', 'density'),
		'section' => 'general',
		'choices' => $density_section_choice_option,
		'priority' => 1
	));

$wp_customize->add_setting(
		'density-email',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'density-email',
		array(
			'label'   => esc_html__('Email Section', 'density'),
			'section' => 'general',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'density-contact',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'density-contact',
		array(
			'label'   => esc_html__('Contact Section', 'density'),
			'section' => 'general',
			'priority'  => 3
		)
	);

	/** End about info Section **/

/** Social Icon info **/
$wp_customize->add_section(
	'density_social_section', 
	array(
		'title'   => esc_html__('Social Icon Section', 'density'),
		'description' => '',
		'panel' => 'frontpage',
		'priority'    => 130
	)
);

$wp_customize->add_setting(
	'density_social_section_hideshow',
	array(
		'default' => 'show',
		'sanitize_callback' => 'density_sanitize_select',
	)
);

$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
	'density_social_section_hideshow',
	array(
		'type' => 'radio',
		'label' => esc_html__('Social Icon Option', 'density'),
		'description' => esc_html__('Show/hide option for Header Section.', 'density'),
		'section' => 'density_social_section',
		'choices' => $density_section_choice_option,
		'priority' => 1
	)
);

$wp_customize->add_setting(
	'density_social_link_1',
	array(
		'default'   =>  '',
		'type'      => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control(
	'density_social_link_1',
	array(
		'label'   => esc_html__('Facebook URL', 'density'),
		'section' => 'density_social_section',
		'priority'  => 7
	)
);

$wp_customize->add_setting(
	'density_social_link_2',
	array(
		'default'   => '',
		'type'      => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control(
	'density_social_link_2',
	array(
		'label'   => esc_html__('Twitter URL', 'density'),
		'section' => 'density_social_section',
		'priority'  => 9
	)
);

$wp_customize->add_setting(
	'density_social_link_3',
	array(
		'default'   => '',
		'type'      => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control(
	'density_social_link_3',
	array(
		'label'   => esc_html__('Instagram URL', 'density'),
		'section' => 'density_social_section',
		'priority'  => 11
	)
);

$wp_customize->add_setting(
	'density_social_link_4',
	array(
		'default'   => '',
		'type'      => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control(
	'density_social_link_4',
	array(
		'label'   => esc_html__('Pinrest URL', 'density'),
		'section' => 'density_social_section',
		'priority'  => 13
	)
);

$wp_customize->add_setting(
	'density_social_link_5',
	array(
		'default'   => '',
		'type'      => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control(
	'density_social_link_5',
	array(
		'label'   => esc_html__('Linkedin URL', 'density'),
		'section' => 'density_social_section',
		'priority'  => 15
	));

/** End Social icon info Section **/

/** Start About info Section **/
$wp_customize->add_section(
	'about', 
	array(
		'title'   => esc_html__('About Section', 'density'),
		'description' => '',
		'panel' => 'frontpage',
		'priority'    => 180
	));

$wp_customize->add_setting(
	'density_about_section_hideshow',
	array(
		'default' => 'hide',
		'sanitize_callback' => 'density_sanitize_select',
	));

$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
	'density_about_section_hideshow',
	array(
		'type' => 'radio',
		'label' => esc_html__('Section Option', 'density'),
		'description' => esc_html__('Show/hide option for Header Section.', 'density'),
		'section' => 'about',
		'choices' => $density_section_choice_option,
		'priority' => 1
	));
$about_no = 1;
for( $i = 1; $i <= $about_no; $i++ ) {
	$density_aboutpage = 'density_about_page_' . $i;
	// Setting - About page
	$wp_customize->add_setting( 
		$density_aboutpage,
		array(
			'default'           => 1,
			'sanitize_callback' => 'density_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control( 
		$density_aboutpage,
		array(
			'label'    			=> esc_html__( 'About Page ', 'density' ),
			'section'  			=> 'about',
			'type'     			=> 'dropdown-pages',
			'priority' 			=> 100,
		)
	);
}
$wp_customize->add_setting(
		'density-about_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'density-about_title',
		array(
			'label'   => esc_html__('About Section Title', 'density'),
			'section' => 'about',
			'priority'  => 3
		)
	);

	/** End about info Section **/

	/** start feature section **/
	$wp_customize->add_section(
		'features', 
		array(
			'title'   => esc_html__('Feature Section', 'density'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'density_features_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'density_sanitize_select',
		)
	);

	$density_section_choice_option = density_section_choice_option();
	$wp_customize->add_control(
		'density_features_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'density'),
			'description' => esc_html__('Show/hide option for Header Section.', 'density'),
			'section' => 'features',
			'choices' => $density_section_choice_option,
			'priority' => 1
		)
	);

$feature_no = 6;
for( $i = 1; $i <= $feature_no; $i++ ) {
	$density_featurepage = 'density_feature_page_' . $i;
	$density_featureicon = 'density_page_feature_icon_' . $i;
	
		//Setting Feature Icon
		$wp_customize->add_setting( 
			$density_featureicon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( 
			$density_featureicon,
			array(
			'label'    			=> esc_html__( 'Feature Icon ', 'density' ).$i,
			'description' 		=>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','density'),
			'section'  			=> 'features',
			'type'     			=> 'text',
			'priority' 			=> 100,
			)
		);

	// Setting - Feature page
	$wp_customize->add_setting( 
		$density_featurepage,
		array(
			'default'           => 1,
			'sanitize_callback' => 'density_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control( 
		$density_featurepage,
		array(
			'label'    			=> esc_html__( 'Feature Page ', 'density' ) .$i,
			'section'  			=> 'features',
			'type'     			=> 'dropdown-pages',
			'priority' 			=> 100,
		)
	);
}

/** Start Service info Section **/
$wp_customize->add_section(
'services', 
array(
	'title'   => esc_html__('Service Section', 'density'),
	'description' => '',
	'panel' => 'frontpage',
	'priority'    => 180
));

$wp_customize->add_setting(
	'density_services_section_hideshow',
	array(
		'default' => 'hide',
		'sanitize_callback' => 'density_sanitize_select',
	));

$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
	'density_services_section_hideshow',
	array(
		'type' => 'radio',
		'label' => esc_html__('Section Option', 'density'),
		'description' => esc_html__('Show/hide option for Header Section.', 'density'),
		'section' => 'services',
		'choices' => $density_section_choice_option,
		'priority' => 1
	));

$wp_customize->add_setting(
	'density-services_title',
	array(
		'default'   => '',
		'type'      => 'theme_mod',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

$wp_customize->add_control(
	'density-services_title',
	array(
		'label'   => esc_html__('Services Section Title', 'density'),
		'section' => 'services',
		'priority'  => 3
	));

$service_no = 6;
for( $i = 1; $i <= $service_no; $i++ ) {
$density_servicepage = 'density_service_page_' . $i;
$density_servicebackgroundicon = 'density_page_servicebackground_icon_' . $i;

// Setting - Service page
$wp_customize->add_setting( 
	$density_servicepage,
	array(
		'default'           => 1,
		'sanitize_callback' => 'density_sanitize_dropdown_pages',
	)
);

$wp_customize->add_control( 
	$density_servicepage,
	array(
		'label'    			=> esc_html__( 'Service Page ', 'density' ) .$i,
		'section'  			=> 'services',
		'type'     			=> 'dropdown-pages',
		'priority' 			=> 100,
	)
);

//Setting Service Background Icon
$wp_customize->add_setting( 
	$density_servicebackgroundicon,
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 
	$density_servicebackgroundicon,
	array(
		'label'    			=> esc_html__( 'Service Icon ', 'density' ).$i,
		'description' 		=>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','density'),
		'section'  			=> 'services',
		'type'     			=> 'text',
		'priority' 			=> 100,
	)
);
}
/** End Service info Section **/

/** Start Blog info Section **/
$wp_customize->add_section(
'blog', 
array(
	'title'   => esc_html__('Blog Section', 'density'),
	'description' => '',
	'panel' => 'frontpage',
	'priority'    => 180
	)
);

$wp_customize->add_setting(
	'density_blog_section_hideshow',
	array(
		'default' => 'show',
		'sanitize_callback' => 'density_sanitize_select',
	)
);

$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
	'density_blog_section_hideshow',
	array(
		'type' => 'radio',
		'label' => esc_html__('Section Option', 'density'),
		'description' => esc_html__('Show/hide option for Blog Section.', 'density'),
		'section' => 'blog',
		'choices' => $density_section_choice_option,
		'priority' => 1
	)
);

$wp_customize->add_setting(
	'density-blog_title',
	array(
		'default'   => '',
		'type'      => 'theme_mod',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'density-blog_title',
	array(
		'label'   => esc_html__('Blog Section Title', 'density'),
		'section' => 'blog',
		'priority'  => 3
	)
);

/** Start callout info Section **/
$wp_customize->add_section(
	'callout', 
	array(
		'title'   => esc_html__('Callout Section', 'density'),
		'description' => '',
		'panel' => 'frontpage',
		'priority'    => 180
	)
);

$wp_customize->add_setting(
	'density_callout_section_hideshow',
	array(
		'default' => 'hide',
		'sanitize_callback' => 'density_sanitize_select',
	)
);

$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
	'density_callout_section_hideshow',
	array(
		'type' => 'radio',
		'label' => esc_html__('Section Option', 'density'),
		'description' => esc_html__('Show/hide option for Header Section.', 'density'),
		'section' => 'callout',
		'choices' => $density_section_choice_option,
		'priority' => 1
	)
);



$wp_customize->add_setting(
'density_callout_text_value', 
array(
	'default'   => '',
	'type'      => 'theme_mod',
	'sanitize_callback' => 'sanitize_text_field'
)
);

$wp_customize->add_control(
'density_callout_text_value', 
array(
	'label'   => esc_html__('Callout Text', 'density'),
	'section' => 'callout',
	'priority'  => 3
)
);

$wp_customize->add_setting(
'density_callout_subtext_value', 
array(
	'default'   => '',
	'type'      => 'theme_mod',
	'sanitize_callback' => 'sanitize_text_field'
)
);

$wp_customize->add_control(
'density_callout_subtext_value', 
array(
	'label'   => esc_html__('Callout Sub Text', 'density'),
	'section' => 'callout',
	'priority'  => 3
)
);

$wp_customize->add_setting(
'density_callout_button_text',
	array(
		'default'           => '',
		'type'      		=> 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'density_callout_button_text',
	array(
		'label'    			=> esc_html__( 'Callout Button Text','density' ),
		'section'  			=> 'callout',
		'priority' 			=> 3
	)
);

$wp_customize->add_setting( 
	'density_callout_button_url',
	array(
		'default'           => '',
		'type'      		=> 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control( 
	'density_callout_button_url',
	array(
		'label'    			=> esc_html__( 'Button URL', 'density' ),
		'section'  			=> 'callout',
		'priority' 			=> 3,
	)
);

/** End callout info Section **/

/** Start footer Section **/

$wp_customize->add_section(
	'footer',
	array(
		'title'   => esc_html__('Footer Section', 'density'),
		'description' => '',
		'panel' => 'frontpage',
		'priority'    => 180
	)
);

$wp_customize->add_setting(
	'density_footer_section_hideshow',
	array(
		'default' => 'show',
		'sanitize_callback' => 'density_sanitize_select',
	)
);
$density_section_choice_option = density_section_choice_option();
$wp_customize->add_control(
	'density_footer_section_hideshow',
	array(
		'type' => 'radio',
		'label' => esc_html__('Footer Option', 'density'),
		'description' => esc_html__('Show/hide option for Footer Section.', 'density'),
		'section' => 'footer',
		'choices' => $density_section_choice_option,
		'priority' => 1
	)
);

$wp_customize->add_setting(
	'density-footer_title',
	array(
		'default'   => '',
		'type'      => 'theme_mod',
		'sanitize_callback'	=> 'wp_kses_post'
	)
);

$wp_customize->add_control(
	'density-footer_title',
	array(
		'label'   => esc_html__('Copyright', 'density'),
		'section' => 'footer',
		'type'      => 'textarea',
		'priority'  => 1
	)
);
}
add_action( 'customize_register', 'density_customize_register' );
?>