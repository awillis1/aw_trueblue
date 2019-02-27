<?php 
	get_header();
	echo ebor_page_title( esc_html__( 'Whoops, 404', 'morello' ) );
	get_template_part( 'inc/content-wrapper', 'open' );
	get_template_part( 'loop/content', 'none ');
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();