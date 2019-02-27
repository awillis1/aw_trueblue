<div class="item post <?php echo ebor_the_terms( 'portfolio_category', ' ', 'slug' ); ?>">

	<figure>
		<a href="<?php the_permalink(); ?>">
			<div class="overlay">
				<div class="info"><span><?php esc_html_e( 'View Project', 'morello' ); ?></span></div>
			</div><!-- /.overlay -->
			<?php the_post_thumbnail( 'ebor-grid' ); ?>
		</a>
	</figure>
	
	<div class="post-content">
		<?php the_title( '<h3 class="post-title"><a href="'. get_permalink() .'">', '</a></h3>' ); ?>
		<div class="meta"><span class="category"><?php echo ebor_the_terms( 'portfolio_category', ', ', 'link' ); ?></span></div><!-- /.meta --> 
	</div><!-- /.post-content --> 

</div><!-- /.post -->