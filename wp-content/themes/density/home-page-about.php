	<?php
	/**
	 * // To display About Us section on front page
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Density
	*/
		$density_abouts_section = get_theme_mod( 'density_about_section_hideshow','hide');
		$density_about_title = get_theme_mod( 'density-about_title');
		$about_no        = 1;
		$about_pages      = array();
		$about_icons     = array();
			for( $i = 1; $i <= $about_no; $i++ ) {
				$about_pages[]    =  get_theme_mod( "density_about_page_$i", 1 );
			}

			$about_args  = array(
				'post_type' => 'page',
				'post__in' => array_map( 'absint', $about_pages ),
				'posts_per_page' => absint($about_no),
				'orderby' => 'post__in'
				 
			); 
			$about_query = new wp_Query( $about_args );
		if( $density_abouts_section == "show") :
		?>

			<div class="main_rightpart">
				<div class="density_tm_section ptb-100">					
							<div class="container">
								<div class="density_tm_title_holder services_home">
									<?php if($density_about_title!=''){ ?>
										<h3><span><?php echo esc_html($density_about_title); ?></span></h3>
									<?php } ?>
								</div>
								<?php if($about_query->have_posts()){ ?>
									<?php
										$count = 0;
										while($about_query->have_posts()) :
										$about_query->the_post();
									?>
											<div class="density_tm_universal_wrap">
												<div class="leftbox about-type-two">
													<div class="text">
														<h3><?php the_title(); ?></h3>
														<?php the_excerpt(); ?>
													</div>
												</div>
												<div class="rightbox">
													<div class="about_wrap">
														<?php the_post_thumbnail('full'); ?>
													</div>
												</div>
											</div>
									<?php
										$count = $count + 1;
										endwhile;
										wp_reset_postdata();
									?> 
									<?php } ?>
								</div>
					
				</div>
			</div>
		<?php endif; ?>
