<?php 

/**
 * Build theme metaboxes
 * Uses the cmb metaboxes class found in the ebor framework plugin
 * More details here: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists( 'ebor_custom_metaboxes' ) )){
	function ebor_custom_metaboxes( $meta_boxes ) {
		
		/**
		 * Setup variables
		 */
		$prefix = '_ebor_';
		
		$social_options = array_values(ebor_get_icons());
		foreach( $social_options as $social_option ){
			$final_social_options[$social_option] = $social_option;
		}
		
		$footer_options = ebor_get_footer_layouts();
		$footer_overrides['none'] = 'Do Not Override Footer Option On This Page';
		foreach( $footer_options as $key => $value ){
			$footer_overrides[$key] = 'Override Footer: ' . $value; 	
		}
		
		$header_options = ebor_get_header_layouts();
		$header_overrides['none'] = 'Do Not Override Header Option On This Page';
		foreach( $header_options as $key => $value ){
			$header_overrides[$key] = 'Override Header: ' . $value; 	
		}
		
		$meta_boxes[] = array(
			'id' 			=> 'page_title_metabox',
			'title' 		=> __( 'Page Title Options', 'morello' ),
			'object_types' 	=> array( 'page', 'post' ), // post type
			'context' 		=> 'side',
			'priority' 		=> 'low',
			'show_names' 	=> true, // Show field names on the left
			'fields' 		=> array(
				array(
					'name' 		=> esc_html__( 'Show Page Title?', 'morello' ),
					'id' 		=> $prefix . 'page_title_layout',
					'type' 		=> 'select',
					'options' 	=> array(
						'no' 					=> 'No Page Title',
						'dark-wrapper' 			=> 'Yes, Light Background',
						'inverse-wrapper' 		=> 'Yes, Dark Background',
						'inverse-wrapper bg' 	=> 'Yes, Image Background (uses featured image)'
					)
				)
			)
		);

		$meta_boxes[] = array(
			'id' 			=> 'post_layout_metabox',
			'title' 		=> esc_html__( 'Post Layout Options', 'morello' ),
			'object_types' 	=> array( 'post' ), // post type
			'context' 		=> 'normal',
			'priority' 		=> 'high',
			'show_names' 	=> true, // Show field names on the left
			'fields' => array(
				array(
					'name' => esc_html__('Disable Post Sidebar','morello'),
					'desc' => esc_html__("Check to disable the sidebar on this post.", 'morello'),
					'id'   => $prefix . 'disable_sidebar',
					'type' => 'checkbox',
				),
				array(
					'name' => esc_html__('Upload Gallery Images', 'morello' ),
					'desc' => esc_html__('Min Height 550px, Max 1400px, Drag & Drop to Reorder', 'morello' ),
					'id'   => $prefix . 'gallery_images',
					'type' => 'file_list',
				),
				array(
					'name' => esc_html__('oEmbed', 'morello' ),
					'desc' => esc_html__('Enter a youtube, twitter, or instagram URL. Supports services listed at http://codex.wordpress.org/Embeds', 'morello' ),
					'id'   => $prefix . 'the_oembed',
					'type' => 'oembed',
				),
			)
		);
		
		$meta_boxes[] = array(
			'id' 			=> 'portfolio_layout_metabox',
			'title' 		=> esc_html__('Post Layout Options', 'morello'),
			'object_types' 	=> array('portfolio'), // post type
			'context' 		=> 'normal',
			'priority' 		=> 'high',
			'show_names' 	=> true, // Show field names on the left
			'fields' => array(
				array(
					'name' => esc_html__('Upload Gallery Images', 'morello' ),
					'desc' => esc_html__('Min Height 550px, Max 1400px, Drag & Drop to Reorder', 'morello' ),
					'id'   => $prefix . 'gallery_images',
					'type' => 'file_list',
				),
				array(
					'name' => esc_html__('oEmbed', 'morello' ),
					'desc' => esc_html__('Enter a youtube, twitter, or instagram URL. Supports services listed at http://codex.wordpress.org/Embeds', 'morello' ),
					'id'   => $prefix . 'the_oembed',
					'type' => 'oembed',
				),
				array(
				    'id'          => $prefix . 'meta_repeat_group',
				    'type'        => 'group',
				    'description' => esc_html__( 'Meta Titles & Descriptions', 'morello' ),
				    'options'     => array(
				        'add_button'    => esc_html__( 'Add Another Entry', 'morello' ),
				        'remove_button' => esc_html__( 'Remove Entry', 'morello' ),
				        'sortable'      => true, // beta
				    ),
				    'fields'      => array(
						array(
							'name' => esc_html__('Additional Item Title', 'morello'),
							'desc' => esc_html__("Title of your Additional Meta", 'morello'),
							'id'   => $prefix . 'the_additional_title',
							'type' => 'text'
						),
						array(
							'name' => esc_html__('Additional Item Detail', 'morello'),
							'desc' => esc_html__("Detail of your Additional Meta", 'morello'),
							'id'   => $prefix . 'the_additional_detail',
							'type' => 'textarea_code'
						),
				    ),
				),
			)
		);
		
		/**
		 * testimonial options
		 */
		$meta_boxes[] = array(
			'id' 			=> 'testimonial_metabox',
			'title' 		=> esc_html__('Testimonial URL', 'morello'),
			'object_types'  => array('testimonial'), // post type
			'context' 		=> 'normal',
			'priority' 		=> 'high',
			'show_names'    => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => esc_html__('Job Title', 'morello'),
					'desc' => '(Optional) Enter a Job Title for this testimonial',
					'id'   => $prefix . 'the_job_title',
					'type' => 'text',
				),
			),
		);
		
		/**
		 * Social Icons for Team Members
		 */
		$meta_boxes[] = array(
			'id' 			=> 'team_social_metabox',
			'title' 		=> esc_html__('Team Member Details', 'morello'),
			'object_types'  => array('team'), // post type
			'context'		=> 'normal',
			'priority' 		=> 'high',
			'show_names' 	=> true, // Show field names on the left
			'fields' => array(
				array(
					'name' => esc_html__('Job Title', 'morello'),
					'desc' => '(Optional) Enter a Job Title for this Team Member',
					'id'   => $prefix . 'the_job_title',
					'type' => 'text',
				),
				array(
				    'id'          => $prefix . 'team_social_icons',
				    'type'        => 'group',
				    'options'     => array(
				        'add_button'    => esc_html__( 'Add Another Icon', 'morello' ),
				        'remove_button' => esc_html__( 'Remove Icon', 'morello' ),
				        'sortable'      => true
				    ),
				    'fields' => array(
						array(
							'name' => 'Social Icon',
							'desc' => 'What icon would you like for this team members first social profile?',
							'id' => $prefix . 'social_icon',
							'type' => 'select',
							'options' => $final_social_options
						),
						array(
							'name' => esc_html__('URL for Social Icon', 'morello'),
							'desc' => esc_html__("Enter the URL for Social Icon 1 e.g www.google.com", 'morello'),
							'id'   => $prefix . 'social_icon_url',
							'type' => 'text_url',
						),
				    ),
				),
			)
		);
		
		/**
		 * Post & Portfolio Header Images
		 */
		$meta_boxes[] = array(
			'id' 			=> 'post_header_metabox',
			'title' 		=> esc_html__('Page Overrides', 'morello'),
			'object_types'  => array('page'), // post type
			'context' 		=> 'normal',
			'priority' 		=> 'low',
			'show_names' 	=> true, // Show field names on the left
			'fields' => array(
				array(
					'name'         => esc_html__( 'Override Header?', 'morello' ),
					'desc'         => esc_html__( 'Header Layout is set in "appearance" -> "customise". To override this for this page only, use this control.', 'morello' ),
					'id'           => $prefix . 'header_override',
					'type'         => 'select',
					'options'      => $header_overrides,
					'std'          => 'none'
				),
				array(
					'name'         => esc_html__( 'Override Footer?', 'morello' ),
					'desc'         => esc_html__( 'Footer Layout is set in "appearance" -> "customise". To override this for this page only, use this control.', 'morello' ),
					'id'           => $prefix . 'footer_override',
					'type'         => 'select',
					'options'      => $footer_overrides,
					'std'          => 'none'
				),
			)
		);
		
		return $meta_boxes;
	}
	add_filter( 'cmb2_meta_boxes', 'ebor_custom_metaboxes' );
}