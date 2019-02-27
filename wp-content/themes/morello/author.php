<?php 
	get_header(); 
	
	$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
	echo ebor_page_title( esc_html__( 'Posts By: ', 'morello' ) . $author->display_name );		
	
	get_template_part( 'inc/content-wrapper', 'open' );
	get_template_part( 'loop/loop-post', get_option( 'blog_layout', 'grid-sidebar-right' ) );
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();