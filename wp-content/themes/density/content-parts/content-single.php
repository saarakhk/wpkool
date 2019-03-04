<?php
/**
 * @package Density
 */
?>	

		<div class="inner">
			<?php if(has_post_thumbnail()) : ?>
				<div class="image">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full');?></a>
				</div>
				<?php endif; ?>
				<div class="definitions_wrap">
					<div class="title_holder">
						<h3><?php the_title(); ?></h3>
					</div>
					<div class="info_wrap">
						<div class="short_info">
						<span class="date"><span class="fa fa-calendar" aria-hidden="true"></span> <?php echo esc_html( get_the_date() ); ?></span>
						<span class="by">
							<span class="fa fa-user" aria-hidden="true"></span>
								<span class="extra"><?php echo esc_html__( 'By', 'density' ); ?></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="date anch"> <?php the_author(); ?></a>
							</span>
						<span class="category">
							<span class="fa fa-comment-o" aria-hidden="true"></span> <?php comments_number( __('0 comments', 'density'), __('1 comments', 'density'), __('% comments', 'density') ); ?>
						</span>
						<span class="tags">
							<?php if (has_tag()) : ?>
							<span class="fa fa-tag" aria-hidden="true"></span> 
								<span class="extra">
                                    <?php
                                       $seperator = ''; // blank instead of comma
                                    ?>
                                    <?php echo esc_html__(' ', 'density' ); ?><?php the_tags( $seperator,', &nbsp;'); ?>
                                <?php endif; ?>
                            </span>
						</span>
					</div>
					
					<?php
                    wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'density' ),
                    'after'  => '</div>',
                    ) );
                ?>						
					</div>
					<div class="text clearfix">
						<?php the_content(); ?>
					</div>					
				</div>
				<!-- Comment Wrapper -->				
			</div>