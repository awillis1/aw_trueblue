<?php 
	get_header(); 
	get_template_part( 'inc/content-wrapper', 'open' );
	get_template_part( 'loop/loop-portfolio', get_option( 'portfolio_layout', 'detail-3col' ) );
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();