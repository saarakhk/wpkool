<?php
/**
 * Theme customizer File
 *
 * @package Beatrix Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register theme settings through customizer
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_register_customizer_settings( $wp_customize ) {	

	$default_settings = beatrix_lite_default_settings();	
	 require get_template_directory() . '/includes/class-beatrix-control-upg.php';	

	/***** Website Color Seeings *****/

	$wp_customize->add_panel( 'website_colors_panel', array(
	        'title' => __( 'Other Website Colors', 'beatrix-lite' ),
	));
	
	$wp_customize->add_section( 'heading_section' , array(
			'title' =>  __('Heading Color', 'beatrix-lite'),
			'panel' => 'website_colors_panel',			
	));

	$wp_customize->add_section( 'link_section' , array(
			'title' =>  __('Link Color', 'beatrix-lite'),
			'panel' => 'website_colors_panel',			
	));

	
	
	// Site heading color
	$txtcolors[] = array(
		'slug' 			=> 'h1_clr',
		'default' 		=> $default_settings['h1_clr'],
		'label' 		=> __('H1 Color', 'beatrix-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'beatrix-lite'),

	);

	// H2 color
	$txtcolors[] = array(
		'slug' 			=> 'h2_clr',
		'default' 		=> $default_settings['h2_clr'],
		'label' 		=> __('H2 Color', 'beatrix-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'beatrix-lite'),

	);

	// H3 color
	$txtcolors[] = array(
		'slug' 			=> 'h3_clr',
		'default' 		=> $default_settings['h3_clr'],
		'label' 		=> __('H3 Color', 'beatrix-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'beatrix-lite'),

	);

	// H4 color
	$txtcolors[] = array(
		'slug' 			=> 'h4_clr',
		'default' 		=> $default_settings['h4_clr'],
		'label' 		=> __('H4 Color', 'beatrix-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'beatrix-lite'),

	);

	// H5 color
	$txtcolors[] = array(
		'slug' 			=> 'h5_clr',
		'default' 		=> $default_settings['h5_clr'],
		'label' 		=> __('H5 Color', 'beatrix-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'beatrix-lite'),

	);

	// H6 color
	$txtcolors[] = array(
		'slug' 			=> 'h6_clr',
		'default' 		=> $default_settings['h6_clr'],
		'label' 		=> __('H6 Color', 'beatrix-lite'),
		'section'   	=> 'heading_section',
		'section_title' => __('Heading Color', 'beatrix-lite'),

	);

	// Site link color
	$txtcolors[] = array(
		'slug' 			=> 'link_clr', 
		'default' 		=> $default_settings['link_clr'],
		'label' 		=> __('Link Color', 'beatrix-lite'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'beatrix-lite'),
	);

	// Site link hover color
	$txtcolors[] = array(
		'slug' 		=> 'hover_link_clr', 
		'default' 	=> $default_settings['hover_link_clr'],
		'label' 	=> __('Link Hover Color', 'beatrix-lite'),
		'section'   	=> 'link_section',
		'section_title' => __('Link Color', 'beatrix-lite'),
	);
	

	// Website color settings
	foreach( $txtcolors as $txtcolor ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' 				=> $txtcolor['default'],
				'sanitize_callback'     => 'sanitize_hex_color',
				'capability' 			=> 'edit_theme_options'
		));

		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $txtcolor['slug'],
				array(
					'label' 	=> $txtcolor['label'], 
					'section' 	=> $txtcolor['section'],
					'settings' 	=> $txtcolor['slug']
				))
		);
	} // End of foreach

	
	/* Post Settings panel*/
    $wp_customize->add_panel('post_panel', array(
	        'title' => __( 'Post Settings', 'beatrix-lite' ),

	));     
    
	/* Blog Page Settings */
	$wp_customize->add_section( 'blog-sett' , array(
		'title' =>  __( 'Blog Page', 'beatrix-lite' ),
		'panel' => 'post_panel',
	));	

	// Add blog layout  excerpt length
	$wp_customize->add_setting( 'blog_excerpt_length', array(
									'sanitize_callback' => 'absint',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_excerpt_length'],
							));

	$wp_customize->add_control( 'blog_excerpt_length', array(		
		'label'    	=> __( 'Excerpt Length', 'beatrix-lite' ),
		'section'    => 'blog-sett',
		'settings'   => 'blog_excerpt_length',
		'type'       => 'number',		
		'description'	=> __('Enter excerpt length eg 40', 'beatrix-lite')
	));	
	
	// Show/hide date
	$wp_customize->add_setting( 'blog_show_date', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_date'],
							));

	$wp_customize->add_control( 'blog_show_date', array(
		'label'    		=> __( 'Show Post Date', 'beatrix-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'beatrix-lite')
	));

	// Show/hide author
	$wp_customize->add_setting( 'blog_show_author', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_author'],
							));

	$wp_customize->add_control( 'blog_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'beatrix-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'beatrix-lite')
	));
	
	// Show/hide Category
	$wp_customize->add_setting( 'blog_show_cat', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_cat'],
							));

	$wp_customize->add_control( 'blog_show_cat', array(
		'label'    	=> __( 'Show Post Category', 'beatrix-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'beatrix-lite')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'blog_show_tags', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_tags'],
							));

	$wp_customize->add_control( 'blog_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'beatrix-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'beatrix-lite')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'blog_show_comment', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_comment'],
							));

	$wp_customize->add_control( 'blog_show_comment', array(		
		'label'    		=> __( 'Show Post Comment', 'beatrix-lite' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_comment',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post comment.', 'beatrix-lite')
	));

	/***** Category Page Settings *****/
	$wp_customize->add_section( 'cat-sett' , array(
		'title' =>  __( 'Category Page', 'beatrix-lite' ),
		'panel' => 'post_panel',
	));	
	
	
	// Show/hide date
	$wp_customize->add_setting( 'cat_show_date', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_date'],
							));

	$wp_customize->add_control( 'cat_show_date', array(		
		'label'    		=> __( 'Show Post Date', 'beatrix-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'beatrix-lite')
	));

	// Show/hide author
	$wp_customize->add_setting( 'cat_show_author', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_author'],
							));

	$wp_customize->add_control( 'cat_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'beatrix-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'beatrix-lite')
	));

	// Show/hide Category
	$wp_customize->add_setting( 'cat_show_cat', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_cat'],
							));

	$wp_customize->add_control( 'cat_show_cat', array(		
		'label'    		=> __( 'Show Post Category', 'beatrix-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'beatrix-lite')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'cat_show_tags', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_tags'],
							));

	$wp_customize->add_control( 'cat_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'beatrix-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'beatrix-lite')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'cat_show_comment', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_comment'],
							));

	$wp_customize->add_control( 'cat_show_comment', array(		
		'label'    		=> __( 'Show Post Comment', 'beatrix-lite' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_comment',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post comment.', 'beatrix-lite')
	));


	/***** Single Post Settings *****/
	$wp_customize->add_section( 'single-post-sett' , array(
		'title' =>  __( 'Single Post', 'beatrix-lite' ),
		'panel' => 'post_panel',
	));

	
	// Add blog template settings
	$wp_customize->add_setting( 'single_post_fet_img', array(
									'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['single_post_fet_img'],
							));

	$wp_customize->add_control( 'single_post_fet_img', array(		
		'label'    		=> __( 'Show Featured Image.', 'beatrix-lite' ),
		'section'    	=> 'single-post-sett',
		'settings'  	=> 'single_post_fet_img',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show featured image from single post.', 'beatrix-lite')
	));

	
	
	/***** Social Icons Settings *****/
	$wp_customize->add_section( 'wpostheme_general_socials_section', array(
		'title' => __( 'Social Profile', 'beatrix-lite' ),
	));

	// Socials Icons on Header
	$wp_customize->add_setting( 'header_social', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
										'transport'         => 'refresh',
										'default'           => $default_settings['header_social'],
									));

	$wp_customize->add_control( 'header_social', array(
										'label'    		  => __( 'Enable Socials Icons on Header', 'beatrix-lite' ),
										'section' 		  => 'wpostheme_general_socials_section',
										'type'                    => 'checkbox',
									));

	// Socials Icons on Footer
	$wp_customize->add_setting( 'footer_social', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['footer_social'],
									));

	$wp_customize->add_control( 'footer_social', array(
										'label'    		  => __( 'Enable Socials Icons on Footer', 'beatrix-lite' ),
										'section' 		  => 'wpostheme_general_socials_section',
										'type'                    => 'checkbox',
									));

	// Facebook
	$wp_customize->add_setting( 'facebook', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['facebook'],
									));

	$wp_customize->add_control( 'facebook', array(
										'label'    => __( 'Facebook', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Twitter
	$wp_customize->add_setting( 'twitter', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['twitter'],
									));

	$wp_customize->add_control( 'twitter', array(
										'label'    => __( 'Twitter', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',			
									));

	// Linkedin
	$wp_customize->add_setting( 'linkedin', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['linkedin'],
									));

	$wp_customize->add_control( 'linkedin', array(
										'label'    => __( 'Linkedin', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Instagram
	$wp_customize->add_setting( 'instagram', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['instagram'],
									));

	$wp_customize->add_control( 'instagram', array(
										'label'    => __( 'Instagram', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// YouTube
	$wp_customize->add_setting( 'youtube', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['youtube'],
									));

	$wp_customize->add_control( 'youtube', array(
										'label'    => __( 'YouTube', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Behance
	$wp_customize->add_setting( 'behance', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['behance'],
									));

	$wp_customize->add_control( 'behance', array(
										'label'    => __( 'Behance', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Dribbble
	$wp_customize->add_setting( 'dribbble', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['dribbble'],
									));

	$wp_customize->add_control( 'dribbble', array(
										'label'    => __( 'Dribbble', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Pinterest
	$wp_customize->add_setting( 'pinterest', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['pinterest'],
									));

	$wp_customize->add_control( 'pinterest', array(
										'label'    => __( 'Pinterest', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_socials_section',
									));
	

	/***** Footer Settings *****/
	$wp_customize->add_section( 'wpostheme_general_footer_section', array(
		'title' => __( 'Footer Content', 'beatrix-lite' ),			
	));

	// Footer Copyright
	$wp_customize->add_setting( 'copyright', array(
										'sanitize_callback' => 'beatrix_lite_sanitize_clean',
										'default'           => $default_settings['copyright'],
										'transport'         => 'refresh',	
									));

	$wp_customize->add_control( 'copyright', array(
										'label'    => __( 'Footer Copyright', 'beatrix-lite' ),
										'section'  => 'wpostheme_general_footer_section',
									));	
									
	/*
     * View Pro Version Section Control
     */	 
	 
	$wp_customize->add_section(
		'beatrix_pro_section', array(
			'title'    => __( 'View PRO Version', 'beatrix-lite' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_setting(
		'beatrix_pro_control', array(
			'sanitize_callback' => 'esc_html',
		)
	);

	$wp_customize->add_control(
		new Beatrix_Control_Upg(
			$wp_customize, 'beatrix_pro_control', array(
				'section'     => 'beatrix_pro_section',
				'priority'    => 100,
				'options'     => array(
					esc_html__( '- Colorfull posts layouts', 'beatrix-lite' ),					
					esc_html__( '- 5 Post Formats', 'beatrix-lite' ),
					esc_html__( '- 6 Widgets', 'beatrix-lite' ),					
					esc_html__( '- 100+ Google Fonts', 'beatrix-lite' ),					
				),
				'button_url'  => esc_url( 'https://www.wponlinesupport.com/wordpress-themes/beatrix-wordpress-blog-theme/' ),
				'button_text' => esc_html__( 'View PRO Version', 'beatrix-lite' ),
			)
		)
	);									
	
	
}
add_action( 'customize_register', 'beatrix_lite_register_customizer_settings' );
