<?php

/**
 * Density functions and definitions
 * @package Density
 *
*/
/* Set the content width in pixels, based on the theme's design and stylesheet.
*/

	function density_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'density_content_width', 980 );
	}
	add_action( 'after_setup_theme', 'density_content_width', 0 );

	function new_excerpt_more( $more ) {
		return '.';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	if( ! function_exists( 'density_theme_setup' ) ) {	
	
		function density_theme_setup() {
			load_theme_textdomain( 'density', get_template_directory() . '/languages' );
			
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );
			
			// Add title tag 
			add_theme_support( 'title-tag' );
			
			// Add default logo support		
			add_theme_support( 'custom-logo');

			add_theme_support('post-thumbnails');			
			
			 // Add theme support for Semantic Markup
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			) );

			$defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/img/header.jpg',
			'width'                  => 1920,
			'height'                 => 600,
			'uploads'                => true,
			'default-text-color'     => "fff",
			'wp-head-callback'       => 'density_header_style',
		);
		add_theme_support( 'custom-header', $defaults );


			// Menus
			register_nav_menus(array(
				'primary' => esc_html__('Primary Menu', 'density'),
			));
			// add excerpt support for pages
			add_post_type_support( 'page', 'excerpt' );
			
			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
			
			// To use additional css
			add_editor_style( 'assets/css/editor-style.css' );
			
			//About Theme		
		if ( is_admin() ) {
			require( get_template_directory() . '/home-screen.php');
		}	
		}
		add_action( 'after_setup_theme', 'density_theme_setup' );
	}

	/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */

require_once( trailingslashit( get_template_directory() ) . '/include/upgrade/class-customize.php' );
	
	/**
	 * Styles the header text color displayed on the page header title
	 *
	 */
	function density_header_style()
	{
		$header_text_color = get_header_textcolor();
		?>
			<style type="text/css">
				<?php
					//Check if user has defined any header image.
					if ( get_header_image() ) :
				?>
					.site-title, .site-description{
						color: #<?php echo esc_attr($header_text_color); ?>;
						
					}
				<?php endif; ?>	
			</style>
		<?php

	}
	// Register Nav Walker class_alias
	require get_template_directory(). '/lib/class-wp-bootstrap-navwalker.php';
	require get_template_directory(). '/lib/class-wp-bootstrap-navwalker-mobile.php';
	require get_template_directory(). '/pro-feat.php';
	
	add_action( 'admin_init', 'density_detect_button' );
	function density_detect_button() {
	wp_enqueue_style( 'density-info-button', get_template_directory_uri() . '/assets/css/import-button.css' );
}
 
	 
/**
 * admin  JS scripts
 */
function density_admin_enqueue_scripts( $hook ) { 
	wp_enqueue_style( 
		'font-awesome', 
		get_template_directory_uri() . '/assets/css/font-awesome.css', 
		array(), 
		'4.7.0', 
		'all' 
	);
	wp_enqueue_style( 
		'density-admin', 
		get_template_directory_uri() . '/assets/admin/css/admin.css', 
		array(), 
		'1.0.0', 
		'all' 
	);
 
}
add_action( 'admin_enqueue_scripts', 'density_admin_enqueue_scripts' );

	/**
	 * Enqueue CSS stylesheets
	 */		
	if( ! function_exists( 'density_enqueue_styles' ) ) {
		function density_enqueue_styles() {	
		
			wp_enqueue_style('density-font', 'https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800|Roboto:300,400,500','');
			wp_enqueue_style('skeleton', get_template_directory_uri() . '/assets/css/skeleton.css','');
			wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/assets/css/owl-carousel.css','');
			wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css','');
			wp_enqueue_style('density-base', get_template_directory_uri() . '/assets/css/base.css','');		
			// main style
			wp_enqueue_style( 'density-style', get_stylesheet_uri() );
			
		}
		add_action( 'wp_enqueue_scripts', 'density_enqueue_styles' );
	}
	/**
	 * Enqueue JS scripts
	 */
	if( ! function_exists( 'density_enqueue_scripts' ) ) {
		function density_enqueue_scripts() {   
			wp_enqueue_script('jquery');
			wp_enqueue_script('owl-carousel.js', get_template_directory_uri() . '/assets/js/owl-carousel.js',array(),'', true);
			wp_enqueue_script('nice-scroll', get_template_directory_uri() . '/assets/js/nice-scroll.js',array(),'', true);
			wp_enqueue_script('density-init.js', get_template_directory_uri() . '/assets/js/init.js',array(),'', true);
		}
		add_action( 'wp_enqueue_scripts', 'density_enqueue_scripts' );
	}
	/**
	 * Register sidebars for density
	*/
	function density_sidebars() {
		// Blog Sidebar
		register_sidebar(array(
			'name' => esc_html__( 'Blog Sidebar', "density"),
			'id' => 'blog-sidebar',
			'description' => esc_html__( 'Sidebar on the blog layout.', "density"),
			'before_widget' => '<div id="%1$s" class="sidebar_widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="sidebar-title">',
			'after_title' => '</h5>',
		));
		// Footer Sidebar
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 1', "density"),
			'id' => 'density-footer-widget-area-1',
			'description' => esc_html__( 'The footer widget area 1', "density"),
			'before_widget' => ' <div class="footer_widget %2$s">',
			'after_widget' => '</div> ',
			'before_title' => '<h3 class="footer_widget-title ">',
			'after_title' => '</h3>',
		));	

		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 2', "density"),
			'id' => 'density-footer-widget-area-2',
			'description' => esc_html__( 'The footer widget area 2', "density"),
			'before_widget' => '<div class="footer_widget %2$s"> ',
			'after_widget' => ' </div>',
			'before_title' => '<h3 class="footer_widget-title">',
			'after_title' => '</h3>',
		));	

		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 3', "density"),
			'id' => 'density-footer-widget-area-3',
			'description' => esc_html__( 'The footer widget area 3', "density"),
			'before_widget' => '<div class="footer_widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="footer_widget-title">',
			'after_title' => '</h3>',
		));	
	}
	add_action( 'widgets_init', 'density_sidebars' );

	/**
	 * Comment layout
	 */
	function density_comments( $comment, $args, $depth ) { ?>
		<div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
				  <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'density' ) ?></p>
				</div>
			<?php endif; ?>
			<div class="co-single-comment fix">
				<div class="image float-left">
				<?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array( 'media-object','' ) )); ?>
				</div>
				<h6>
					<?php 
							/* translators: '%1$s %2$s: edit term */
					printf(esc_html__( '%1$s %2$s', 'density' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'density' ),'  ','') ) ?>
					
				</h6>
				<time datetime="<?php echo comment_time('c'); ?>">
					<?php printf(  /* translators: 1: date, 2: time */
						_x( '%1$s at %2$s', '1: date, 2: time', 'density' ),
						get_comment_date(),
						get_comment_time()
					); ?>
				</time>
				<?php comment_text() ;?>
				<a class="reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
			</div>
		</div>
	<?php
	}
	/**
	 * Customizer additions.
	 */
	require get_template_directory(). '/lib/customizer.php';
	require get_template_directory(). '/lib/breadcrumbs.php';
	require get_template_directory(). '/lib/extras.php';