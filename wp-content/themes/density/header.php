	<?php 
	/**
	 * The header for our theme.
	 *
	 * Displays all of the <head> section 
	 *
	 * @package density
	 */
	?>
	 <!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head> 
	<body <?php body_class(); ?>>

		<!-- WRAPPER ALL -->
		<div class="density_tm_wrapper_all" data-border="none">
			<div class="density_tm_animate_menu"></div>
			<div class="density_tm_short_contact_content"></div>
			<div class="density_tm_short_contact_triangle"></div>
			<div class="density_tm_overlay_window"></div>

			<!-- BORDER -->
			<div class="density_tm_top_border pattern_border"></div>
			<div class="density_tm_left_border pattern_border"></div>
			<div class="density_tm_right_border pattern_border"></div>
			<!-- /BORDER -->

			<div class="wrapper_inner">
			<!-- LEFTPART -->
				<div class="main_leftpart">
					<div class="menubar_wrap">
						<div class="logo_wrap">
							<?php
							 if (has_custom_logo()) :
							?> 
								<span><?php the_custom_logo(); ?></span>
								<?php endif;
								if (display_header_text()==true){ ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<span class="site-title"><?php bloginfo( 'title' ); ?></span><br>
										<span class="site-description"><?php bloginfo( 'description' ); ?>
                                 		</span>
									</a>									
								<?php } ?>
						</div>
						<div class="nav_wrap scrollable">
							<?php wp_nav_menu( array
                                (
								'menu'              => 'primary',
								'container'        => 'ul', 
                                'theme_location'    => 'primary', 
                                'menu_class'        => 'menu', 
                                'items_wrap'        => '<ul>%3$s</ul>',
                                'fallback_cb'       => 'density_wp_bootstrap_navwalker::fallback',
                                'walker'            => new density_wp_bootstrap_navwalker()
                                )); 
                            ?> 

                            
                            <div class="search_wrap">
                            	<?php 
                            $density_general_section = get_theme_mod('density_general_section_hideshow' , 'show');
                            $density_email = get_theme_mod('density-email' );
                            $density_contact = get_theme_mod('density-contact' );
							if ($density_general_section =='show') { 
                            ?>
								<div class="search_inner">
									<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post">
										<div class="search">
											<input type="search" id="s" name="s" placeholder="<?php echo esc_attr__('Search','density') ?>">
											<button type="submit" class="search-button">
											<span class="fa fa-search"></span></button>
										</div>
									</form>
								</div>
							<?php } ?>
								<div class="header_link">
									<ul>
										<?php if ($density_email !='') {  ?>
										<li class="marg"><i class="fa fa-envelope"></i><?php echo esc_html(get_theme_mod('density-email')); ?></li>
										<?php } if ($density_contact !='') { ?>
										<li class="marg"><i class="fa fa-phone"></i><?php echo esc_html(get_theme_mod('density-contact')); ?></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<?php
						$density_social_section = get_theme_mod('density_social_section_hideshow' , 'show');
						if ($density_social_section =='show') { 
							$density_social_link_1 = get_theme_mod('density_social_link_1');
							$density_social_link_2 = get_theme_mod('density_social_link_2');
							$density_social_link_3 = get_theme_mod('density_social_link_3');
							$density_social_link_4 = get_theme_mod('density_social_link_4');
							$density_social_link_5 = get_theme_mod('density_social_link_5');
				
					?>
							<div class="short_info_wrap pattern-two">
								<div class="pattern"></div>
								<div class="content">
									<div class="social_wrap">
										<ul>
											<?php
												if (!empty($density_social_link_1)) { 
											?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_1')); ?>" class="hover-blue">
															<i class="fa fa-facebook" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_2)) { ?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_2')); ?>" class="hover-blue">
															<i class="fa fa-twitter" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_3)) { 
											?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_3')); ?>" class="hover-blue">
															<i class="fa fa-instagram" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_4)) { 
											?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_4')); ?>" class="hover-blue">
															<i class="fa fa-pinterest" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_5)) { ?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_5')); ?>" class="hover-blue">
															<i class="fa fa-linkedin" aria-hidden="true"></i>
														</a>
													</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						<?php } 
							else { echo ""; } ?>
				</div>
			<!-- /LEFTPART -->
			
				<div class="density_tm_mobile_menu_wrap">
					<div class="topbar_wrap">
						<div class="inner_wrap">
								<?php
							$density_social_section = get_theme_mod('density_social_section_hideshow' , 'show');
							if ($density_social_section =='show') { 
								$density_social_link_1 = get_theme_mod('density_social_link_1');
								$density_social_link_2 = get_theme_mod('density_social_link_2');
								$density_social_link_3 = get_theme_mod('density_social_link_3');
								$density_social_link_4 = get_theme_mod('density_social_link_4');
								$density_social_link_5 = get_theme_mod('density_social_link_5');
					
							?>
								<div class="social_wrap">
										<ul>
											<?php
												if (!empty($density_social_link_1)) { 
											?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_1')); ?>" class="hover-blue">
															<i class="fa fa-facebook" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_2)) { ?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_2')); ?>" class="hover-blue">
															<i class="fa fa-twitter" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_3)) { 
											?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_3')); ?>" class="hover-blue">
															<i class="fa fa-instagram" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_4)) { 
											?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_4')); ?>" class="hover-blue">
															<i class="fa fa-pinterest" aria-hidden="true"></i>
														</a>
													</li>
											<?php } 
												if (!empty($density_social_link_5)) { ?>
													<li>
														<a href="<?php echo esc_url(get_theme_mod('density_social_link_5')); ?>" class="hover-blue">
															<i class="fa fa-linkedin" aria-hidden="true"></i>
														</a>
													</li>
											<?php } ?>
										</ul>
									</div>
							<?php } 
								else{ echo ""; } 
							?>
						</div>
						<div class="bg"></div>
					</div>
					<div class="hamburger_wrap">
						<div class="logo_wrap mobile">
							<?php
								if (has_custom_logo()) :
							?> 
								<span><?php the_custom_logo(); ?></span>
							<?php  
								endif; 
							if (display_header_text()==true){ ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="">
									<span class="site-title"><?php bloginfo( 'title' ); ?></span></a>
							<?php } ?>
						</div>
						<div class="trigger_wrap">
							<div class="hamburger hamburger--collapse-r">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- MENU LIST -->
					<div class="menu_list_wrap">
						<?php wp_nav_menu( array
							(
							'menu'              => 'primary',
							'container'        => 'ul', 
							'theme_location'    => 'primary', 
							'menu_class'        => 'menu', 
							'items_wrap'        => '<ul class="nav">%3$s</ul>',
							'fallback_cb'       => 'density_wp_bootstrap_navwalker_mobile::fallback',
							'walker'            => new density_wp_bootstrap_navwalker_mobile()
							)); 
                        ?>   
					</div>
					<!-- /MENU LIST -->
				</div>
				