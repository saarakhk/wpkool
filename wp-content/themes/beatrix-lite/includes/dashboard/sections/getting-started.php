<?php
/**
 * Display Welcome page Getting started section.
 *
 * @package Beatrix Lite
 * @since 1.0
 * 
 */
$pro_ver_url = 'https://www.wponlinesupport.com/wordpress-themes/beatrix-wordpress-blog-theme/'; 
$prodemo_ver_url = 'http://demo.wponlinesupport.com/themes/beatrix/';  
?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
    <div class="feature-section two-col">
        <div class="col">
                <h3><?php esc_html_e( 'Customize The Theme', 'beatrix-lite' ); ?></h3>
                <p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'beatrix-lite' ); ?></p>
                <p>
                        <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'beatrix-lite' ); ?></a>
                </p>

		<h3><?php esc_html_e( 'Upgrade to PRO version', 'beatrix-lite' ); ?></h3>
			<p><?php esc_html_e( 'Upgrade to PRO version and get lots of options.', 'beatrix-lite' ); ?></p>
			<ul class="feature-section-pro">
				<li><?php _e( '<strong>- Colorfull posts layouts</strong>', 'beatrix-lite' ); ?></li>				
				<li><?php _e( '<strong>- 5 Post Format : </strong>Theme comes with Video, Audio, Quote and Gallery post formats.', 'beatrix-lite' ); ?></li>
				<li><?php _e( '<strong>- 6 Widgets : </strong> Added WordPress Post Slider Widget, Post List / Slider, Recent Posts (Image left side and Content right side), News Page Designer, Social Icons, Trending and Featured post widgets.', 'beatrix-lite' ); ?></li>				
				<li><?php _e( '<strong>- Google Fonts : </strong>100+ google fonts added', 'beatrix-lite' ); ?></li>
			</ul>
			<p>
				<a href="<?php echo esc_url( $pro_ver_url ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Buy PRO Version', 'beatrix-lite' ); ?></a>
				<a href="<?php echo esc_url( $prodemo_ver_url ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'View PRO Demo', 'beatrix-lite' ); ?></a>
				
			</p>				
        </div>

        <div class="col">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg" alt="<?php esc_attr_e( 'screenshot', 'beatrix-lite' ); ?>">
        </div>
    </div>
</div>