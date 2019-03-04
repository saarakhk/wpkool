	<?php
	/**
	 * // To display Footer Call Out section on front page
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Density
	*/
	$density_callouts_section = get_theme_mod( 'density_callout_section_hideshow','hide');
	$callout_text_value= get_theme_mod( "density_callout_text_value", 1 );
	$callout_subtext_value= get_theme_mod( "density_callout_subtext_value", 1 );
	$callout_button_value= get_theme_mod( "density_callout_button_text", 1 );
  

  
	if( $density_callouts_section == "show" ) :
	?>
		  <!-- HOME CALLOUT -->
		    <div class="main_rightpart">
				<div class="density_tm_section ">
					<div class="density_tm_responsibility_text_wrap bg-theme">
						<div class="container">
							<div class="inner_wrap">
								<div class="left">
								  <?php if($callout_text_value !=""){ ?>
								  <h3><?php echo esc_html(get_theme_mod('density_callout_text_value')); ?></h3>
								  <?php } if($callout_subtext_value !=""){ ?>
								  <p><?php echo esc_html(get_theme_mod('density_callout_subtext_value')); ?></p>
								   <?php } ?>
								</div>
								<div class="right">
									<?php if($callout_button_value !=""){ ?>
								  <div class="density_tm_button_wrap">
									<a href="<?php echo esc_url(get_theme_mod('density_callout_button_url')); ?>" class="colaud-two"><?php echo esc_html(get_theme_mod('density_callout_button_text')); ?></a>
								  </div>
								   <?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    <?php endif; ?>