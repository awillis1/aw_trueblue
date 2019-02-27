<?php 

/**
 * Build theme options
 * Uses the Ebor_Options class found in the ebor-framework plugin
 * Panels are WP 4.0+!!!
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if( class_exists( 'Ebor_Options' ) ){
	$ebor_options = new Ebor_Options;
	
	//Vars
	$theme = wp_get_theme();
	$theme_name = $theme->get( 'Name' );
	$footer_default = '<a href="http://www.tommusrhodus.com">Morello Premium WordPress Theme by TommusRhodus</a>';
	$portfolio_layouts = array_flip(ebor_get_portfolio_layouts());
	$blog_layouts = array_flip(ebor_get_blog_layouts());
	$team_layouts = ebor_get_team_layouts();
	$header_layouts = ebor_get_header_layouts();
	$footer_layouts = ebor_get_footer_layouts();
	
	$social_options = array_values(ebor_get_icons());
	foreach( $social_options as $social_option ){
		$final_social_options[$social_option] = $social_option;
	}
	
	/**
	 * Default stuff
	 * 
	 * Each of these is a default option that appears in each theme, demo data, favicons and a custom css input
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	$ebor_options->add_panel( $theme_name . ': Demo Data', 5, '');
	$ebor_options->add_panel( $theme_name . ': Styling Settings', 205, 'All of the controls in this section directly relate to the styling page of ' . $theme_name);
	$ebor_options->add_section('demo_data_section', 'Import Demo Data', 10, $theme_name . ': Demo Data', '<strong>Please read this before importing demo data via this control:</strong><br /><br />The demo data this will install includes images from my demo site with <strong>heavy blurring applied</strong> this is due to licensing restrictions. Simply replace these images with your own.<br /><br />Note that this process can take up to 15mins on slower servers, go make a cup of tea. If you havn\'t had a notification in 30mins, use the fallback method outlined in the written documentation.<br /><br />');
	$ebor_options->add_section('custom_css_section', 'Custom CSS', 40, $theme_name . ': Styling Settings');
	$ebor_options->add_setting('demo_import', 'demo_import', 'Import Demo Data', 'demo_data_section', '', 10);
	$ebor_options->add_setting('textarea', 'custom_css', 'Custom CSS', 'custom_css_section', '', 30);
	
	$ebor_options->add_panel( $theme_name . ': Footer Settings', 250, '');
	$ebor_options->add_section('footer_settings_section', 'Footer Settings', 50, $theme_name . ': Footer Settings');
	
	/**
	 * Panels
	 * 
	 * add_panel($name, $priority, $description)
	 * 
	 * @since 1.0.0
	 * @author tommusrhodus
	 */
	$ebor_options->add_panel( $theme_name . ': Header Settings', 215, 'All of the controls in this section directly relate to the header and logos of ' . $theme_name);
	
	//Header Settings
	$ebor_options->add_section('logo_settings_section', 'Logo Settings', 10, $theme_name . ': Header Settings');
	$ebor_options->add_section('header_layout_section', 'Header Layout', 5, $theme_name . ': Header Settings', 'This setting controls the theme header site-wide. If you need to you can override this setting on specific posts and pages from within that posts edit screen.');	
	$ebor_options->add_section('header_icons_section', 'Header Icon Settings', 15, $theme_name . ': Header Settings');
	$ebor_options->add_section('subheader_settings_section', 'Sub-Header Settings', 30, $theme_name . ': Header Settings');
	
	//Colours
	$ebor_options->add_setting('color', 'colour_text', 'Text Colour', 'colors', '#595959', 5);
	$ebor_options->add_setting('color', 'colour_headings', 'Headings Colour', 'colors', '#303030', 10);
	$ebor_options->add_setting('color', 'colour_highlight', 'Highlight Colour', 'colors', '#7bc4e6', 15);
	$ebor_options->add_setting('color', 'colour_highlight_hover', 'Highlight Hover Colour', 'colors', '#65b4d9', 20);
	$ebor_options->add_setting('color', 'colour_meta', 'Meta Colour', 'colors', '#707070', 25);
	$ebor_options->add_setting('color', 'colour_white', 'White Colour', 'colors', '#ffffff', 35);
	
	//Portfolio options
	$ebor_options->add_panel( $theme_name . ': Portfolio Settings', 215, 'All of the controls in this section directly relate to portfolio area of ' . $theme_name);
	$ebor_options->add_section('portfolio_layout_section', 'Portfolio Layout', 320, $theme_name . ': Portfolio Settings');
	$ebor_options->add_setting('select', 'portfolio_layout', 'Portfolio Archives Layout', 'portfolio_layout_section', 'detail-3col', 30, $portfolio_layouts);
	
	//Blog Settings
	$ebor_options->add_panel( $theme_name . ': Blog Settings', 215, 'All of the controls in this section directly relate to blog area of ' . $theme_name);
	$ebor_options->add_section('blog_layout_section', 'Blog Layout', 310,  $theme_name . ': Blog Settings');
	$ebor_options->add_setting('select', 'blog_layout', 'Blog Archives Layout', 'blog_layout_section', 'grid-sidebar-right', 10, $blog_layouts);
	$ebor_options->add_setting('input', 'comments_title', 'Comments Title', 'blog_layout_section', 'Would you like to share your thoughts?', 20);
	$ebor_options->add_setting('input', 'comments_subtitle', 'Comments Subtitle', 'blog_layout_section', 'Your email address will not be published. Required fields are marked *', 25);

	$ebor_options->add_section('blog_texts_section', 'Blog Texts', 310,  $theme_name . ': Blog Settings');
	$ebor_options->add_setting('input', 'blog_title', 'Blog Title', 'blog_layout_section', 'Our Blog', 15);
	$ebor_options->add_setting('input', 'blog_subtitle', 'Blog Title', 'blog_layout_section', 'most recent events', 20);

	//Team options
	$ebor_options->add_panel( $theme_name . ': Team Settings', 215, 'All of the controls in this section directly relate to team area of ' . $theme_name);
	$ebor_options->add_section('team_layout_section', 'Team Layout', 320, $theme_name . ': Team Settings');
	$ebor_options->add_setting('select', 'team_layout', 'Team Archives Layout', 'team_layout_section', 'grid', 30, $team_layouts);
	
	//Footer Options
	$ebor_options->add_setting('select', 'footer_layout', 'Global Footer Layout', 'footer_settings_section', 'widgets-dark', 5, $footer_layouts);
	$ebor_options->add_setting('image', 'light_footer_background', 'Light Footer Background Image', 'footer_settings_section', 'http://themes.iki-bir.com/morello/style/images/art/footer1.jpg', 10);
	$ebor_options->add_setting('image', 'white_footer_background', 'White Footer Background Image', 'footer_settings_section', 'http://themes.iki-bir.com/morello/style/images/art/footer2.jpg', 15);
	
	//Header Layout Option
	$ebor_options->add_setting('select', 'header_layout', 'Global Header Layout', 'header_layout_section', 'centered', 5, $header_layouts);

	//Subheader Options
	$ebor_options->add_setting('input', 'header_phone', 'Phone No.', 'subheader_settings_section', '+00 (123) 456 78 90 ', 10);
	$ebor_options->add_setting('input', 'header_email', 'Email', 'subheader_settings_section', 'first.last@email.com', 20);

	//Header Icons
	for( $i = 1; $i < 7; $i++ ){
		$ebor_options->add_setting('select', 'header_social_icon_' . $i, 'Header Social Icon ' . $i, 'header_icons_section', 'none', 20 + $i + $i, $final_social_options);
		$ebor_options->add_setting('input', 'header_social_url_' . $i, 'Header Social URL ' . $i, 'header_icons_section', '', 21 + $i + $i);
	}

	//Logo Options
	$ebor_options->add_setting('image', 'custom_logo', 'Logo', 'logo_settings_section', EBOR_THEME_DIRECTORY . 'style/images/logo.png', 5);
	$ebor_options->add_setting('image', 'custom_logo_retina', 'Retina Logo', 'logo_settings_section', EBOR_THEME_DIRECTORY . 'style/images/logo@2x.png', 10);
	
	//Google Maps Options
	$ebor_options->add_panel( $theme_name . ': Google Maps Settings', 315, 'All of the controls in this section directly relate to google maps area of ' . $theme_name);
	$ebor_options->add_section('gmaps_api_section', 'Google Maps API Key', 310,  $theme_name . ': Google Maps Settings', '<strong>Please Enter Your Maps API Key</strong><br />If you do not have a key, you will need to register for one. You can do so by following our article by <a href="https://tommusrhodus.ticksy.com/article/7769">clicking here</a>.');
	$ebor_options->add_setting('input', 'ebor_gmap_api', 'Google Maps API Key', 'gmaps_api_section', '', 15);
	
}