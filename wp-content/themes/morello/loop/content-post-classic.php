<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
	<div class="post-content">
		<?php
			get_template_part( 'inc/content-format', get_post_format() );
			get_template_part( 'inc/content-post', 'meta' );
			the_title( '<h3 class="post-title"><a href="'. get_permalink() .'">', '</a></h3>' );
			the_excerpt();
		?>
		<a href="<?php the_permalink(); ?>" class="more"><?php esc_html_e( 'Read more', 'morello' ); ?></a> 
	</div><!-- /.post-content --> 
</div><!-- /.post -->