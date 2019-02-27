<div class="carousel-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
	<div class="carousel team-carousel border-box icon-top text-center">
		<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				/**
				 * Get blog posts by blog layout.
				 */
				get_template_part( 'loop/content-team', 'carousel' );
			
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