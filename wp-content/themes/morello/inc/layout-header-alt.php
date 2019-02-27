<div class="navbar navbar-default default classic" role="navigation">

	<div class="top-bar inverse-wrapper">
		<div class="container">
		
			<ul class="info">
				<?php get_template_part( 'inc/content-header', 'info' ); ?>
			</ul><!-- /.info -->
			
			<div class="social-wrapper text-right">
				<?php get_template_part( 'inc/content-header', 'social' ); ?>
			</div><!--/.social-wrapper --> 
			
		</div><!-- /.container --> 
	</div><!-- /.top-bar -->
	
	<div class="container">
	
		<div class="navbar-header">
		
			<div class="navbar-brand">
				<?php get_template_part( 'inc/content-header', 'logo' ); ?>
			</div>
			
			<?php get_template_part( 'inc/content-header', 'mobile-toggle' ); ?>
		
		</div><!-- /.nav-header -->
		
		<div class="navbar-collapse collapse">
			<?php get_template_part( 'inc/content-header', 'menu' ); ?>
		</div><!--/.nav-collapse --> 
	
	</div><!--/.container --> 

</div><!--/.navbar -->