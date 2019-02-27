<?php 

/**
 * Array of blog layouts
 */
if(!( function_exists( 'ebor_get_blog_layouts' ) )){
	function ebor_get_blog_layouts(){
		return array(
			'Grid Blog 3 Columns'                => 'grid-3col',
			'Grid Blog Right Sidebar'            => 'grid-sidebar-right',
			'Grid Blog Left Sidebar'             => 'grid-sidebar-left',
			'List Blog Right Sidebar'            => 'list-sidebar-right',
			'List Blog Left Sidebar'             => 'list-sidebar-left',
			'Classic Blog Left Sidebar'          => 'classic-sidebar-left',
			'Classic Blog Right Sidebar'         => 'classic-sidebar-right',
			'Blog Carousel'                      => 'carousel',
			'List Blog No Sidebar (2col)'        => 'list'
		);	
	}
}

/**
 * Array of portfolio layouts
 */
if(!( function_exists( 'ebor_get_portfolio_layouts' ) )){
	function ebor_get_portfolio_layouts(){
		return array(
			'Grid Portfolio (3col)'             => 'detail-3col',
			'Grid Portfolio (4col)'             => 'detail-4col',
			'Grid Portfolio (lightbox)(3col)'   => 'lightbox-3col',
			'Grid Portfolio (lightbox)(4col)'   => 'lightbox-4col',
			'Carousel Portfolio'                => 'carousel'
		);
	}
}

/**
 * Array of header layouts
 */
if(!( function_exists( 'ebor_get_header_layouts' ) )){
	function ebor_get_header_layouts(){
		$options = array(
			'blank'             => 'No Header or Nav',
			'classic'           => 'Classic Header',
			'fancy'             => 'Fancy Header',
			'extended'          => 'Extended Header',
			'centered'          => 'Centered Header',
			'alt'               => 'Alternative Header'
		);
		return $options;	
	}
}

/**
 * Array of footer layouts
 */
if(!( function_exists( 'ebor_get_footer_layouts' ) )){
	function ebor_get_footer_layouts(){
		$options = array(
			'blank'             => 'No Footer',
			'widgets-dark'      => 'Dark background & widgets',
			'widgets-light'     => 'Light background & widgets',
			'widgets-white'     => 'White background & widgets',
			'widgets-centered'  => 'Centered Widget'
		);
		return $options;	
	}
}

/**
 * Array of team layouts
 */
if(!( function_exists( 'ebor_get_team_layouts' ) )){
	function ebor_get_team_layouts(){
		$options = array(
			'grid'			=> 'Grid',
			'carousel'		=> 'Carousel',
		);
		return $options;	
	}
}

if(!( function_exists( 'ebor_page_title' ) )){
	function ebor_page_title( $title = false, $image = false, $layout = false ){
		
		$layout = ($layout) ? $layout : 'no';
		$style = ($image) ? 'style="background-image: url('. esc_url( $image ) .');"' : false;
		
		return '
			<div class="page-title '. $layout .'" '. $style .'>
				<div class="container inner3">
					<h1 class="pull-left">'. $title .'</h1>
					'. ebor_breadcrumbs() .'
				</div><!-- /.container --> 
			</div><!-- /.dark-wrapper -->
		';
		
	}
}

/**
 * WordPress' missing ebor_is_blog_page() function.  Determines if the currently viewed page is
 * one of the blog pages, including the blog home page, archive, category/tag, author, or single
 * post pages.
 *
 * @see http://core.trac.wordpress.org/browser/tags/3.4.1/wp-includes/query.php#L1572
 *
 * @return bool
 */
if(!( function_exists( 'ebor_is_blog_page' ) )){
	function ebor_is_blog_page() {
	    global $post;
	    return ( ( is_home() || is_archive() || is_single() ) && ('post' == get_post_type( $post )) ) ? true : false ;
	}
}

if(!( function_exists( 'ebor_breadcrumbs' ) )){ 
	function ebor_breadcrumbs() {
		if ( is_front_page() || is_search() || is_404() ) {
			return;
		}
		global $post;
		
		$displays = get_option( 'ebor_framework_cpt_display_options' );
		
		$post_type = get_post_type();
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		$before = '<div class="more breadcrumbs pull-right bm0">';
		$after = '</div>';
		$home = '<span><a href="' . esc_url( home_url( "/" ) ) . '" class="home-link" rel="home">' . esc_html__( 'Home', 'morello' ) . '</a></span>';
		
		if( 'portfolio' == $post_type ){
			$slug = ( $displays['portfolio_slug'] ) ? $displays['portfolio_slug'] : 'portfolio';
			$home .= '<span><a href="' . esc_url( home_url( "/". $slug ."/" ) ) . '">' . esc_html__( 'Portfolio', 'morello' ) . '</a></span>';
		}
		
		if( 'team' == $post_type ){
			$slug = ( $displays['team_slug'] ) ? $displays['team_slug'] : 'team';
			$home .= '<span><a href="' . esc_url( home_url( "/". $slug ."/" ) ) . '">' . esc_html__( 'Team', 'morello' ) . '</a></span>';
		}
		
		if( 'product' == $post_type && !(is_archive()) ){
			$home .= '<span><a href="' . esc_url( get_permalink( woocommerce_get_page_id( 'shop' ) ) ) . '">' . esc_html__( 'Shop', 'morello' ) . '</a></span>';
		} elseif( 'product' == $post_type && is_archive() ) {
			$home .= '<span>' . esc_html__( 'Shop', 'morello' ) . '</span>';
		}
		
		$breadcrumb = '';
		if ( $ancestors ) {
			foreach ( $ancestors as $ancestor ) {
				$breadcrumb .= '<span><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . wp_specialchars_decode( get_the_title( $ancestor ) ) . '</a></span>';
			}
		}
		
		if( ebor_is_blog_page() && is_single() ){
			$breadcrumb .= '<span><a href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . wp_specialchars_decode( get_option('blog_title','Our Blog') ) . '</a></span><span>' . wp_specialchars_decode( get_the_title( $post->ID ) ) . '</span>';
		} elseif( ebor_is_blog_page() ){
			$breadcrumb .= '<span>' . wp_specialchars_decode( get_option('blog_title','Our Blog') ) . '</span>';
		} elseif( is_post_type_archive('product') || is_archive() ){
			//nothing
		} else {
			$breadcrumb .= '<span>' . wp_specialchars_decode( get_the_title( $post->ID ) ) . '</span>';
		}
		
		rewind_posts();
		
		return $before . $home . $breadcrumb . $after;
	}
}

