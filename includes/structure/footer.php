<?php
/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

// add_filter( 'genesis_footer_creds_text', 'bfg_footer_creds_text' );
/**
 * Custom footer 'creds' text
 *
 * @since 2.0.0
 */
function bfg_footer_creds_text() {

	 return 'Copyright [footer_copyright] [footer_childtheme_link] &middot; [footer_genesis_link] [footer_studiopress_link] &middot; [footer_wordpress_link] &middot; [footer_loginout]';

}
