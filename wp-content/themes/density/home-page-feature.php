	<?php
	/**
	 * Template part - HomePage Feature
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Density
	*/
	$density_features_section = get_theme_mod( 'density_features_section_hideshow','hide');
	$feature_no        = 6;
	$feature_pages      = array();
	$feature_icons     = array();
	for( $i = 1; $i <= $feature_no; $i++ ) {
		$feature_pages[]    =  get_theme_mod( "density_feature_page_$i", 1 );
		$features_icons[]    = get_theme_mod( "density_page_feature_icon_$i", '' );
	}
	$feature_args  = array(
		  'post_type' => 'page',
		  'post__in' => array_map( 'absint', $feature_pages ),
		  'posts_per_page' => absint($feature_no),
		  'orderby' => 'post__in'
		 
	); 
	$feature_query = new wp_Query( $feature_args );
	if( $density_features_section == "show" && $feature_query->have_posts() ) :
	?>

	  <!-- HIGHLIGHTS -->
		<div class="main_rightpart">
			<div class="density_tm_section">
				<div class="density_tm_highlights_wrap theme-overlay" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
					<div class="container">
						<div class="inner_wrap">
							<ul>
								<?php
								$count = 0;
								while($feature_query->have_posts()) :
								$feature_query->the_post();
								?>
									<li>
										<div class="inner">
											<div class="title_holder">
												<?php if($features_icons[$count] !="")
												  { ?>
												<div class="shape">
												  <span class="fa <?php echo esc_attr($features_icons[$count]); ?>" aria-hidden="true"></span>
												</div>
												<?php } ?>
												<div class="definition">
												  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												  	 <?php the_excerpt(); ?>
												</div>
											</div>
										</div>
									</li>                  
								<?php
								$count = $count + 1;
								endwhile;
								wp_reset_postdata();
								?> 
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- /HIGHLIGHTS -->
<?php endif; ?>