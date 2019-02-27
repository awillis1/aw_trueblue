<div id="post-<?php the_ID(); ?>" class="col-sm-6 col-md-4 grid-view-post">
	<div <?php post_class( 'post' ); ?>>
	
		<figure class="main">
			<?php the_post_thumbnail( 'ebor-grid' ); ?>
		</figure>
		
		<div class="box ">
			<?php 
				get_template_part( 'inc/content-post', 'meta-small' );
				the_title( '<h3 class="post-title"><a href="'. get_permalink() .'">', '</a></h3>' ); 
			?>
			<a href="<?php the_permalink(); ?>" class="more"><?php esc_html_e( 'Read more', 'morello' ); ?></a> 
		</div><!-- /.box --> 
	
	</div><!-- /.post --> 
</div><!-- /column -->