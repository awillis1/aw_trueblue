<?php
	get_header();
	the_post();
	
	get_template_part( 'inc/content-wrapper', 'open' );
?>
  
<div id="post-<?php the_ID(); ?>" class="blog classic-view row">
	<div class="col-sm-12 blog-content">
		<div class="blog-posts">
		
			<?php get_template_part( 'inc/content-format', get_post_format() ); ?>
			
			<div <?php post_class( 'post row' ); ?>>
			
				<?php the_title( '<div class="col-sm-12"><h2 class="post-title">', '</h2></div>' ); ?>
			
				<div class="post-content col-sm-8">
					<?php
						the_content();
						wp_link_pages();
					?>
				</div><!-- /.post-content --> 
				
				<div class="col-sm-4">
					<?php get_template_part( 'inc/content-portfolio', 'meta' ); ?>
				</div>
				
			</div><!-- /.post --> 
			
		</div><!-- /.blog-posts -->
	</div><!-- /.blog-content -->
</div><!-- /.blog --> 

<?php 
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();