/**
 * ebor_get_header_layout
 * 
 * Use to conditionally check the page header meta layout against the theme option for the same
 * In short, this function can override the global header option on a post by post basis
 * Call within get_header() for this to override the global header choice
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_get_header_layout' ) )){
	function ebor_get_header_layout(){
		global $post;
		
		if( is_search() || !( isset($post->ID) ) ) {
			return get_option('header_layout', 'centered');
		}
		
		$header = get_post_meta($post->ID, '_ebor_header_override', 1);
		if( '' == $header || false == $header || 'none' == $header ){
			$header = get_option( 'header_layout', 'centered' );
		}
		
		return $header;	
	}
}

if(!( function_exists( 'ebor_get_footer_layout' ) )){
	function ebor_get_footer_layout(){
		global $post;
		
		if( is_search() || !( isset($post->ID) ) ) {
			return get_option( 'footer_layout', 'widgets-dark' );
		}
		
		$footer = get_post_meta( $post->ID, '_ebor_footer_override', 1 );
		if( '' == $footer || false == $footer || 'none' == $footer ){
			$footer = get_option( 'footer_layout', 'widgets-dark' );
		}
		
		return $footer;	
	}
}

/**
 * HEX to RGB Converter
 *
 * Converts a HEX input to an RGB array.
 * @param $hex - the inputted HEX code, can be full or shorthand, #ffffff or #fff
 * @since 1.0.0
 * @return string
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_hex2rgb' ) )){
	function ebor_hex2rgb( $hex ) {
	   $hex = str_replace( "#", "", $hex );
	
	   if( strlen( $hex ) == 3 ) {
	      $r = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1 ) );
	      $g = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1 ) );
	      $b = hexdec( substr( $hex, 2, 1 ).substr( $hex, 2, 1 ) );
	   } else {
	      $r = hexdec( substr( $hex, 0, 2) );
	      $g = hexdec( substr( $hex, 2, 2) );
	      $b = hexdec( substr( $hex, 4, 2) );
	   }
	   $rgb = array ($r, $g, $b );
	   return implode( ",", $rgb ); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}
}

/**
 * Set revslider into theme mode
 */
if(function_exists( 'set_revslider_as_theme' )){
	function ebor_set_revslider_as_theme(){
		set_revslider_as_theme(true);
	}
	add_action( 'init', 'ebor_set_revslider_as_theme' );
}

/**
 * Init theme options
 * Certain theme options need to be written to the database as soon as the theme is installed.
 * This is either for the enqueues in ebor-framework, or to override the default image sizes in WooCommerce.
 * Either way this function is only called when the theme is first activated, de-activating and re-activating the theme will result in these options returning to defaults.
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_init_theme_options' ) )){
	/**
	 * Hook in on activation
	 */
	global $pagenow;
	
	/**
	 * Define image sizes
	 */
	function ebor_init_theme_options() {

		//Set all options to zero before initialising options for this theme
		$existing_options = get_option( 'ebor_framework_options' );
		if( is_array($existing_options) ){
			foreach ($existing_options as $key => $value) {
				$existing_options[$key] = '0';
			}
			update_option( 'ebor_framework_options', $existing_options );
		}

		//Ebor Framework
		$framework_args = array(
			'portfolio_post_type'   => '1',
			'team_post_type'        => '1',
			'client_post_type'      => '1',
			'testimonial_post_type' => '1',
			'mega_menu'             => '0',
			'options'               => '1',
			'metaboxes'             => '1',
			'elemis_widgets'        => '0',
			'keepsake_widgets'      => '0',
			'morello_widgets'       => '1',
			'elemis_shortcodes'     => '1',
			'aq_resizer'            => '1',
			'morello_vc_shortcodes' => '1'
		);
		update_option( 'ebor_framework_options', $framework_args );
		
	}
	
	/**
	 * Only call this action when we first activate the theme.
	 */
	if ( 
		is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ||
		is_admin() && isset( $_GET['theme'] ) && $pagenow == 'customize.php'
	){
		add_action( 'init', 'ebor_init_theme_options', 1 );
	}
}

