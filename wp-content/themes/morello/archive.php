<?php 
	get_header(); 
	
	$term = get_queried_object();
	echo ebor_page_title( esc_html__('Posts In: ', 'morello' ) . $term->name );	
	
	get_template_part( 'inc/content-wrapper', 'open' );
	get_template_part( 'loop/loop-post', get_option( 'blog_layout', 'grid-sidebar-right' ) );
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();