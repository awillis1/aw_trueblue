<?php 

/**
 * Here is all the custom colours for the theme.
 * $handle is a reference to the handle used with wp_enqueue_style()
 */	
if (class_exists( 'WPLessPlugin' )){
	
    $less = WPLessPlugin::getInstance();

    $less->setVariables(
    	array(
	        'text'             => get_option( 'colour_text', '#595959' ),
	        'highlight'        => get_option( 'colour_highlight', '#7bc4e6' ),
	        'highlight_hover'  => get_option( 'colour_highlight_hover', '#65b4d9' ),
	        'headings'         => get_option( 'colour_headings', '#303030' ),
	        'meta'             => get_option( 'colour_meta', '#707070' ),
	        'white'            => get_option( 'colour_white', '#ffffff' )
    	)
    );
    
}

/*
	Register Fonts
*/
if(!( function_exists( 'ebor_fonts_url' ) )){
	function ebor_fonts_url(){
	    $font_url = '';
	    
	    /* Translators: If there are characters in your language that are not supported by chosen font(s), translate this to 'off'. Do not translate into your own language. */
	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'morello' ) ) {
	        $font_url = add_query_arg( 'family', urlencode( 'Work Sans:400,500,600,700,800,900,300,200,100|Lora:400,400italic,700,700italic' ), "//fonts.googleapis.com/css" );
	    }
	    return $font_url;
	}
}

/**
 * Ebor Load Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * @since version 1.0
 * @author TommusRhodus
 */ 
if(!( function_exists( 'ebor_load_scripts' ) )){
	function ebor_load_scripts() {
			
		//Enqueue Styles
		$extension = ( class_exists( 'WPLessPlugin' ) ) ? '.less' : '.css';
		wp_enqueue_style( 'ebor-google-font', ebor_fonts_url() );
		wp_enqueue_style( 'bootstrap', EBOR_THEME_DIRECTORY . 'style/css/bootstrap.min.css' );
		wp_enqueue_style( 'ebor-plugins', EBOR_THEME_DIRECTORY . 'style/css/plugins.css' );
		wp_enqueue_style( 'ebor-theme-styles', EBOR_THEME_DIRECTORY . 'style/css/theme' . $extension );
		wp_enqueue_style( 'ebor-style', get_stylesheet_uri() );
		wp_enqueue_style( 'ebor-fonts', EBOR_THEME_DIRECTORY . 'style/type/icons.css' );
		
		//Enqueue Scripts
		$sslPrefix = ( is_ssl() ) ? 'https://maps-api-ssl.google.com' : 'http://maps.googleapis.com';
		$key = ( get_option( 'ebor_gmap_api' ) ) ? '?key=' . get_option( 'ebor_gmap_api' ) : false;
		wp_enqueue_script( 'googlemapsapi', $sslPrefix . '/maps/api/js' . $key, array( 'jquery' ), false, true );

		wp_enqueue_script( 'bootstrap', EBOR_THEME_DIRECTORY . 'style/js/bootstrap.min.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-circle-progressbar', EBOR_THEME_DIRECTORY . 'style/js/circle-progressbar.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-counterup', EBOR_THEME_DIRECTORY . 'style/js/counterup.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-fitvids', EBOR_THEME_DIRECTORY . 'style/js/fitvids.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-goodshare', EBOR_THEME_DIRECTORY . 'style/js/goodshare.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-gototop', EBOR_THEME_DIRECTORY . 'style/js/gototop.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-imagesloaded', EBOR_THEME_DIRECTORY . 'style/js/imagesloaded.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-isotope', EBOR_THEME_DIRECTORY . 'style/js/isotope.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-js-maps', EBOR_THEME_DIRECTORY . 'style/js/js-maps.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-lightgallery', EBOR_THEME_DIRECTORY . 'style/js/lightgallery.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-owl-carousel', EBOR_THEME_DIRECTORY . 'style/js/owl-carousel.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-picturefill', EBOR_THEME_DIRECTORY . 'style/js/picturefill.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-progressbar', EBOR_THEME_DIRECTORY . 'style/js/progressbar.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-smartmenus', EBOR_THEME_DIRECTORY . 'style/js/smartmenus.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-sticky-header', EBOR_THEME_DIRECTORY . 'style/js/sticky-header.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-tab-collapse', EBOR_THEME_DIRECTORY . 'style/js/tab-collapse.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-waypoints', EBOR_THEME_DIRECTORY . 'style/js/waypoints.js', array('jquery'), false, true  );
		wp_enqueue_script( 'jquery-wow', EBOR_THEME_DIRECTORY . 'style/js/wow.js', array('jquery'), false, true  );
		wp_enqueue_script( 'ebor-scripts', EBOR_THEME_DIRECTORY . 'style/js/scripts.js', array('jquery'), false, true  );
		
		//Enqueue Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
			wp_enqueue_script( 'comment-reply' );
		}
		
		$custom_css = get_option( 'custom_css' );
		
		$custom_css .= '
			footer.footer-bg1 {
			    background-image: url('. get_option( 'light_footer_background', 'http://themes.iki-bir.com/morello/style/images/art/footer1.jpg' ) .') !important;
			}
			footer.footer-bg2 {
			    background-image: url('. get_option( 'white_footer_background', 'http://themes.iki-bir.com/morello/style/images/art/footer2.jpg' ) .') !important;
			}
		';
		
		//Add custom CSS ability
		wp_add_inline_style( 'ebor-style', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'ebor_load_scripts', 110 );
}

/**
 * Ebor Load Admin Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * 
 * @since version 1.0
 * @author TommusRhodus
 */
if(!( function_exists( 'ebor_admin_load_scripts' ) )){
	function ebor_admin_load_scripts(){
		wp_enqueue_style( 'ebor-theme-admin-css', EBOR_THEME_DIRECTORY . 'admin/ebor-theme-admin.css' );
		wp_enqueue_script( 'ebor-theme-admin-js', EBOR_THEME_DIRECTORY . 'admin/ebor-theme-admin.js', array('jquery'), false, true  );
		wp_enqueue_style( 'ebor-fonts', EBOR_THEME_DIRECTORY . 'style/type/icons.css' );
	}
	add_action( 'admin_enqueue_scripts', 'ebor_admin_load_scripts', 200 );
}