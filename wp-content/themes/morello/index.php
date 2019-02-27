<?php 
	get_header(); 
	get_template_part( 'inc/content-wrapper', 'open' );
	get_template_part( 'loop/loop-post', get_option( 'blog_layout', 'grid-sidebar-right' ) );
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();