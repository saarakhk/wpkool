	<?php
	/**
	 * Template part - Service Section of HomePage
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Density
	*/
	 $density_services_title = get_theme_mod('density-services_title');
	 $density_services_section     = get_theme_mod( 'density_services_section_hideshow','hide');
	 // $density_services_section_column = get_theme_mod( 'density_services_section_columnshow','hide');

	$services_no        = 6;
	$services_pages      = array();
	$services_icons     = array();
	for( $i = 1; $i <= $services_no; $i++ ) {
		$services_pages[]    =  get_theme_mod( "density_service_page_$i", 1 );
		$services_icons[]    = get_theme_mod( "density_page_servicebackground_icon_$i", '' );
	}

	$services_args  = array(
	  'post_type' => 'page',
	  'post__in' => array_map( 'absint', $services_pages ),
	  'posts_per_page' => absint($services_no),
	  'orderby' => 'post__in'
	 
	); 
	$services_query = new   wp_Query( $services_args );
	if( $density_services_section == "show" ) :
	?>
  
         
    	<!-- HOME SERVICES-->
      	<div class="main_rightpart">
        	<div class="density_tm_section ptb-100">
        		<div class="container">
					<div class="density_tm_title_holder services_home">
						<?php if($density_services_title != "")   {  ?>
							<h3><span><?php echo esc_html(get_theme_mod('density-services_title')); ?></span></h3>
						<?php } ?>
					</div>
					<?php if($services_query->have_posts()) { ?>
						<div class="density_tm_services_wrap">
							<ul class="density_tm_miniboxes">
								<?php
									$count = 0;
									while($services_query->have_posts()) :
										$services_query->the_post();
								?>
										<li>
										  <div class="inner density_tm_minibox">
											<?php if($services_icons[$count] !="")
												  { ?>
											<span class="service-icon">
											 <i class="fa <?php echo esc_attr($services_icons[$count]); ?> svg" aria-hidden="true"></i>
											</span>
										  <?php } ?>
										   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<?php the_excerpt(); ?>
											  <a href="<?php the_permalink() ?>" class="arrow"> <?php echo esc_html__( 'READ MORE', 'density' ); ?></a>
										  </div>
										</li>
								<?php
									$count = $count + 1;
									endwhile;
									wp_reset_postdata();
								?> 
							</ul>
						</div>
				  	<?php } ?>
        		</div>
        	</div>
    	</div>
        <!-- /HOME SERVICES-->
	<?php endif; ?>