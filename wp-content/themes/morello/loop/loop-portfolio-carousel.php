<div class="carousel-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
	<div class="owl-posts portfolio-carousel">
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				/**
				 * Get blog posts by blog layout.
				 */
				get_template_part( 'loop/content-portfolio', 'carousel' );
			
			endwhile;	
			else : 
				
				/**
				 * Display no posts message if none are found.
				 */
				get_template_part( 'loop/content', 'none' );
				
			endif;
		?>
	</div><!-- /.portfolio-carousel --> 
</div><!-- /.carousel-wrapper --> 