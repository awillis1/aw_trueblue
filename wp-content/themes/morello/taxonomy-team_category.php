<?php 
	get_header(); 
	get_template_part( 'inc/content-wrapper', 'open');
	get_template_part( 'loop/loop-team', get_option( 'team_layout', 'grid' ));
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();