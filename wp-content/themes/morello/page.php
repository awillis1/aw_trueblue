<?php
	get_header();
	the_post();
	
	echo ebor_page_title( get_the_title(), wp_get_attachment_url( get_post_thumbnail_id() ), get_post_meta( $post->ID, '_ebor_page_title_layout', 1 ) );
	
	get_template_part( 'inc/content-wrapper', 'open' );
	
	the_title( '<div class="section-title"><h2>', '</h2></div>' );
	the_content();
	wp_link_pages();
	
	get_template_part( 'inc/content-wrapper', 'close' );
	
	if( comments_open() ) {
		comments_template();
	}

	get_footer();