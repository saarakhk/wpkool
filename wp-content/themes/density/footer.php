	<?php
	/**
	 * The template for displaying the footer.
	 *
	 * Contains the closing of the #content div and all content after
	 *
	 * @package Density
	 */
	$density_footer_section = get_theme_mod('density_footer_section_hideshow','show');
	if ($density_footer_section =='show') { 
	?>
		<!--
		=====================================================
			Footer
		=====================================================
		-->
		<!-- RIGHTPART -->
		<div class="main_rightpart">
			<footer class="density_tm_footer_wrap footer-area clearfix">
				<div class="main_content footer">
					<div class="density_tm_footer_wrap">
						<div class="container">
							<div class="density_tm_list_wrap footer" data-column="3" data-space="40">
								<ul class="density_list">
									<li>
										<div class="footer-widgets">
											<?php dynamic_sidebar('density-footer-widget-area-1'); ?>
										</div>
									</li>
									<li>
										<div class="footer-widgets post-img">
											<?php dynamic_sidebar('density-footer-widget-area-2'); ?>
										</div>
									</li>
									<li>
										<div class="footer-widgets">
											<?php dynamic_sidebar('density-footer-widget-area-3'); ?>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="bottom_wrap clearfix">
					<div class="container">
						<div class="copyright text-center">
							<?php if( get_theme_mod('density-footer_title') ) : ?>
									<p><?php echo wp_kses_post( html_entity_decode(get_theme_mod('density-footer_title'))); ?></p>
								<?php else : 
									/* translators: 1: poweredby, 2: link, 3: span tag closed  */
									printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'density' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'density' ) ) .'" target="_blank">"'. esc_html__('WordPress','density').'".</a>', '</span>' );
									/* translators: 1: poweredby, 2: link, 3: span tag closed  */
									printf( esc_html__( ' Theme: density by: %1$sDesign By %2$s%3$s', 'density' ), '<span>', '<a href="'. esc_url( __( 'http://wordpress.org/', 'density' ) ) .'" target="_blank">"'. esc_html__('wpalter','density').'"</a>', '</span>' );
							endif;  ?>
						</div>
					</div>
				</div>
			</footer>				
		</div>
		<!--
		=====================================================
			Footer End
		=====================================================
		-->
	<?php } wp_footer(); ?>
	<!-- TO TOP -->
	<a class="density_tm_totop">
		<span class="fa fa-long-arrow-up" aria-hidden="true"></span>
		<span class="name"><?php echo esc_html__( 'To Top', 'density' ); ?></span>
	</a>
	<!-- /TO TOP -->
	</div>
</body>
</html>