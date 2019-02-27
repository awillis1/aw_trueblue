<div id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
	<div class="post-content">
		<div class="row">
		
			<div class="col-md-5">
				<figure class="main">
					<?php the_post_thumbnail( 'ebor-grid' ); ?>
				</figure>
			</div><!-- /column -->
			
			<div class="col-md-7">
				<?php
					get_template_part( 'inc/content-post', 'meta' );
					the_title( '<h3 class="post-title"><a href="'. get_permalink() .'">', '</a></h3>' );
					echo wpautop( wp_trim_words( get_the_excerpt(), 20, '...' ) );
				?>
				<a href="<?php the_permalink(); ?>" class="more"><?php esc_html_e( 'Read more', 'morello' ); ?></a> 
			</div><!-- /column --> 
		
		</div><!-- /.row --> 
	</div><!-- /.post-content --> 
</div><!-- /.post -->