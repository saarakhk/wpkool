<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Beatrix Lite
 * @since 1.0
 */


$social_footer  = beatrix_lite_get_theme_mod( 'footer_social' );
$facebook 		= beatrix_lite_get_theme_mod( 'facebook' );	
$twitter 		= beatrix_lite_get_theme_mod( 'twitter' );
$linkedin 		= beatrix_lite_get_theme_mod( 'linkedin' );
$behance 		= beatrix_lite_get_theme_mod( 'behance' );	
$dribbble 		= beatrix_lite_get_theme_mod( 'dribbble' );
$instagram 		= beatrix_lite_get_theme_mod( 'instagram' );
$youtube 		= beatrix_lite_get_theme_mod( 'youtube' );
$pinterest 		= beatrix_lite_get_theme_mod( 'pinterest' );
?>

	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">			
		<?php if (is_active_sidebar( 'footer' ) ) { ?>
		<div class="footer-middle-widget-area clearfix">
			<div class="container">					
					<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div>
		<?php } ?>
		<div class="site-info">
			<div class="container">
			<?php if(!empty($social_footer) ) { ?>		
				<div class="beatrix-lite-social-networks beatrix-lite-social-networks-footer">
                        <?php if(!empty($facebook) ) { ?>	
                       		<a href="<?php echo esc_url($facebook); ?>" title="Facebook" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-facebook-icon"><i class="fa fa-facebook"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'facebook', 'beatrix-lite' ); ?></span></a>
						<?php } 
						if(!empty($twitter) ) { ?>	
							<a href="<?php echo esc_url($twitter); ?>" title="Twitter" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-twitter-icon"><i class="fa fa-twitter"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'Twitter', 'beatrix-lite' ); ?></span></a>
						<?php } 
						if(!empty($linkedin) ) { ?>	
							<a href="<?php echo esc_url($linkedin); ?>" title="LinkedIn" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-linkedin-icon"><i class="fa fa-linkedin"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'LinkedIn', 'beatrix-lite' ); ?></span></a>
						<?php } 
						if(!empty($youtube)) { ?>		
							<a href="<?php echo esc_url($youtube); ?>" title="YouTube" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-youtube-icon"><i class="fa fa-youtube"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'YouTube', 'beatrix-lite' ); ?></span></a>				
						<?php } 
						if(!empty($instagram) ) { ?>		
							<a href="<?php echo esc_url($instagram); ?>" title="instagram" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-instagram-icon"><i class="fa fa-instagram"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'instagram', 'beatrix-lite' ); ?></span></a>				
						<?php } 
						if(!empty($behance) ) { ?>		
							<a href="<?php echo esc_url($behance); ?>" title="behance" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-behance-icon"><i class="fa fa-behance"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'behance', 'beatrix-lite' ); ?></span></a>				
						<?php } 

						if(!empty($dribbble) ) { ?>		
							<a href="<?php echo esc_url($dribbble); ?>" title="dribbble" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-dribbble-icon"><i class="fa fa-dribbble"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'dribbble', 'beatrix-lite' ); ?></span></a>				
						<?php } 

						if(!empty($pinterest) ) { ?>		
							<a href="<?php echo esc_url($pinterest); ?>" title="pinterest" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-pinterest-icon"><i class="fa fa-pinterest"></i> <span class="beatrix-lite-social-text"><?php esc_html_e( 'pinterest', 'beatrix-lite' ); ?></span></a>				
						<?php } ?>					
				</div>
			<?php } ?>	
				
			<div class="site-copyright clearfix"> 
				<div class="beatrix-lite-col-<?php echo (has_nav_menu('footer'))?'6':'12'; ?> beatrix-lite-columns copyright"><?php	echo beatrix_lite_footer_copyright(); ?></div>	
				<?php if(has_nav_menu('footer')){ ?>
				<div class="beatrix-lite-col-6 beatrix-lite-columns beatrix-lite-footer-menu-right"><?php  if(has_nav_menu('footer')){ wp_nav_menu( array( 'theme_location' => 'footer','menu_id' => 'footer-menu', 'depth' => 1 ) ); } ?></div>
				<?php } ?>	
			</div>				
		</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav class="mobile-navigation" role="navigation">
<div class="mobile-menu">
<div class="mobile_close_icons"><i class="fa fa-close"></i></div>
	<?php 
	 get_search_form();
	wp_nav_menu( array(
		'container_class' => 'mobile-menu-inner',
		'menu_class'      => 'mobile-menu-inner clearfix',
		'theme_location'  => 'menu-1',
		'items_wrap'      => '<ul>%3$s</ul>',
	) );
	?>
	<?php   $header_social  = beatrix_lite_get_theme_mod( 'header_social' );				  
			$facebook       = beatrix_lite_get_theme_mod( 'facebook' );	
			$twitter        = beatrix_lite_get_theme_mod( 'twitter' );
			$linkedin       = beatrix_lite_get_theme_mod( 'linkedin' );
			$behance        = beatrix_lite_get_theme_mod( 'behance' );	
			$dribbble       = beatrix_lite_get_theme_mod( 'dribbble' );
			$instagram      = beatrix_lite_get_theme_mod( 'instagram' );
			$youtube        = beatrix_lite_get_theme_mod( 'youtube' );
			$pinterest      = beatrix_lite_get_theme_mod( 'pinterest' );			
		?>	 
	<?php if(!empty($header_social) ) { ?>			
                            <div class="beatrix-lite-social-networks beatrix-lite-social-networks-header">
                                    <?php if(!empty($facebook) ) { ?>	
                                            <a href="<?php echo esc_url($facebook); ?>" title="Facebook" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-facebook-icon"><i class="fa fa-facebook"></i></a>
                                    <?php } 
                                    if(!empty($twitter) ) { ?>	
                                            <a href="<?php echo esc_url($twitter); ?>" title="Twitter" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-twitter-icon"><i class="fa fa-twitter"></i></a>
                                    <?php } 
                                    if(!empty($linkedin) ) { ?>	
                                            <a href="<?php echo esc_url($linkedin); ?>" title="LinkedIn" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-linkedin-icon"><i class="fa fa-linkedin"></i></a>
                                    <?php } 
                                    if(!empty($youtube)) { ?>		
                                            <a href="<?php echo esc_url($youtube); ?>" title="YouTube" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-youtube-icon"><i class="fa fa-youtube"></i></a>				
                                    <?php } 
                                    if(!empty($instagram) ) { ?>		
                                            <a href="<?php echo esc_url($instagram); ?>" title="instagram" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-instagram-icon"><i class="fa fa-instagram"></i></a>				
                                    <?php } 
                                    if(!empty($behance) ) { ?>		
                                            <a href="<?php echo esc_url($behance); ?>" title="behance" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-behance-icon"><i class="fa fa-behance"></i></a>				
                                    <?php } 
                                    if(!empty($dribbble) ) { ?>     
                                            <a href="<?php echo esc_url($dribbble); ?>" title="dribbble" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-dribbble-icon"><i class="fa fa-dribbble"></i></a>             
                                    <?php }

                                    if(!empty($pinterest) ) { ?>      
                                            <a href="<?php echo esc_url($pinterest); ?>" title="pinterest" target="_blank" class="beatrix-lite-social-network-icon beatrix-lite-pinterest-icon"><i class="fa fa-pinterest"></i></a>             
                                    <?php } ?>				
                            </div>
                    <?php } ?>	
	</div>
</nav>
<a href="#" class="scroll-to-top hidden"><i class="fa fa-angle-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>
