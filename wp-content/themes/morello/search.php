<?php 
	get_header(); 
	
	$total_results = $wp_query->found_posts;
	$items = ( $total_results == '1' ) ? esc_html__( ' Item', 'morello' ) : esc_html__( ' Items', 'morello' );
	echo ebor_page_title( esc_html( ucfirst( get_search_query() ) ) . esc_html__( ', Found: ' , 'morello' ) . $total_results . $items );		
	
	get_template_part( 'inc/content-wrapper', 'open' );
	get_template_part( 'loop/loop-post', get_option( 'blog_layout', 'grid-sidebar-right' ) );
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();