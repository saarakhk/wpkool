<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Density
 * @since Density 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

	if ( post_password_required() ) {
    return;
	}
	if ( have_comments() ) : ?>
		<div class="inner-box comment-area">
			<div class="theme-title-one">
				<h4>
					<?php
						$comments_number = get_comments_number();
						if ( 1 === $comments_number ) {
							/* translators: %s: post title */
							printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','density' ), get_the_title() );
						}   else {
								printf(
									/* translators: 1: number of comments, 2: post title */
									_nx('%1$s Comment',
										'%1$s comments',
										$comments_number, 
										'comments title', 
										'density' 
									),
									esc_html (number_format_i18n( $comments_number ) ),
									get_the_title()
								);
							}
					?>
				</h4>
			</div>
			<?php 
				the_comments_navigation();
			?>
			<!-- .comment-list -->
			<?php
				wp_list_comments( array(
					'style'       => '',
					'short_ping'  => true,
					'avatar_size' => 42,
					'callback' => 'density_comments',
				) );
			?>
			

			<?php the_comments_navigation(); ?>
        </div>
    <?php endif; // Check for have_comments(). 
	
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'density' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'density' ); ?></p> 
	<?php 
		endif; 
	?>

	<?php 
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$comments_args = array
		(
			'submit_button' => __('<div class="comment-form"><input  name="%1$s" type="submit" id="%2$s" class="theme-button-one commbtn" value="post comment" /></div>','density'),
			'title_reply'  =>  __( '<div class="theme-title-one12"><h4>Leave a Comment</h4></div>', 'density'  ), 
			'comment_notes_after' => '',  
				
			'comment_field' =>  
				'<textarea class="form-control" id="comment" name="comment" placeholder="' . esc_attr__( 'Comment here', 'density' ) . '" rows="7" aria-required="true" '. $aria_req . '>' .
				'</textarea>',
			'fields' => apply_filters( 'comment_form_default_fields', array (
				'author' => '<div >'.               
					'<input id="author" class="form-control" name="author" placeholder="' . esc_attr__( 'Name', 'density' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' /></div>',
				'email' =>'<div >'.
					'<input id="email" class="form-control" name="email" placeholder="' . esc_attr__( 'Email Address', 'density' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' /></div>',
			
			) ),
		);
    ?>
    <div class="inner-box comment-form">
        <?php comment_form($comments_args); ?>
    </div> <!-- /.inner-box -->
    
<!-- .comments-area -->