/**
 * Register the required plugins for this theme.
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_register_required_plugins' ) )){
	function ebor_register_required_plugins() {
		$plugins = array(
			array(
			    'name'      => esc_html__( 'Contact Form 7', 'morello' ),
			    'slug'      => 'contact-form-7',
			    'required'  => false,
			    'version' 	=> '3.7.2'
			),
			array(
			    'name'      => esc_html__( 'WP Less', 'morello' ),
			    'slug'      => 'wp-less',
			    'required'  => true,
			    'version' 	=> '1.0.0'
			),
			array(
				'name'     				=> esc_html__( 'Ebor Framework', 'morello' ),
				'slug'     				=> 'Ebor-Framework-master',
				'source'   				=> 'https://github.com/tommusrhodus/ebor-framework/archive/master.zip',
				'required' 				=> true,
				'version' 				=> '1.0.0',
				'external_url' 			=> 'https://github.com/tommusrhodus/ebor-framework/archive/master.zip',
			),
			array(
				'name'     				=> esc_html__( 'Visual Composer', 'morello' ),
				'slug'     				=> 'js_composer',
				'source'   				=> 'http://www.madeinebor.com/plugin-downloads/js_composer-latest.zip',
				'required' 				=> true,
				'external_url' 			=> 'http://www.madeinebor.com/plugin-downloads/js_composer-latest.zip',
				'version' 				=> '5.4.2',
			),
			array(
				'name'     				=> esc_html__( 'Revolution Slider', 'morello' ),
				'slug'     				=> 'revslider',
				'source'   				=> 'http://www.madeinebor.com/plugin-downloads/revslider-latest.zip',
				'required' 				=> false,
				'external_url' 			=> 'http://www.madeinebor.com/plugin-downloads/revslider-latest.zip',
				'version'               => '5.1.6'
			),
			array(
			    'name'      => esc_html__( 'One Click Demo Import', 'morello' ),
			    'slug'      => 'one-click-demo-import',
			    'required'  => false,
			    'version' 	=> '1.0.0'
			),
			array(
			    'name'      => esc_html__( 'SVG Support', 'morello' ),
			    'slug'      => 'svg-support',
			    'required'  => false,
			    'version' 	=> '2.3.15'
			),
		);
		$config = array(
			'is_automatic' => true,
		);
		tgmpa( $plugins, $config );
	}
	add_action( 'tgmpa_register', 'ebor_register_required_plugins' );
}

if(!( function_exists( 'ebor_pagination' ) )){
	function ebor_pagination($pages = '', $range = 2){
		$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
				if(!$pages) {
					$pages = 1;
				}
		}
		
		$output = '';
		
		if(1 != $pages){
			$output .= "<div class='pagination'><ul>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) $output .= "<li><a href='". get_pagenum_link(1) ."'><i class='ion-chevron-left'></i></a></li> ";
			
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					$output .= ($paged == $i)? "<li class='active'><a href='". get_pagenum_link($i) ."'><span>".$i."</span></a></li> ":"<li><a href='".get_pagenum_link($i)."'><span>".$i."</span></a></li> ";
				}
			}
		
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $output .= "<li><a href='".get_pagenum_link( $pages )."'><i class='ion-chevron-right'></i></a></li> ";
			$output.= "</ul></div>";
		}
		
		return $output;
	}
}

/**
 * Add additional styling options to TinyMCE
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_mce_buttons_2' ) )){
	function ebor_mce_buttons_2( $buttons ) {
	    array_unshift( $buttons, 'styleselect' );
	    return $buttons;
	}
	add_filter( 'mce_buttons_2', 'ebor_mce_buttons_2' );
}

/**
 * Add additional styling options to TinyMCE
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_mce_before_init' ) )){
	function ebor_mce_before_init( $settings ) {
	    $style_formats = array(
	    	array(
	    		'title' 	=> 'Sans Serif Font',
	    		'selector' 	=> '*',
	    		'classes' 	=> 'sans',
	    	),
	    	array(
	    		'title' 	=> 'Subheading Paragraph',
	    		'selector' 	=> 'p',
	    		'classes' 	=> 'lead',
	    	),
	    	array(
	    		'title' 	=> 'Button',
	    		'selector' 	=> 'a',
	    		'classes' 	=> 'btn',
	    	),
	    );
	    $settings['style_formats'] = json_encode( $style_formats );
	    return $settings;
	}
	add_filter( 'tiny_mce_before_init', 'ebor_mce_before_init' );
}

if(!( function_exists( 'ebor_get_social_icons' ) )){
	function ebor_get_social_icons(){
		return array(
			'pinterest'		=> 'Pinterest',
			'rss'			=> 'RSS',
			'facebook'		=> 'Facebook',
			'twitter'		=> 'Twitter',
			'flickr'		=> 'Flickr',
			'dribbble'		=> 'Dribbble',
			'behance'		=> 'Behance',
			'linkedin'		=> 'LinkedIn',
			'vimeo'			=> 'Vimeo',
			'youtube'		=> 'Youtube',
			'skype'			=> 'Skype',
			'tumblr'		=> 'Tumblr',
			'delicious'		=> 'Delicious',
			'500px'			=> '500px',
			'grooveshark'	=> 'Grooveshark',
			'forrst'		=> 'Forrst',
			'digg'			=> 'Digg',
			'blogger'		=> 'Blogger',
			'klout'			=> 'Klout',
			'dropbox'		=> 'Dropbox',
			'github'		=> 'Github',
			'songkick'		=> 'Singkick',
			'posterous'		=> 'Posterous',
			'appnet'		=> 'Appnet',
			'gplus'			=> 'Google Plus',
			'stumbleupon'	=> 'Stumbleupon',
			'lastfm'		=> 'LastFM',
			'spotify'		=> 'Spotify',
			'instagram'		=> 'Instagram',
			'evernote'		=> 'Evernote',
			'paypal'		=> 'Paypal',
			'picasa'		=> 'Picasa',
			'soundcloud'	=> 'Soundcloud'
		);
	}
}

if(!( function_exists( 'ebor_get_icons' ) )){
	function ebor_get_icons(){
		return array(
			'none', 'ion-alert', 'ion-alert-circled', 'ion-android-add', 'ion-android-add-circle', 'ion-android-alarm-clock', 'ion-android-alert', 'ion-android-apps', 'ion-android-archive', 'ion-android-arrow-back', 'ion-android-arrow-down', 'ion-android-arrow-dropdown', 'ion-android-arrow-dropdown-circle', 'ion-android-arrow-dropleft', 'ion-android-arrow-dropleft-circle', 'ion-android-arrow-dropright', 'ion-android-arrow-dropright-circle', 'ion-android-arrow-dropup', 'ion-android-arrow-dropup-circle', 'ion-android-arrow-forward', 'ion-android-arrow-up', 'ion-android-attach', 'ion-android-bar', 'ion-android-bicycle', 'ion-android-boat', 'ion-android-bookmark', 'ion-android-bulb', 'ion-android-bus', 'ion-android-calendar', 'ion-android-call', 'ion-android-camera', 'ion-android-cancel', 'ion-android-car', 'ion-android-cart', 'ion-android-chat', 'ion-android-checkbox', 'ion-android-checkbox-blank', 'ion-android-checkbox-outline', 'ion-android-checkbox-outline-blank', 'ion-android-checkmark-circle', 'ion-android-clipboard', 'ion-android-close', 'ion-android-cloud', 'ion-android-cloud-circle', 'ion-android-cloud-done', 'ion-android-cloud-outline', 'ion-android-color-palette', 'ion-android-compass', 'ion-android-contact', 'ion-android-contacts', 'ion-android-contract', 'ion-android-create', 'ion-android-delete', 'ion-android-desktop', 'ion-android-document', 'ion-android-done', 'ion-android-done-all', 'ion-android-download', 'ion-android-drafts', 'ion-android-exit', 'ion-android-expand', 'ion-android-favorite', 'ion-android-favorite-outline', 'ion-android-film', 'ion-android-folder', 'ion-android-folder-open', 'ion-android-funnel', 'ion-android-globe', 'ion-android-hand', 'ion-android-hangout', 'ion-android-happy', 'ion-android-home', 'ion-android-image', 'ion-android-laptop', 'ion-android-list', 'ion-android-locate', 'ion-android-lock', 'ion-android-mail', 'ion-android-map', 'ion-android-menu', 'ion-android-microphone', 'ion-android-microphone-off', 'ion-android-more-horizontal', 'ion-android-more-vertical', 'ion-android-navigate', 'ion-android-notifications', 'ion-android-notifications-none', 'ion-android-notifications-off', 'ion-android-open', 'ion-android-options', 'ion-android-people', 'ion-android-person', 'ion-android-person-add', 'ion-android-phone-landscape', 'ion-android-phone-portrait', 'ion-android-pin', 'ion-android-plane', 'ion-android-playstore', 'ion-android-print', 'ion-android-radio-button-off', 'ion-android-radio-button-on', 'ion-android-refresh', 'ion-android-remove', 'ion-android-remove-circle', 'ion-android-restaurant', 'ion-android-sad', 'ion-android-search', 'ion-android-send', 'ion-android-settings', 'ion-android-share', 'ion-android-share-alt', 'ion-android-star', 'ion-android-star-half', 'ion-android-star-outline', 'ion-android-stopwatch', 'ion-android-subway', 'ion-android-sunny', 'ion-android-sync', 'ion-android-textsms', 'ion-android-time', 'ion-android-train', 'ion-android-unlock', 'ion-android-upload', 'ion-android-volume-down', 'ion-android-volume-mute', 'ion-android-volume-off', 'ion-android-volume-up', 'ion-android-walk', 'ion-android-warning', 'ion-android-watch', 'ion-android-wifi', 'ion-aperture', 'ion-archive', 'ion-arrow-down-a', 'ion-arrow-down-b', 'ion-arrow-down-c', 'ion-arrow-expand', 'ion-arrow-graph-down-left', 'ion-arrow-graph-down-right', 'ion-arrow-graph-up-left', 'ion-arrow-graph-up-right', 'ion-arrow-left-a', 'ion-arrow-left-b', 'ion-arrow-left-c', 'ion-arrow-move', 'ion-arrow-resize', 'ion-arrow-return-left', 'ion-arrow-return-right', 'ion-arrow-right-a', 'ion-arrow-right-b', 'ion-arrow-right-c', 'ion-arrow-shrink', 'ion-arrow-swap', 'ion-arrow-up-a', 'ion-arrow-up-b', 'ion-arrow-up-c', 'ion-asterisk', 'ion-at', 'ion-backspace', 'ion-backspace-outline', 'ion-bag', 'ion-battery-charging', 'ion-battery-empty', 'ion-battery-full', 'ion-battery-half', 'ion-battery-low', 'ion-beaker', 'ion-beer', 'ion-bluetooth', 'ion-bonfire', 'ion-bookmark', 'ion-bowtie', 'ion-briefcase', 'ion-bug', 'ion-calculator', 'ion-calendar', 'ion-camera', 'ion-card', 'ion-cash', 'ion-chatbox', 'ion-chatbox-working', 'ion-chatboxes', 'ion-chatbubble', 'ion-chatbubble-working', 'ion-chatbubbles', 'ion-checkmark', 'ion-checkmark-circled', 'ion-checkmark-round', 'ion-chevron-down', 'ion-chevron-left', 'ion-chevron-right', 'ion-chevron-up', 'ion-clipboard', 'ion-clock', 'ion-close', 'ion-close-circled', 'ion-close-round', 'ion-closed-captioning', 'ion-cloud', 'ion-code', 'ion-code-download', 'ion-code-working', 'ion-coffee', 'ion-compass', 'ion-compose', 'ion-connection-bars', 'ion-contrast', 'ion-crop', 'ion-cube', 'ion-disc', 'ion-document', 'ion-document-text', 'ion-drag', 'ion-earth', 'ion-easel', 'ion-edit', 'ion-egg', 'ion-eject', 'ion-email', 'ion-email-unread', 'ion-erlenmeyer-flask', 'ion-erlenmeyer-flask-bubbles', 'ion-eye', 'ion-eye-disabled', 'ion-female', 'ion-filing', 'ion-film-marker', 'ion-fireball', 'ion-flag', 'ion-flame', 'ion-flash', 'ion-flash-off', 'ion-folder', 'ion-fork', 'ion-fork-repo', 'ion-forward', 'ion-funnel', 'ion-gear-a', 'ion-gear-b', 'ion-grid', 'ion-hammer', 'ion-happy', 'ion-happy-outline', 'ion-headphone', 'ion-heart', 'ion-heart-broken', 'ion-help', 'ion-help-buoy', 'ion-help-circled', 'ion-home', 'ion-icecream', 'ion-image', 'ion-images', 'ion-information', 'ion-information-circled', 'ion-ionic', 'ion-ios-alarm', 'ion-ios-alarm-outline', 'ion-ios-albums', 'ion-ios-albums-outline', 'ion-ios-americanfootball', 'ion-ios-americanfootball-outline', 'ion-ios-analytics', 'ion-ios-analytics-outline', 'ion-ios-arrow-back', 'ion-ios-arrow-down', 'ion-ios-arrow-forward', 'ion-ios-arrow-left', 'ion-ios-arrow-right', 'ion-ios-arrow-thin-down', 'ion-ios-arrow-thin-left', 'ion-ios-arrow-thin-right', 'ion-ios-arrow-thin-up', 'ion-ios-arrow-up', 'ion-ios-at', 'ion-ios-at-outline', 'ion-ios-barcode', 'ion-ios-barcode-outline', 'ion-ios-baseball', 'ion-ios-baseball-outline', 'ion-ios-basketball', 'ion-ios-basketball-outline', 'ion-ios-bell', 'ion-ios-bell-outline', 'ion-ios-body', 'ion-ios-body-outline', 'ion-ios-bolt', 'ion-ios-bolt-outline', 'ion-ios-book', 'ion-ios-book-outline', 'ion-ios-bookmarks', 'ion-ios-bookmarks-outline', 'ion-ios-box', 'ion-ios-box-outline', 'ion-ios-briefcase', 'ion-ios-briefcase-outline', 'ion-ios-browsers', 'ion-ios-browsers-outline', 'ion-ios-calculator', 'ion-ios-calculator-outline', 'ion-ios-calendar', 'ion-ios-calendar-outline', 'ion-ios-camera', 'ion-ios-camera-outline', 'ion-ios-cart', 'ion-ios-cart-outline', 'ion-ios-chatboxes', 'ion-ios-chatboxes-outline', 'ion-ios-chatbubble', 'ion-ios-chatbubble-outline', 'ion-ios-checkmark', 'ion-ios-checkmark-empty', 'ion-ios-checkmark-outline', 'ion-ios-circle-filled', 'ion-ios-circle-outline', 'ion-ios-clock', 'ion-ios-clock-outline', 'ion-ios-close', 'ion-ios-close-empty', 'ion-ios-close-outline', 'ion-ios-cloud', 'ion-ios-cloud-download', 'ion-ios-cloud-download-outline', 'ion-ios-cloud-outline', 'ion-ios-cloud-upload', 'ion-ios-cloud-upload-outline', 'ion-ios-cloudy', 'ion-ios-cloudy-night', 'ion-ios-cloudy-night-outline', 'ion-ios-cloudy-outline', 'ion-ios-cog', 'ion-ios-cog-outline', 'ion-ios-color-filter', 'ion-ios-color-filter-outline', 'ion-ios-color-wand', 'ion-ios-color-wand-outline', 'ion-ios-compose', 'ion-ios-compose-outline', 'ion-ios-contact', 'ion-ios-contact-outline', 'ion-ios-copy', 'ion-ios-copy-outline', 'ion-ios-crop', 'ion-ios-crop-strong', 'ion-ios-download', 'ion-ios-download-outline', 'ion-ios-drag', 'ion-ios-email', 'ion-ios-email-outline', 'ion-ios-eye', 'ion-ios-eye-outline', 'ion-ios-fastforward', 'ion-ios-fastforward-outline', 'ion-ios-filing', 'ion-ios-filing-outline', 'ion-ios-film', 'ion-ios-film-outline', 'ion-ios-flag', 'ion-ios-flag-outline', 'ion-ios-flame', 'ion-ios-flame-outline', 'ion-ios-flask', 'ion-ios-flask-outline', 'ion-ios-flower', 'ion-ios-flower-outline', 'ion-ios-folder', 'ion-ios-folder-outline', 'ion-ios-football', 'ion-ios-football-outline', 'ion-ios-game-controller-a', 'ion-ios-game-controller-a-outline', 'ion-ios-game-controller-b', 'ion-ios-game-controller-b-outline', 'ion-ios-gear', 'ion-ios-gear-outline', 'ion-ios-glasses', 'ion-ios-glasses-outline', 'ion-ios-grid-view', 'ion-ios-grid-view-outline', 'ion-ios-heart', 'ion-ios-heart-outline', 'ion-ios-help', 'ion-ios-help-empty', 'ion-ios-help-outline', 'ion-ios-home', 'ion-ios-home-outline', 'ion-ios-infinite', 'ion-ios-infinite-outline', 'ion-ios-information', 'ion-ios-information-empty', 'ion-ios-information-outline', 'ion-ios-ionic-outline', 'ion-ios-keypad', 'ion-ios-keypad-outline', 'ion-ios-lightbulb', 'ion-ios-lightbulb-outline', 'ion-ios-list', 'ion-ios-list-outline', 'ion-ios-location', 'ion-ios-location-outline', 'ion-ios-locked', 'ion-ios-locked-outline', 'ion-ios-loop', 'ion-ios-loop-strong', 'ion-ios-medical', 'ion-ios-medical-outline', 'ion-ios-medkit', 'ion-ios-medkit-outline', 'ion-ios-mic', 'ion-ios-mic-off', 'ion-ios-mic-outline', 'ion-ios-minus', 'ion-ios-minus-empty', 'ion-ios-minus-outline', 'ion-ios-monitor', 'ion-ios-monitor-outline', 'ion-ios-moon', 'ion-ios-moon-outline', 'ion-ios-more', 'ion-ios-more-outline', 'ion-ios-musical-note', 'ion-ios-musical-notes', 'ion-ios-navigate', 'ion-ios-navigate-outline', 'ion-ios-nutrition', 'ion-ios-nutrition-outline', 'ion-ios-paper', 'ion-ios-paper-outline', 'ion-ios-paperplane', 'ion-ios-paperplane-outline', 'ion-ios-partlysunny', 'ion-ios-partlysunny-outline', 'ion-ios-pause', 'ion-ios-pause-outline', 'ion-ios-paw', 'ion-ios-paw-outline', 'ion-ios-people', 'ion-ios-people-outline', 'ion-ios-person', 'ion-ios-person-outline', 'ion-ios-personadd', 'ion-ios-personadd-outline', 'ion-ios-photos', 'ion-ios-photos-outline', 'ion-ios-pie', 'ion-ios-pie-outline', 'ion-ios-pint', 'ion-ios-pint-outline', 'ion-ios-play', 'ion-ios-play-outline', 'ion-ios-plus', 'ion-ios-plus-empty', 'ion-ios-plus-outline', 'ion-ios-pricetag', 'ion-ios-pricetag-outline', 'ion-ios-pricetags', 'ion-ios-pricetags-outline', 'ion-ios-printer', 'ion-ios-printer-outline', 'ion-ios-pulse', 'ion-ios-pulse-strong', 'ion-ios-rainy', 'ion-ios-rainy-outline', 'ion-ios-recording', 'ion-ios-recording-outline', 'ion-ios-redo', 'ion-ios-redo-outline', 'ion-ios-refresh', 'ion-ios-refresh-empty', 'ion-ios-refresh-outline', 'ion-ios-reload', 'ion-ios-reverse-camera', 'ion-ios-reverse-camera-outline', 'ion-ios-rewind', 'ion-ios-rewind-outline', 'ion-ios-rose', 'ion-ios-rose-outline', 'ion-ios-search', 'ion-ios-search-strong', 'ion-ios-settings', 'ion-ios-settings-strong', 'ion-ios-shuffle', 'ion-ios-shuffle-strong', 'ion-ios-skipbackward', 'ion-ios-skipbackward-outline', 'ion-ios-skipforward', 'ion-ios-skipforward-outline', 'ion-ios-snowy', 'ion-ios-speedometer', 'ion-ios-speedometer-outline', 'ion-ios-star', 'ion-ios-star-half', 'ion-ios-star-outline', 'ion-ios-stopwatch', 'ion-ios-stopwatch-outline', 'ion-ios-sunny', 'ion-ios-sunny-outline', 'ion-ios-telephone', 'ion-ios-telephone-outline', 'ion-ios-tennisball', 'ion-ios-tennisball-outline', 'ion-ios-thunderstorm', 'ion-ios-thunderstorm-outline', 'ion-ios-time', 'ion-ios-time-outline', 'ion-ios-timer', 'ion-ios-timer-outline', 'ion-ios-toggle', 'ion-ios-toggle-outline', 'ion-ios-trash', 'ion-ios-trash-outline', 'ion-ios-undo', 'ion-ios-undo-outline', 'ion-ios-unlocked', 'ion-ios-unlocked-outline', 'ion-ios-upload', 'ion-ios-upload-outline', 'ion-ios-videocam', 'ion-ios-videocam-outline', 'ion-ios-volume-high', 'ion-ios-volume-low', 'ion-ios-wineglass', 'ion-ios-wineglass-outline', 'ion-ios-world', 'ion-ios-world-outline', 'ion-ipad', 'ion-iphone', 'ion-ipod', 'ion-jet', 'ion-key', 'ion-knife', 'ion-laptop', 'ion-leaf', 'ion-levels', 'ion-lightbulb', 'ion-link', 'ion-load-a', 'ion-load-b', 'ion-load-c', 'ion-load-d', 'ion-location', 'ion-lock-combination', 'ion-locked', 'ion-log-in', 'ion-log-out', 'ion-loop', 'ion-magnet', 'ion-male', 'ion-man', 'ion-map', 'ion-medkit', 'ion-merge', 'ion-mic-a', 'ion-mic-b', 'ion-mic-c', 'ion-minus', 'ion-minus-circled', 'ion-minus-round', 'ion-model-s', 'ion-monitor', 'ion-more', 'ion-mouse', 'ion-music-note', 'ion-navicon', 'ion-navicon-round', 'ion-navigate', 'ion-network', 'ion-no-smoking', 'ion-nuclear', 'ion-outlet', 'ion-paintbrush', 'ion-paintbucket', 'ion-paper-airplane', 'ion-paperclip', 'ion-pause', 'ion-person', 'ion-person-add', 'ion-person-stalker', 'ion-pie-graph', 'ion-pin', 'ion-pinpoint', 'ion-pizza', 'ion-plane', 'ion-planet', 'ion-play', 'ion-playstation', 'ion-plus', 'ion-plus-circled', 'ion-plus-round', 'ion-podium', 'ion-pound', 'ion-power', 'ion-pricetag', 'ion-pricetags', 'ion-printer', 'ion-pull-request', 'ion-qr-scanner', 'ion-quote', 'ion-radio-waves', 'ion-record', 'ion-refresh', 'ion-reply', 'ion-reply-all', 'ion-ribbon-a', 'ion-ribbon-b', 'ion-sad', 'ion-sad-outline', 'ion-scissors', 'ion-search', 'ion-settings', 'ion-share', 'ion-shuffle', 'ion-skip-backward', 'ion-skip-forward', 'ion-social-android', 'ion-social-android-outline', 'ion-social-angular', 'ion-social-angular-outline', 'ion-social-apple', 'ion-social-apple-outline', 'ion-social-bitcoin', 'ion-social-bitcoin-outline', 'ion-social-buffer', 'ion-social-buffer-outline', 'ion-social-chrome', 'ion-social-chrome-outline', 'ion-social-codepen', 'ion-social-codepen-outline', 'ion-social-css3', 'ion-social-css3-outline', 'ion-social-designernews', 'ion-social-designernews-outline', 'ion-social-dribbble', 'ion-social-dribbble-outline', 'ion-social-dropbox', 'ion-social-dropbox-outline', 'ion-social-euro', 'ion-social-euro-outline', 'ion-social-facebook', 'ion-social-facebook-outline', 'ion-social-foursquare', 'ion-social-foursquare-outline', 'ion-social-freebsd-devil', 'ion-social-github', 'ion-social-github-outline', 'ion-social-google', 'ion-social-google-outline', 'ion-social-googleplus', 'ion-social-googleplus-outline', 'ion-social-hackernews', 'ion-social-hackernews-outline', 'ion-social-html5', 'ion-social-html5-outline', 'ion-social-instagram', 'ion-social-instagram-outline', 'ion-social-javascript', 'ion-social-javascript-outline', 'ion-social-linkedin', 'ion-social-linkedin-outline', 'ion-social-markdown', 'ion-social-nodejs', 'ion-social-octocat', 'ion-social-pinterest', 'ion-social-pinterest-outline', 'ion-social-python', 'ion-social-reddit', 'ion-social-reddit-outline', 'ion-social-rss', 'ion-social-rss-outline', 'ion-social-sass', 'ion-social-skype', 'ion-social-skype-outline', 'ion-social-snapchat', 'ion-social-snapchat-outline', 'ion-social-tumblr', 'ion-social-tumblr-outline', 'ion-social-tux', 'ion-social-twitch', 'ion-social-twitch-outline', 'ion-social-twitter', 'ion-social-twitter-outline', 'ion-social-usd', 'ion-social-usd-outline', 'ion-social-vimeo', 'ion-social-vimeo-outline', 'ion-social-whatsapp', 'ion-social-whatsapp-outline', 'ion-social-windows', 'ion-social-windows-outline', 'ion-social-wordpress', 'ion-social-wordpress-outline', 'ion-social-yahoo', 'ion-social-yahoo-outline', 'ion-social-yen', 'ion-social-yen-outline', 'ion-social-youtube', 'ion-social-youtube-outline', 'ion-soup-can', 'ion-soup-can-outline', 'ion-speakerphone', 'ion-speedometer', 'ion-spoon', 'ion-star', 'ion-stats-bars', 'ion-steam', 'ion-stop', 'ion-thermometer', 'ion-thumbsdown', 'ion-thumbsup', 'ion-toggle', 'ion-toggle-filled', 'ion-transgender', 'ion-trash-a', 'ion-trash-b', 'ion-trophy', 'ion-tshirt', 'ion-tshirt-outline', 'ion-umbrella', 'ion-university', 'ion-unlocked', 'ion-upload', 'ion-usb', 'ion-videocamera', 'ion-volume-high', 'ion-volume-low', 'ion-volume-medium', 'ion-volume-mute', 'ion-wand', 'ion-waterdrop', 'ion-wifi', 'ion-wineglass', 'ion-woman', 'ion-wrench', 'ion-xbox', 'budicon-aid-kit', 'budicon-album', 'budicon-alert', 'budicon-arrow', 'budicon-arrow-1', 'budicon-arrow-2', 'budicon-arrow-3', 'budicon-arrow-diagonal', 'budicon-arrow-diagonal-1', 'budicon-arrow-down', 'budicon-arrow-down-1', 'budicon-arrow-horizontal', 'budicon-arrow-left', 'budicon-arrow-left-1', 'budicon-arrow-left-bottom', 'budicon-arrow-left-top', 'budicon-arrow-right', 'budicon-arrow-right-1', 'budicon-arrow-right-bottom', 'budicon-arrow-right-top', 'budicon-arrow-up', 'budicon-arrow-up-1', 'budicon-arrow-vertical', 'budicon-attachment', 'budicon-author', 'budicon-authors', 'budicon-award', 'budicon-award-1', 'budicon-award-2', 'budicon-backward', 'budicon-bag', 'budicon-bell', 'budicon-bicycle', 'budicon-binoculars', 'budicon-book', 'budicon-book-1', 'budicon-book-2', 'budicon-book-3', 'budicon-book-4', 'budicon-book-5', 'budicon-book-6', 'budicon-bookmark', 'budicon-box', 'budicon-box-1', 'budicon-briefcase', 'budicon-briefcase-1', 'budicon-browser', 'budicon-browser-2', 'budicon-browser-3', 'budicon-browser-4', 'budicon-browser-5', 'budicon-brush', 'budicon-bulb', 'budicon-bus', 'budicon-calculator', 'budicon-camera', 'budicon-camera-1', 'budicon-camera-2', 'budicon-camera-3', 'budicon-camera-4', 'budicon-cancel', 'budicon-cancel-1', 'budicon-cancel-2', 'budicon-cancel-3', 'budicon-cancel-4', 'budicon-car', 'budicon-cash', 'budicon-cash-dollar', 'budicon-cash-euro', 'budicon-cash-pound', 'budicon-cash-yen', 'budicon-check', 'budicon-check-1', 'budicon-check-2', 'budicon-check-3', 'budicon-check-4', 'budicon-clock', 'budicon-clock-1', 'budicon-clock-2', 'budicon-clock-3', 'budicon-cloud', 'budicon-cloud-download', 'budicon-cloud-upload', 'budicon-cocktail', 'budicon-code', 'budicon-coffee', 'budicon-coins', 'budicon-comment', 'budicon-comment-1', 'budicon-comment-2', 'budicon-comment-3', 'budicon-comment-4', 'budicon-comment-5', 'budicon-compass', 'budicon-compass-1', 'budicon-cone', 'budicon-crop', 'budicon-crown', 'budicon-cube', 'budicon-dashboard', 'budicon-date', 'budicon-date-1', 'budicon-date-2', 'budicon-diamond', 'budicon-direction', 'budicon-disk', 'budicon-document', 'budicon-document-1', 'budicon-document-2', 'budicon-document-3', 'budicon-document-4', 'budicon-download', 'budicon-download-1', 'budicon-drop', 'budicon-eject', 'budicon-enlarge', 'budicon-enlarge-1', 'budicon-equal', 'budicon-equalizer', 'budicon-fire', 'budicon-flag', 'budicon-folder', 'budicon-fork-knife', 'budicon-forward', 'budicon-fridge', 'budicon-fullscreen', 'budicon-fullscreen-1', 'budicon-fullscreen-2', 'budicon-fullscreen-3', 'budicon-gameboy', 'budicon-gender-female', 'budicon-gender-male', 'budicon-gift', 'budicon-glass', 'budicon-glasses', 'budicon-globe', 'budicon-graph', 'budicon-grid', 'budicon-grid-1', 'budicon-hammer', 'budicon-headphones', 'budicon-heart', 'budicon-home', 'budicon-home-1', 'budicon-image', 'budicon-image-1', 'budicon-image-2', 'budicon-image-3', 'budicon-image-4', 'budicon-joystick', 'budicon-lab', 'budicon-layout', 'budicon-layout-1', 'budicon-layout-2', 'budicon-layout-3', 'budicon-layout-4', 'budicon-layout-5', 'budicon-layout-6', 'budicon-layout-7', 'budicon-layout-8', 'budicon-layout-9', 'budicon-layout-10', 'budicon-leaf', 'budicon-leaf-1', 'budicon-link', 'budicon-link-1', 'budicon-link-external', 'budicon-link-incoming', 'budicon-list', 'budicon-list-1', 'budicon-list-2', 'budicon-location', 'budicon-location-1', 'budicon-lock', 'budicon-magic-wand', 'budicon-magnet', 'budicon-mail', 'budicon-mail-1', 'budicon-map', 'budicon-meal', 'budicon-megaphone', 'budicon-mic', 'budicon-mic-1', 'budicon-mic-2', 'budicon-microwave', 'budicon-minus', 'budicon-minus-1', 'budicon-minus-2', 'budicon-minus-3', 'budicon-minus-4', 'budicon-mobile', 'budicon-monitor', 'budicon-mouse', 'budicon-network', 'budicon-newspaper', 'budicon-noodle', 'budicon-note', 'budicon-note-1', 'budicon-note-2', 'budicon-note-3', 'budicon-note-4', 'budicon-note-5', 'budicon-note-6', 'budicon-note-7', 'budicon-note-8', 'budicon-note-9', 'budicon-note-10', 'budicon-notebook', 'budicon-pack', 'budicon-pant', 'budicon-paper', 'budicon-paper-plane', 'budicon-pause', 'budicon-pause-1', 'budicon-pen', 'budicon-pencil-1', 'budicon-pencil-2', 'budicon-pencil-3', 'budicon-pencil-4', 'budicon-pie-cart', 'budicon-pie-chart', 'budicon-pin', 'budicon-pin-1', 'budicon-pin-2', 'budicon-pin-3', 'budicon-play', 'budicon-plus', 'budicon-plus-1', 'budicon-plus-2', 'budicon-plus-3', 'budicon-plus-4', 'budicon-pointer', 'budicon-pointer-1', 'budicon-pointer-2', 'budicon-power', 'budicon-presentation', 'budicon-presentation-1', 'budicon-printer', 'budicon-printer-1', 'budicon-profile', 'budicon-puzzle', 'budicon-radio', 'budicon-radion', 'budicon-receipt', 'budicon-receipt-1', 'budicon-redo', 'budicon-repeat', 'budicon-rss', 'budicon-ruler', 'budicon-scissors', 'budicon-search', 'budicon-search-1', 'budicon-search-2', 'budicon-search-3', 'budicon-search-4', 'budicon-search-5', 'budicon-server', 'budicon-setting', 'budicon-share', 'budicon-shirt', 'budicon-shop', 'budicon-shopping-bag', 'budicon-shopping-cart', 'budicon-shopping-cart-1', 'budicon-speaker', 'budicon-speaker-1', 'budicon-star', 'budicon-statistic', 'budicon-stop', 'budicon-sun', 'budicon-support', 'budicon-tag', 'budicon-target', 'budicon-target-1', 'budicon-telephone', 'budicon-tie', 'budicon-time', 'budicon-timer', 'budicon-timer-1', 'budicon-trash', 'budicon-trash-1', 'budicon-tree', 'budicon-tshirt', 'budicon-tv', 'budicon-tv-1', 'budicon-umbrella', 'budicon-undo', 'budicon-upload', 'budicon-upload-1', 'budicon-video', 'budicon-video-1', 'budicon-video-2', 'budicon-volume', 'budicon-volume-1', 'budicon-volume-2', 'budicon-wallet', 'budicon-webcam', 'budicon-window', 'budicon-wrench'
		);
	}
}

/**
 * Custom Comment Markup for morello
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_custom_comment' ) )){
	function ebor_custom_comment( $comment, $args, $depth ) { 
		$GLOBALS['comment'] = $comment; 
	?>
		
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		    <div class="message">
			    <div class="user"><?php echo get_avatar( $comment->comment_author_email, 70 ); ?></div>
			    <div class="message-inner">
			        <div class="info">
			          <?php printf('<h4>%s</h4>', get_comment_author_link()); ?>
			          <div class="meta">
			          	<span class="date"><?php echo get_comment_date(); ?></span>
			          	<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] )) ); ?></span>
			          </div>
			        </div>
			        <?php echo wpautop( get_comment_text() ); ?>
			        <?php if ( $comment->comment_approved == '0' ) : ?>
			        <p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'morello' ) ?></em></p>
			        <?php endif; ?>
			    </div>
		    </div>
	
	<?php }
}