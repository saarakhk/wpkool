<?php
/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'density_customize_search_form' ) ) :

	/** Customize search form.
	 **/
	function density_customize_search_form() {

		$form = '<div class="sidebar-container sidebar-search"><form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			
			<span class="screen-reader-text">' . esc_html( '', 'label', 'density' ) . '</span>
			<input type="search" class="search-query form-control" placeholder="' . esc_attr_x( 'Search..', 'placeholder', 'density' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'density' ) . '" />
			
			<button type="submit" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button></form></div> ';

		return $form;
	}
	
endif;
add_filter( 'get_search_form', 'density_customize_search_form', 15 );
?>