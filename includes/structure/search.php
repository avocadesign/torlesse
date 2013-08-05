<?php
/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

// add_filter( 'genesis_search_text', 'bfg_search_text' );
/**
 * Customize the search form input box text
 *
 * See: http://www.briangardner.com/code/customize-search-form/
 *
 * @since 2.0.0
 */
function bfg_search_text() {
	return esc_attr( 'Search Text Goes Here...' );
}

// add_filter( 'genesis_search_button_text', 'bfg_search_button_text' );
/**
 * Customize the search form input button text
 *
 * See: http://www.briangardner.com/code/customize-search-form/
 *
 * @since 2.0.0
 */
function bfg_search_button_text( $text ) {
	return esc_attr( 'Click Here...' );
}

// add_action( 'template_redirect', 'bfg_redirect_single_search_result' );
/**
 * Redirect to the result itself, if only one search result is returned
 *
 * See: http://www.developerdrive.com/2013/07/5-quick-and-easy-tricks-to-improve-your-wordpress-theme/
 *
 * @since 2.0.5
 */
function bfg_redirect_single_search_result() {

    if( is_search() ) {
        global $wp_query;

        if( $wp_query->post_count == 1) {
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
        }
    }

}
