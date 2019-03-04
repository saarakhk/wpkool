	<?php 
	// To display The Content section on front page
	if(have_posts()) : 
		while(have_posts()) : the_post();  
			if(get_the_content()!= "")
			{
			?>
				<!-- RIGHTPART -->
				<div class="main_rightpart">
					<section class="section-content section-spacing">
						<div class="container">
							<?php the_content(); ?> 
						</div> 
					</section>
				</div>	
			<?php 
			}	
		endwhile;
	endif; ?>