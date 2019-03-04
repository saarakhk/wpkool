<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Beatrix Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Beatrix_Lite_Script {
	
	function __construct() {

		// Action to add style in front end
		add_action( 'wp_enqueue_scripts', array($this, 'beatrix_lite_front_styles'), 1 );

		// Action to add script in front end
		add_action( 'wp_enqueue_scripts', array($this, 'beatrix_lite_front_scripts'), 1 );
      
                
	}      
    
   

	/**
	 * Enqueue styles for front-end
	 * 
	 * @package Beatrix Lite
	 * @since 1.0
	 */
	function beatrix_lite_front_styles() {
			

		// Font Awesome CSS
		wp_register_style( 'fontawesome', BEATRIX_LITE_URL . '/assets/css/font-awesome.min.css', array(), BEATRIX_LITE_VERSION);
		wp_enqueue_style( 'fontawesome' );

		// Font Awesome CSS
		wp_register_style( 'montserrat-font', 'https://fonts.googleapis.com/css?family=Montserrat', array(), BEATRIX_LITE_VERSION);
		wp_enqueue_style( 'montserrat-font' );			

		// Loads theme main stylesheet
		wp_enqueue_style( 'beatrix-lite-style', get_stylesheet_uri(), array(), BEATRIX_LITE_VERSION);
                	
	}

	/**
	 * Enqueue scripts for front-end
	 * 
	 * @package Beatrix Lite
	 * @since 1.0
	 */
	function beatrix_lite_front_scripts() {			
		
		// Skip Link Focus Fix Js
		wp_register_script( 'beatrix-lite-skip-link-js', BEATRIX_LITE_URL . '/assets/js/skip-link-focus-fix.js', array('jquery'), BEATRIX_LITE_VERSION, true);
		wp_enqueue_script( 'beatrix-lite-skip-link-js' );
		

		// Public Js
		wp_register_script( 'beatrix-lite-public-js', BEATRIX_LITE_URL . '/assets/js/public.js', array('jquery'), BEATRIX_LITE_VERSION, true);             
		wp_enqueue_script( 'beatrix-lite-public-js' );	
		
		/*
		 * Adds JavaScript to pages with the comment form to support
		 * sites with threaded comments (when in use).
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );
		}                
               
        }
}

$beatrix_lite_script = new Beatrix_Lite_Script();