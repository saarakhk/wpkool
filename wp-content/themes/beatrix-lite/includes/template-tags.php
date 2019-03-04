<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Beatrix Lite
 */



/**
 * Change the archive title for category page.
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_category_title( $title ) {
	
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'beatrix_lite_category_title' );



/**
 * Prints HTML with meta information for the current post-date/time and categories, tags..
 */
function beatrix_lite_posted_on( $meta = array() ) {

    $default_meta = array(
                                'post_date' => 1,
                                'author' 	=> 1,
                                'category' 	=> 1,
                                'tag'		=> 1,
                                'comment'	=> 1,
                        );

	if( !empty($meta) && is_array($meta) ) {
		foreach ($default_meta as $meta_key => $meta_val) {
			$val = in_array($meta_key, $meta) ? 1 : 0;

			$result_meta[$meta_key] = $val;
		}
	}

	$result_meta = !empty($result_meta) ? $result_meta : $default_meta;
	extract( $result_meta, EXTR_SKIP );

	if( is_home() || is_front_page() || is_search()) {

		$post_date 			= beatrix_lite_get_theme_mod( 'blog_show_date' );
		$author 			= beatrix_lite_get_theme_mod( 'blog_show_author' );
		$category 			= beatrix_lite_get_theme_mod( 'blog_show_cat' );
		$tag 				= beatrix_lite_get_theme_mod( 'blog_show_tags' );
		$blog_show_comment 	= beatrix_lite_get_theme_mod( 'blog_show_comment' );

	} elseif( is_category() || is_archive() || is_tag() || is_author() ) {

		$post_date 			= beatrix_lite_get_theme_mod( 'cat_show_date' );
		$author 			= beatrix_lite_get_theme_mod( 'cat_show_author' );
		$category 			= beatrix_lite_get_theme_mod( 'cat_show_cat' );
		$tag 				= beatrix_lite_get_theme_mod( 'cat_show_tags' );
		$blog_show_comment 	= beatrix_lite_get_theme_mod( 'cat_show_comment' );	

	}

	if( $post_date || $author || $category || ( $tag && 'post' === get_post_type() ) || !empty( $blog_show_comment ) ){
		echo '<div class="entry-meta">';
	}

	// Post Date
	if( $post_date ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on"><i class="fa fa-clock-o"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.
	}

	
	if( $author ) {               
        echo '<span class="byline"><i class="fa fa-user"></i><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html(get_the_author()) . '</a></span></span>';
	}

	// Post Category
	if( $category  ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'beatrix-lite' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links"><i class="fa fa-folder-open"></i><span class="screen-reader-text">%1$s </span>%2$s</span>', esc_html__( 'Categories', 'beatrix-lite' ), $categories_list ); // WPCS: XSS OK.
		}
	}

	// Hide category and tag text for pages.
	if ( $tag && 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'beatrix-lite' ) );
		if ( $tags_list ) {
			echo '<span class="tags-links"><i class="fa fa-tags"></i>' . $tags_list . '</span>'; // WPCS: XSS OK.
		}
	}
	

	if ( !empty($blog_show_comment) &&  !post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments-o"></i>';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'beatrix-lite' ), array(
			'span' => array(
				'class' => array(),
			),
		) ), get_the_title() ) );
		echo '</span>';
	}

	if( $post_date || $author || $category || ( $tag && 'post' === get_post_type() ) || !empty($blog_show_comment) ){
	echo '</div>';
	}
}



/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function beatrix_lite_entry_footer() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'beatrix-lite' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Change the tag could args
 *
 * @param array $args Widget parameters.
 *
 * @return mixed
 */
function beatrix_lite_tag_cloud_args( $args ) {
	$args['largest']  = 1; // Largest tag.
	$args['smallest'] = 1; // Smallest tag.
	$args['unit']     = 'em'; // Tag font unit.

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'beatrix_lite_tag_cloud_args' );
