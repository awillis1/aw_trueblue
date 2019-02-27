<div class="blog list-view featured">
	<div class="blog-posts row">
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				/**
				 * Get blog posts by blog layout.
				 */
				get_template_part( 'loop/content-post', 'list-no-sidebar' );
			
			endwhile;	
			else : 
				
				/**
				 * Display no posts message if none are found.
				 */
				get_template_part( 'loop/content', 'none' );
				
			endif;
		?>
	</div><!-- /.blog-posts --> 
</div><!-- /.blog --> 