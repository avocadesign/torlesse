<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Torlesse Theme' );
define( 'CHILD_THEME_URL', 'http://www.avocadesign.co.nz/' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// Add support for custom background
add_theme_support( 'custom-background' );

// Add support for custom header
add_theme_support( 'genesis-custom-header', array(
	'width' => 1152,
	'height' => 120
) );

// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//Enqueue the stylesheet
function torlesse_theme_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  wp_register_style( 'torlesse-main', 
    get_stylesheet_directory_uri() . '/css/torlesse.css', 
    array() // Input any CSS dependncies in this array
    );

  // enqueing:
  wp_enqueue_style( 'torlesse-main' );
}
add_action('wp_enqueue_scripts', 'torlesse_theme_styles');

// Customize the site credits
add_filter( 'genesis_footer_creds_text', 'torlesse_footer_creds_text' );
function torlesse_footer_creds_text() {
	$torlesse_developer_link_alt = 'Website Design, WordPress web development and hosting, Genesis framework';
    echo '<div class="creds">'; //enclose the site credits in a div.creds
    echo '<div class="site-copyright"><p>'; //display the copyright info in a div.site-copyright
    echo '&copy; ';
    echo bloginfo('name'); // Display the site name in the copyright information
    echo ' ';
    echo date('Y');
    echo '</p></div>'; // End .site-copyright
    echo '<div class="website-designed-by"><p>'; // Display the Developer credits in a div.website-designed-by
    echo ' Website designed by <strong><a href="' . CHILD_THEME_URL . '" class="website-designed-by-link" alt="' . $torlesse_developer_link_alt . '" title="' . $torlesse_developer_link_alt . '">' . CHILD_THEME_NAME . '</a></strong>';
    echo '</p></div>'; // End .website-designed-by
    echo '</div>'; // End .creds
}
