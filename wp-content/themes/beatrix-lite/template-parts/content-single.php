<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beatrix Lite
 * @since 1.0 
 * 
 */
 
 $single_post_fet_img 	= beatrix_lite_get_theme_mod( 'single_post_fet_img' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<?php if($single_post_fet_img) { ?>
		<?php get_template_part( 'template-parts/content', 'media' ); ?>
         <?php } ?>
    
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php beatrix_lite_posted_on( array('post_date', 'author', 'category') ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beatrix-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<div class="entry-meta entry-footer-meta">
		<?php beatrix_lite_posted_on( array('tag') );
		if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			}	?>
	</div><!-- .entry-meta -->

	<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<div class="author">
			<div class="author__content">
				<div class="avatar">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
				</div>
				<div class="info">
					<h3><span><?php esc_html_e( 'Posted by ','beatrix-lite' ) ?></span><?php the_author(); ?></h3>
                                        <div class="author-description"><?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?></div>
					<div class="link-more"><a class="more-link"  href="<?php echo get_author_posts_url( esc_url(get_the_author_meta( 'ID' )), get_the_author_meta( 'user_nicename' ) ); ?>"><?php esc_html_e( 'All Posts &#10142;', 'beatrix-lite'); ?></a></div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<footer class="entry-footer">
		<?php beatrix_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->