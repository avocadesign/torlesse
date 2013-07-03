<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

/**
  * Genesis Theme defaults and support
  *
  * @author Avoca Design
  * @since Torlesse 0.2
  *
*/

	// Child theme (do not remove)
	define( 'CHILD_THEME_NAME', 'Torlesse Theme' );
	define( 'CHILD_THEME_URL', 'http://www.avocadesign.co.nz/' );
	
	// Add Viewport meta tag for mobile browsers
	add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
	function sample_viewport_meta_tag() {
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
	}
	
	//* Add HTML5 markup structure
	add_theme_support( 'genesis-html5' );
	
	// Add support for custom background
	add_theme_support( 'custom-background' );
	
	// Add support for 3-column footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 ); 			//Set the SASS variable $genesis-footer-areas (base/_layout.scss) to the same number for correct layout

/**  
  * Enqueue Styles and Scripts
  *
  * Since Torlesse 0.2
*/ 

	//Enqueue the stylesheet
	function torlesse_theme_styles()  
	{ 
	  // Register the style like this for a theme:  
	  // (First the unique name for the style (custom-style) then the src, 
	  // then dependencies and ver no. and media type)
	  wp_register_style( 'torlesse-main', 
	    get_stylesheet_directory_uri() . '/css/torlesse.css', 
	    array() 			// Input any CSS dependncies in this array
	    );
	
	  // enqueing:
	  wp_enqueue_style( 'torlesse-main' );
	}
	add_action('wp_enqueue_scripts', 'torlesse_theme_styles');
	
	
	
	add_action( 'wp_enqueue_scripts', 'mycustom_add_javascript' );
	 
	if ( ! function_exists( 'mycustom_add_javascript' ) ) {
	function mycustom_add_javascript() {
	wp_register_script( 'general', get_stylesheet_directory_uri() . '/lib/js/torlesse.js', array( 'jquery' ) );
	do_action( 'mycustom_add_javascript' );
	} // End mycustom_add_javascript()
	}
	 
	add_action( 'mycustom_add_javascript' , 'mycustom_load_the_js' );
	 
	function mycustom_load_the_js() {
	wp_enqueue_script( 'general' );
	}



/**
  * Genesis Custom Header
  *
  * @author Avoca Design
  * @since Torlesse 0.2
  *
*/
 
	remove_action('genesis_header', 'genesis_do_header');
	remove_action('genesis_header', 'genesis_header_markup_open', 5);
	remove_action('genesis_header', 'genesis_header_markup_close', 15);
	function torlesse_custom_header() {
	  ?>
	  <div id="header">
	    <div class="h-wrap">
	       <a href="<?=get_bloginfo('home'); ?>" alt="<?php print get_bloginfo('name') .' - '. get_bloginfo('description'); ?>">
	       <img src="<?=get_bloginfo('stylesheet_directory'); ?>/images/logo.png" title="<?php print get_bloginfo('name') .' - '. get_bloginfo('description'); ?>"></a>
	    </div>  
	  </div>
	  <?php }
	 
	add_action('genesis_header', 'torlesse_custom_header');
 



/**  
  * Responsive Nav activation
  *
  * Since Torlesse 0.2
*/ 
	/** Add mobile menu toggle */
	add_action( 'genesis_header_right', 'mycustom_mobile_menu_toggle', 5 );
	 
	function mycustom_mobile_menu_toggle() {
	echo '<div class="menu-toggle">';
	echo '<span><a href="#">Menu</a></span>';
	echo '</div>';
	}



/**  
  * Customise the Site Credits in footer
  *
  * Since Torlesse 0.2
*/ 
	add_filter( 'genesis_footer_creds_text', 'torlesse_footer_creds_text' );
	function torlesse_footer_creds_text() {
	
		// Define the Alt Text and Title of the credit link
		$torlesse_developer_link_alt = 'Website Design, WordPress web development and hosting, Genesis framework';
		
		// Create the markup
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
