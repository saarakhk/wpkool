	<?php 
	/**
	 * Template Name: Home Page
	 * @package Density
	*/

	get_header();
		get_template_part( 'home-page-slider' );
		get_template_part( 'home-page-thecontent' );
		get_template_part( 'home-page-about' );
		get_template_part( 'home-page-feature' );
		get_template_part( 'home-page-services' );
		get_template_part( 'home-page-blog' );
		get_template_part( 'home-page-callout' );
	get_footer(); 
	?>