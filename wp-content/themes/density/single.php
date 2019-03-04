	<?php
	/**
	 * The template for displaying all single posts.
	 *
	 * @package Density
	*/
	 get_header(); 
	 ?>
		<div class="main_rightpart">
			<?php density_breadcrumbs(); ?>
			<div class="density_tm_section ptb-100">
				<div class="container">
					<div class="density_tm_blog_wrap">
						<div class="density_tm_twicebox_wrap">
							<div class="leftbox">
								<div class="blog_list_wrap mb-50">
									<ul>
										<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>											
										<li>
											<?php  get_template_part( 'content-parts/content', 'single' ); ?>
										</li>
										<?php endwhile; ?>
				                        <?php else :  
				                            get_template_part( 'content-parts/content', 'none' );
				                        endif; ?>
									</ul>
								</div>									
								<!-- Comment Wrapper -->
								<div class="co-comment-wrapper">
										<?php 
				                            if ( comments_open() || get_comments_number() ) :
				                                    comments_template();
				                            endif; 
				                        ?> 					
								</div>
							</div>
							<div class="rightbox">
								<?php get_sidebar(); ?>	
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php get_footer(); ?>