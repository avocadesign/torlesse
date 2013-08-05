<?php
/*
	Template Name: Custom Template Starter
*/

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

add_filter( 'body_class', 'torlesse_add_page_body_class' );
/**
 * Add page specific body class
 *
 * @param $classes array Body Classes
 * @return $classes array Modified Body Classes
 */
function torlesse_add_page_body_class( $classes ) {
   $classes[] = 'custom';
   return $classes;
}




/**
 * Force a layout setting for the page
 *
 * See: http://www.briangardner.com/code/force-layout-setting/
 *
 * @since 2.0.0
 */
//add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
// Other possible layouts: __genesis_return_content_sidebar, __genesis_return_sidebar_content, __genesis_return_content_sidebar_sidebar, __genesis_return_sidebar_sidebar_content, __genesis_return_sidebar_content_sidebar, __genesis_return_full_width_content





// All Customisations above this comment
genesis();