<?php
/**
 * 
 * Template part for including posts design formate wise
 * @link https://codex.wordpress.org/Template_Hierarchy
 * 
 * @package Beatrix Lite
 * @since 1.0 
 * 
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         
		<div class="beatrix-lite-post-grid-content <?php if ( !has_post_thumbnail() ) { echo 'no-thumb-image'; } ?>">
			<div class="beatrix-lite-col-6 beatrix-lite-columns">
				<header class="entry-header">
					
						<?php if (is_sticky()) : ?>
										<span class="sticky-label"><i class="fa fa-thumb-tack"></i><span class="sticky-label-text"><?php esc_html_e('Featured', 'beatrix-lite'); ?></span></span>
						<?php endif; ?>
					   
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
								
						<?php if ( 'page' !== get_post_type() ) { beatrix_lite_posted_on(); }  ?>
						
								
				</header><!-- .entry-header -->
			</div>
			<div class="beatrix-lite-col-6 beatrix-lite-columns padding-right">
				<div class="beatrix-lite-post-image-bg">  
					<?php get_template_part( 'template-parts/content', 'media' ); ?>
				</div>				
				<div class="entry-summary">
					<?php  the_excerpt(); ?>						
				</div><!-- .entry-summary -->
				<div class="link-more"><a href="<?php echo esc_url( get_permalink()); ?>" class="more-link"><?php echo esc_html__( 'Continue reading &#10142;', 'beatrix-lite' ); ?></a></div>					
				</div>
			</div>
    
</article><!-- #post-## -->