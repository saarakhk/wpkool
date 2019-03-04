<?php 
//breadcrump function
if( !function_exists('density_breadcrumbs') ):
function density_breadcrumbs() { 
?>
	<div class="density_tm_section">
		<div class="top-wapper">
			<div class="inner-wapper">
				<div class="container ">
					<div class="wapper-section">
						<?php if (is_home() || is_front_page()) { ?>						
							<h3 class="sub-title"><?php echo esc_html__('Blog','density') ?></h3>
						<?php } else { ?>
							<h3 class="sub-title"><?php wp_title(''); ?></h3>					
						<?php } ?>								
						<div class="breadcrumbs clearfix">
							<ul>
								<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo esc_html__( 'Home', 'density' ); ?></a>  <span class="fa fa-angle-right shift" aria-hidden="true"></span></li>
								<li><span><?php wp_title(''); ?></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }
endif; ?>