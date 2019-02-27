<figure class="media-wrapper player main">
	<?php echo wp_oembed_get( get_post_meta( $post->ID, '_ebor_the_oembed', 1 ) ); ?>
</figure>