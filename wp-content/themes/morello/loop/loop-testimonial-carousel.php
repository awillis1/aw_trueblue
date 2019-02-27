<div class="thin">
	<div class="carousel-wrapper">
		<div class="carousel testimonials1">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					/**
					 * Get blog posts by blog layout.
					 */
					get_template_part( 'loop/content-testimonial', 'carousel' );
				
				endwhile;	
				else : 
					
					/**
					 * Display no posts message if none are found.
					 */
					get_template_part( 'loop/content', 'none' );
					
				endif;
			?>
		</div><!--/.carousel --> 
	</div><!--/.carousel-wrapper -->
</div>