<?php
$density_view_demo = esc_html( __( 'View Demo', 'density'));
$density_upgrade_to_pro = esc_html( __( 'Upgrade To Pro', 'density' ));

 
function density_theme_page() {
	$title = esc_html(__('density Theme','density'));
	add_theme_page( 
		esc_html(__( 'Upgrade To Density Pro','density')),
		$title.'', 
		'edit_theme_options',
		'density_upgrade',
		'density_display_upgrade'
	);
}

add_action('admin_menu','density_theme_page');


function density_display_upgrade() {
  $theme_data = wp_get_theme('density'); 
    
    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    } 
     
    $pro_theme_url = 'http://wpalter.com/product/pro-detail/';
    $pro_theme_demo = 'http://wpalter.com/product/pro-detail/';
    $doc_url  = 'http://wpalter.com/docs/density-documentation/index.html';
    $support_url = 'https://wordpress.org/support/theme/density';   
    $rating_url = 'https://wordpress.org/support/theme/density/reviews/?filter=5';   
    
    $current_action_link =  admin_url( 'themes.php?page=density_upgrade&tab=pro_features' ); ?>
    <style>
	.about-wrap .about-text {
		margin: 0em 0px 0em 0  !important;;
		margin-bottom: 25px !important;
		min-height: 60px;
		color: #555d66;
	}
	.about-wrap {		
		max-width: 1200px;	
	}
	</style>
	<div class="construction-zone-wrapper about-wrap">
        <h1><?php printf(esc_html__('Welcome to %1$s - Version %2$s', 'density'), $theme_data->Name ,$theme_data->Version ); ?></h1><?php
       	printf( __('<div class="about-text"> Density is wordpress theme useful for startups business, company, corporate, consultancy. Theme is also tested latest version of WordPress. Theme is  Theme can be customize in an easy way.  The theme is fully editable because this is built on WordPress customizer. Theme is useful for digital agency, corporate startups and any type of company. The theme is free for use so lets start to build beautiful website. Vertical menu is best feature of this theme . Theme have consists features like mobile Responsive. Theme is Gutenberg ready. Support is superior from our side. Theme is WooCommerce ready and Translation Ready which support RTL erady.  Google Fonts are awesome. Some of the many customizable aspects include: Layouts / Header elements (Email Address , Contact Number), Featured images, Colors ,Post metas, Widgets areas, Homepage elements, Slider, Latest Blog, About Block, services, Call To Action Socials and much more. It’s a multi-purpose & beautiful theme suitable for Digital Market / Digital Agency / Online Business / Affiliate Market / App Landing Page / Software Landing Page and for more. We use WordPress customizer for it. Theme have vertical menus these give a unique touch to the theme. See Demo - http://wpalter.com/density-free See Docs- http://wpalter.com/docs/density-documentation/index.html 
', 'density') ); ?>
       <p class="upgrade-btn"><a class="upgrade" href="<?php echo esc_url($pro_theme_url); ?>" target="_blank"><?php printf( __( 'Upgrade To %1s Pro', 'density'), $theme_data->Name ); ?></a></p>
       <p class="upgrade-btn"><a class="upgrade upgrade-btm" href="<?php echo esc_url($pro_theme_url); ?>" target="_blank"><?php printf( __( 'Premium Demo', 'density'), $theme_data->Name ); ?></a></p>

	   <h2 class="nav-tab-wrapper">
	        <a href="?page=density_upgrade" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
<a href="?page=density_upgrade&tab=pro_features" class="nav-tab<?php echo $tab == 'pro_features' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'PRO Features', 'density' );  ?></a>
            <a href="?page=density_upgrade&tab=free_vs_pro" class="nav-tab<?php echo $tab == 'free_vs_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free VS PRO', 'density' ); ?></a>
	        <?php do_action( 'density_admin_more_tabs' ); ?>
	    </h2>      

        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Customizer', 'density' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'density'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'density'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Documentation', 'density' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'density'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url($doc_url); ?>" target="_blank" class="button button-secondary"><?php esc_html_e(' Documentation', 'density'); ?></a>
                            </p>
                            <?php do_action( 'density_dashboard_theme_links' ); ?>
                        </div>  
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'density' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through Genex free support ticket system.', 'density'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($support_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Create a support ticket', 'density'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
						 <div class="theme_link">
                            <h3><?php esc_html_e( 'Please Rate Us', 'density' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('We need your help to expand or and portoflio so please rate us on wordpress ', 'density'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($rating_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Rate This Theme', 'density'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
                       
                    </div>  
                    <div class="theme_info_right">
                        <?php echo sprintf ( '<img src="'. get_template_directory_uri() .'/screenshot.png" alt="%1$s" />',__('Theme screenshot','density') ); ?>
                    </div>
                </div> 
            </div>
        <?php } ?>
	
        <?php if ( $tab == 'pro_features' ) { ?>
            <div class="pro-features-tab info-tab-content">
			 
				<div class="wrap clearfix">
			   <div class="one-third column clear">
<div class="icon-wrap"><i class="fa  fa-5x fa-cog"></i></div>
	<h3><?php echo esc_html(__( '3 Home Pages', 'density' )); ?></h3>
	<p><?php echo esc_html(__('Theme consits 3 Home page designs. You can choose anyone its your choice.', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th-large"></i></div>
	<h3><?php echo esc_html(__( '2 Header Preset', 'density' )); ?></h3>
	<p><?php echo esc_html(__('Theme have 2 tytpes of header preset so you can change and select your header design', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th"></i></div>
	<h3><?php echo esc_html(__( 'Maga Menu Support', 'density' )); ?></h3>
	<p><?php echo esc_html(__( 'Theme support Mega Menu So you can show navigation in great look.', 'density' )); ?></p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-envelope"></i></div>
	<h3><?php echo esc_html(__( 'Contact Form 7', 'density' )); ?></h3>
	<p><?php echo esc_html(__( 'Munix Pro support contact form 7 that mean you can easily add your contact form with theme design ', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-list-alt"></i></div>
	<h3><?php echo esc_html(__( 'Projects Page', 'density' )); ?> </h3>
	<p><?php echo esc_html(__( 'Theme have amazing Projctes design Grid+ Masonry with you can use 2, 3, or 4 Columns layouts!', 'density' )); ?> </p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-font"></i></div>
	<h3><?php echo esc_html(__( 'Typography', 'density' )); ?></h3>
	<p><?php echo esc_html(__('Theme loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!', 'density' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3><?php echo esc_html(__( 'Unlimitd Image Slides', 'density' )); ?></h3>
	<p><?php echo esc_html(__('Theme includes Flex slider . You can add unlimited slides on your home page', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-user"></i></div>
	<h3><?php echo esc_html(__( 'Team Page', 'density' )); ?></h3>
	<p><?php echo esc_html(__('You can add unlimited team members with team deatil page and also display their social profiles ', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3><?php echo esc_html(__( 'Retina Ready', 'density' )); ?></h3>
	<p><?php echo esc_html(__( 'Theme is Retina Ready. So, Everything looks amazingly sharp and crisp on high resolution retina displays of all sizes!', 'density' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-dashboard"></i></div>
	<h3><?php echo esc_html(__( 'Awesome Icons', 'density' )); ?></h3>
	<p><?php echo esc_html(__( ' Choose from over 2500+ icons are fully integrated into the theme ', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3><?php echo esc_html(__( 'Excellent Support', 'density' )); ?></h3>
	<p><?php echo esc_html(__( 'We truly care about our customers and themes performance. We assure you that you will get the best after sale support like never before!', 'density' ));
 ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-desktop"></i></div>
	<h3><?php echo esc_html(__( 'Responsive Layout', 'density' )); ?></h3>
	<p><?php echo esc_html( __('Theme is fully responsive and can adapt to any screen size. Resize your browser window to view it!', 'density' )); ?></p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-rocket"></i></div>
	<h3><?php echo esc_html( __( 'Testimonials', 'density' ));?></h3>
	<p><?php echo  esc_html( __( 'Display your clients\' glowing comments about your business on your homepage. Showing a specific number of testimonials with use of testimonial widget. ', 'density' ));?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-skype"></i></div>
	<h3><?php echo esc_html( __( 'Social Media', 'density' )); ?></h3>
	<p><?php echo esc_html( __( 'Want your users to stay in touch? No problem, Theme has Social Media icons all throughout the theme!', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-map-marker"></i></div>
	<h3><?php echo esc_html( __( 'Add Timeline', 'density' )); ?></h3>
	<p><?php echo esc_html( __('This Theme includes Timeline shortcode, So you can easily display your company history to your visitors or  your clients', 'density' )); ?></p>
</div>

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-edit"></i></div>
	<h3><?php echo esc_html( __( 'Customization', 'density' )); ?></h3>
	<p><?php echo esc_html( __('With advanced theme options, page options & extensive docs, its never been easier to customize a theme!', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-check"></i></div>
	<h3><?php echo esc_html( __( 'Demo content', 'density' )); ?></h3>
	<p><?php echo esc_html( __('Theme includes single click demo content. You can quickly setup the site like our demo and get started easily!', 'density' )); ?></p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-signal"></i></div>
	<h3><?php echo esc_html( __( 'Improvement', 'density' )); ?></h3>
	<p><?php echo esc_html( __('We love our theme and customers. We are committed to improve and add new features to Theme!', 'density' )); ?></p>
</div>

				</div>
			</div><?php   
		} ?>  

       <!-- Free VS PRO tab -->
        <?php if ( $tab == 'free_vs_pro' ) { ?>
            <div class="free-vs-pro-tab info-tab-content">
	            <div id="free_pro">
	                <table class="free-pro-table">
		                <thead>
			                <tr>
			                    <th></th>  
			                    <th><?php echo esc_html($theme_data->Name); ?> Lite</th>
			                    <th><?php echo esc_html($theme_data->Name); ?> PRO</th>
			                </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td><h3><?php _e('Responsive Design', 'density'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                        <td><h3><?php _e('Support', 'density'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>		                    
		                    <tr>
		                        <td><h3><?php _e('Custom Logo Option', 'density'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                         <td><h3><?php _e('Social Links', 'density'); ?></h3></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('Unlimited color option', 'density'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('2 Home page', 'density'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	 <td><h3><?php _e('Header Presets', 'density'); ?></h3></td>
		                    	 <td class="only-pro"><?php _e('1', 'density'); ?></td>
		                    	 <td class="only-lite"><?php _e('4', 'density'); ?></td>
		                    </tr>	
		                     <tr>
		                    	 <td><h3><?php _e('Pre Defined Page Templates', 'density');?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('4 Portfolio Presets', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Team With Detail Page', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Redux Theme Option Panel', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr> 
							 
							<tr>
		                    	<td><h3><?php _e('Sticky Header Option', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Contact Form 7', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('15+ Shortcodes', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Google Fonts', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 
		                     <tr>
		                    	<td><h3><?php _e('Multiple Service Layouts', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	<td><h3><?php _e('Team Page', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Multiple Blog Layouts', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Page Animation', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Premium Priority Support', 'density');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    
		                    <tr class="ti-about-page-text-center">
		                        <td><a href="<?php echo esc_url($pro_theme_demo); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( '%1s Pro Demo', 'density'), $theme_data->Name ); ?></a></td>
		                    	<td colspan="2"><a href="<?php echo esc_url($pro_theme_url); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( 'Upgrade To %1s Pro', 'density'), $theme_data->Name ); ?></a></td>
		                    </tr>
		                </tbody>
	                </table>			    
				</div>
			</div><?php 
		} ?>

    </div><?php
} ?>
