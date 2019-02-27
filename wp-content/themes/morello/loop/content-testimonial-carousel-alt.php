<div class="item">
	<div class="box">
		<div class="quote">
		
			<blockquote>
				<?php echo wpautop( get_the_content() ); ?>
			</blockquote>
			
			<div class="author">
				<div class="icon icon-img"> 
					<?php the_post_thumbnail( 'thumbnail' ); ?>
				</div>
				<div class="info">
					<?php the_title( '<h5>', '</h5><span class="meta">'. get_post_meta( $post->ID, '_ebor_the_job_title', 1 ) .'</span>' ); ?> 
				</div>
			</div><!--/.author --> 
			
		</div><!--/.quote --> 
	</div><!--/.box --> 
</div><!--/.item -->