<?php

/**
 * Load Theme Support on Init
 */
if(!( function_exists( 'ebor_add_editor_styles' ) )){
	function ebor_add_editor_styles() {
		/**
		 * Add WP Editor Styling
		 */
	    add_editor_style( 'admin/editor-style.css' );
	    
	    /**
	     * Set Content Width
	     */
	    global $content_width;
	    if ( ! isset( $content_width ) ) $content_width = 1170;
	    
	    remove_post_type_support( 'portfolio', 'comments' );
	}
	add_action( 'init', 'ebor_add_editor_styles', 10 );
}

/**
 * Load Theme Support after_theme_setup
 */
if(!( function_exists( 'ebor_add_theme_support' ) )){
	function ebor_add_theme_support() {
		
		/**
		 * Add post thumbnail (featured image) support
		 */
		add_theme_support( 'post-thumbnails' );
		
		/**
		 * Image Sizes used in the theme
		 */
		add_image_size( 'ebor-admin-list-thumb', 85, 85, true );
		add_image_size( 'ebor-grid', 440, 300, true );
		add_image_size( 'ebor-square', 440, 440, true );
		
		add_theme_support( 'title-tag' );
		
		/**
		 * Add Custom Background Support and Set Default
		 */
		add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );
		
		/**
		 * Add feed link support
		 */
		add_theme_support( 'automatic-feed-links' );
		
		/**
		 * Add html5 support
		 */
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
		
		add_theme_support( 'post-formats', array( 'gallery', 'video' ) );
		
		/**
		 * Load Translation Files
		 */
		load_theme_textdomain( 'morello', trailingslashit( get_template_directory() ) . 'languages' );
		
		add_post_type_support( 'testimonial', array( 'thumbnail' ) );

		/**
		 * Gutenberg
		 */
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );

	}
	add_action( 'after_setup_theme', 'ebor_add_theme_support', 10 );
}