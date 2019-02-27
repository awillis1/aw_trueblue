<?php
	get_header();
	the_post();
	echo ebor_page_title( get_the_title(), wp_get_attachment_url( get_post_thumbnail_id() ), get_post_meta( $post->ID, '_ebor_page_title_layout', 1 ) );
	the_content();
	get_footer();