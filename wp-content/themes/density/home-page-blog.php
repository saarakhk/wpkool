	<?php
	/**
	 * // To display Blog Post section on front page
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Density
	*/
	 $density_blog_title = get_theme_mod('density-blog_title');
	 $density_blog_section     = get_theme_mod( 'density_blog_section_hideshow','show');
	 
		if ($density_blog_section =='show') { 
		?>

			<!-- HOME BLOG -->
			<div class="main_rightpart">
				<div class="density_tm_section bg-gray ptb-100 pb-70">
					<div class="density_tm_home_blog_wrap">
						<div class="container">
							<div class="density_tm_title_holder services_home">
								<?php if($density_blog_title != "")   {  ?>
									<h3><span><?php echo esc_html(get_theme_mod('density-blog_title')); ?></span></h3>
								<?php } ?>
							</div>
							<div class="inner_wrap">
								<div class="list_wrap">
									<ul>
										<?php 
											$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
											if ( $latest_blog_posts->have_posts() ) : 
												while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
										?>
														<li>
															<div class="inner">
																<div class="image_wrap">
																	<?php the_post_thumbnail('full'); ?>
																		<a href="<?php the_permalink(); ?>">
																			<div class="image"></div>
																		</a>
																</div>
																<div class="definition_wrap">
																	<div class="inner-des-blog">
																		<div class="date_wrap">
																			<a><span class="fa fa-calendar" aria-hidden="true"></span><?php echo esc_html( get_the_date() ); ?></a>
																			<span class="fa fa-user" aria-hidden="true"></span><span><?php echo esc_html__( 'By', 'density' ); ?></span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="margin"> <?php the_author(); ?></a>
																		</div>
																		
																		<div class="title_holder">
																			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
																			<?php the_excerpt(); ?>
																		</div>
																	</div>
																</div>
															</div>
														</li>
												<?php endwhile; 
											endif; ?>						
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        <!-- /HOME BLOG -->

    <?php } ?>