<div class="item post <?php echo ebor_the_terms( 'portfolio_category', ' ', 'slug' ); ?>">
	<figure>
		<a class="lgitem" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" data-sub-html="#caption<?php the_ID(); ?>">
		
			<div class="overlay">
				<?php the_title( '<div class="info"><span>', '</span></div>' ); ?>
			</div><!-- /.overlay -->
			
			<div id="caption<?php the_ID(); ?>" class="hidden">
				<?php
					the_title( '<h3>', '</h3>' );
					the_excerpt()
				?>
			</div><!-- /.hidden --> 
			
			<?php the_post_thumbnail( 'ebor-grid' ); ?>
			
		</a>
	</figure>
</div><!-- /.post -->