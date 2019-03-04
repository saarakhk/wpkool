	<?php
	/**
	 * Template Name: Full-width
	 *
	 * Description: Use this page template to remove the sidebar from any page.
	 * @package Density
	 */
	?>
	<?php
	  get_header(); 
	?>

		<!-- RIGHTPART -->
		<div class="main_rightpart">
			<?php density_breadcrumbs(); ?>
            <div class="density_tm_section pt-100">
                <div class="container">
                    <div class="density_tm_service_single_wrap">
                        <div class="density_tm_twicebox_wrap">
                            <div class="leftbox">
                                <div class="main_image_wrap">
                                    <?php if(have_posts()) : ?>
										<?php while(have_posts()) : the_post(); ?>
											<div class="image_wrap">
												<?php if(has_post_thumbnail()) : ?>
													<?php the_post_thumbnail('full'); ?>
												<?php endif; ?>
											</div>
											<div class="image_definition">
												<?php
													the_content(); 
												?>
												<?php
													wp_link_pages( array(
													'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'density' ),
													'after'  => '</div>',
													) );
                                        endwhile; ?>                                         
												<?php else :  
												get_template_part( 'content-parts/content', 'none' );
                                    endif; ?>
                                    <!-- Comment Wrapper -->
											 <div class="co-comment-wrapper">
											<?php 
					                            if ( comments_open() || get_comments_number() ) :
					                                    comments_template();
					                            endif; 
					                        ?> 
					
											</div>
										</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
	<?php get_footer(); ?>