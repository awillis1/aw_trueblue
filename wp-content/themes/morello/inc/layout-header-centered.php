<div class="navbar navbar-default default extended centered" role="navigation">

	<div class="container">
		<div class="navbar-header">
		
			<div class="social-wrapper text-left">
				<?php get_template_part( 'inc/content-header', 'social' ); ?>
			</div><!--/.social-wrapper -->
			
			<div class="navbar-brand text-center">
				<?php get_template_part( 'inc/content-header', 'logo' ); ?>
			</div>
			
			<ul class="info text-right">
				<?php get_template_part( 'inc/content-header', 'info' ); ?>
			</ul><!-- /.info -->
			
			<?php get_template_part( 'inc/content-header', 'mobile-toggle' ); ?>
			
		</div><!-- /.nav-header --> 
	</div><!--/.container -->
	
	<div class="navbar-collapse collapse">
		<div class="container">
			<?php get_template_part( 'inc/content-header', 'menu' ); ?>
		</div><!--/.container --> 
	</div><!--/.nav-collapse --> 

</div><!--/.navbar -->