<div class="portfolio-grid detailed col4">

	<?php get_template_part('inc/content-portfolio','filters'); ?>
	
	<div class="items-wrapper">
		<div class="isotope items">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					/**
					 * Get blog posts by blog layout.
					 */
					get_template_part( 'loop/content-portfolio', 'detail' );
				
				endwhile;	
				else : 
					
					/**
					 * Display no posts message if none are found.
					 */
					get_template_part( 'loop/content', 'none' );
					
				endif;
			?>
		</div><!--/.isotope --> 
	</div><!--/.items-wrapper --> 

</div><!--/.portfolio-grid --> 