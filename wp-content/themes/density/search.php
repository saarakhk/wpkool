	<?php
	/**
	 * The main template file.
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page.
	 * Learn more: http://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Density
	*/
	 get_header(); 
	 ?>
        <!-- RIGHTPART -->
        <div class="main_rightpart">            
            <div class="density_tm_section">
                <div class="top-wapper">
                    <div class="inner-wapper">
                        <div class="container ">
                            <div class="wapper-section">
                                 <?php if ( have_posts() ) : ?>
                                    <h3 class="sub-title"><?php 
                                /* translators: %s: search term */
                                printf( esc_html__( 'Search Results for: %s', 'density' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
                                   <?php else : ?>
                                   <h3 class="sub-title"><?php
                                /* translators: %s: nothing found term */
                                printf( esc_html__( 'Nothing Found for: %s', 'density' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
                                <?php endif; ?>                              
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
			<div class="density_tm_section pt-100">
                <div class="container">
                    <div class="density_tm_blog_wrap">
                        <div class="density_tm_twicebox_wrap">
                            <div class="leftbox">
                                <div class="blog_list_wrap">
                                    <ul>
                                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
											<li>
                                               <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <?php get_template_part('content-parts/content', get_post_format()); ?>
                                            </li>
                                        <?php endwhile;
                                              else :
                                                   get_template_part( 'content-parts/content', 'none' );
                                              endif; 
										?>
                                        <div class="density_tm_section">
                                            <div class="container">
                                                <div class="density_tm_pagination">
													<?php the_posts_pagination(
													array(
													'prev_text' =>esc_html__('&laquo;','density'),
													'next_text' =>esc_html__('&raquo;','density')
													 )
													 ); ?>
                                                </div>
                                            </div>
                                        </div>  
                                    </ul>
                                </div>
                            </div>
							<div class="rightbox">
								<div class="density_tm_request_estimate_wrap">
									<?php get_sidebar(); ?>                                     
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <?php get_footer(); ?>