<?php
/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

/**
 * Allow shortcodes in text widgets
 *
 * @since 2.0.0
 */
// add_filter( 'widget_text', 'do_shortcode' );

add_action( 'wp_head', 'torlesse_remove_recent_comments_widget_styles', 1 );
/**
 * Remove 'Recent Comments' widget injected styles
 *
 * @since 1.x
 */
function torlesse_remove_recent_comments_widget_styles() {

	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ));
	}

}