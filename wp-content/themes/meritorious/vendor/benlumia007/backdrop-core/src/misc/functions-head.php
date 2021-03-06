<?php
/**
 * Backdrop Core (functions-head.php)
 *
 * @package        Backdrop Core
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://getbenonit.com)
 */

/**
 *  Define namespace
 */
namespace Benlumia007\Backdrop\Misc;

/**
 *  Table of Content
 *
 *  1.0 - Misc (Meta Charset)
 *  2.0 - Misc (Meta Viewport)
 *  3.0 - Misc (GMPG Link)
 *  4.0 - Misc (Pingback)
 */

/**
 *  1.0 - Misc (Meta Charset)
 */
function load_meta_charset() {
	printf( '<meta charset="%s" />' . "\n", esc_attr( get_bloginfo( 'charset' ) ) );
}
add_action( 'wp_head', __NAMESPACE__ . '\load_meta_charset', 0 );

/**
 *  2.0 - Misc (Meta Viewport)
 */
function load_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}
add_action( 'wp_head', __NAMESPACE__ . '\load_meta_viewport', 1 );

/**
 *  3.0 - Misc (GMPG Link)
 */
function load_gmpg_link() {
	echo '<link href="https://gmpg.org/xfn/11" rel="profile" />' . "\n";
}
add_action( 'wp_head', __NAMESPACE__ . '\load_gmpg_link', 2 );

/**
 *  4.0 - Misc (Pingback)
 */
function load_pingback() {
	if ( 'open' === get_option( 'default_ping_status' ) ) {
		printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', __NAMESPACE__ . '\load_pingback', 3 );
