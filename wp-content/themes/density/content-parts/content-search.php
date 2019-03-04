<?php
/**
 * @package Density
 */
?>  
		
    <div class="inner">
      <?php if(has_post_thumbnail()) : ?>
        <div class="image">
          <a href="<?php the_permalink(); ?>">
            <?php 
              the_post_thumbnail('full');
            ?>
          </a>
        </div>
      <?php endif; ?>
		<div class="definitions_wrap">
            <div class="title_holder">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </div>
            <div class="info_wrap">
                <div class="short_info">
					<span class="date"><span class="fa fa-calendar" aria-hidden="true"></span> <?php echo esc_html( get_the_date() ); ?>
					</span>
					<span class="by"><span class="fa fa-user" aria-hidden="true"></span> 
						<span class="extra"><?php echo esc_html__( 'By', 'density' ); ?></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="date anch"> <?php the_author(); ?></a>
					</span>
					<span class="category"><span class="fa fa-comment-o" aria-hidden="true"></span> <?php comments_number( __('0', 'density'), __('1', 'density'), __('%', 'density') ); ?>
					</span>
					<span class="tags">
						<?php if (has_tag()) : ?>
							<span class="fa fa-tag" aria-hidden="true"></span> 
							<span class="extra">
								<?php
									$seperator = ''; // blank instead of comma
									echo esc_html__(' ', 'density' ); 
									the_tags( $seperator,', &nbsp;'); 
								?>
							</span>
						<?php endif; ?>
					</span>
				</div>
			</div>
			<div class="text clearfix">
			  <?php the_excerpt(); ?>
			</div>
			<div class="continue">
			  <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Continue Reading', 'density' ); ?></a>
			</div>
		</div>
    </div>



