<?php
/**
 * Functions File
 *
 * @package Beatrix Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Add css to head 
 *
 * @package Beatrix Lite
 * @since 1.0
 */
function beatrix_lite_theme_dynemic_css() {		
	 
	// Heading Color
	$h1_clr = beatrix_lite_get_theme_mod( 'h1_clr' );
	$h2_clr = beatrix_lite_get_theme_mod( 'h2_clr' );
	$h3_clr = beatrix_lite_get_theme_mod( 'h3_clr' );
	$h4_clr = beatrix_lite_get_theme_mod( 'h4_clr' );
	$h5_clr = beatrix_lite_get_theme_mod( 'h5_clr' );
	$h6_clr = beatrix_lite_get_theme_mod( 'h6_clr' );	
	
	// Link Color
	$link_clr = beatrix_lite_get_theme_mod( 'link_clr' );
	 
	// Link Hover Color
	$hover_link_clr = beatrix_lite_get_theme_mod( 'hover_link_clr' );	

?>

<style>
.site-content a, .site-content a:visited {color: <?php echo esc_attr($link_clr); ?>;}
h1, h1.entry-title{	color: <?php echo esc_attr($h1_clr); ?>;}
h2, h2.page-title, h2.entry-title, h2.entry-title a, .site-content h2.entry-title a, .site-content h2 a, h2 a:visited{color: <?php echo esc_attr($h2_clr); ?>;}
h3, footer h3{color: <?php echo esc_attr($h3_clr); ?>;}
h4{	color: <?php echo esc_attr($h4_clr); ?>;}
h5{	color: <?php echo esc_attr($h5_clr); ?>;}
h6{	color: <?php echo esc_attr($h6_clr); ?>;}
h2.entry-title a:hover, .site-content a:hover, .site-content a:active {color: <?php echo esc_attr($hover_link_clr); ?>;}

</style>
<?php }
// Action to add theme dynemic CSS
add_action( 'wp_head', 'beatrix_lite_theme_dynemic_css' );