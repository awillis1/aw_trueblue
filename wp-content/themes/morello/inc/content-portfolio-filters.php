<?php $cats = get_categories( 'taxonomy=portfolio_category' ); ?>

<div class="isotope-filter button-group">
	<ul>
		<li><a class="button is-checked" data-filter="*"><?php esc_html_e( 'All', 'morello' ); ?></a></li>
		<?php
			if( is_array( $cats ) ){
				foreach( $cats as $cat ){
					echo '<li><a href="#" data-filter=".'. esc_attr( $cat->slug ) .'" class="button"> '. $cat->name .' </a></li>';
				}
			}
		?>
	</ul>
</div>
<div class="clearfix"></div>