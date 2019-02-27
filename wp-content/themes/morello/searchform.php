<form class="searchform" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search something', 'morello' ); ?>" />
	<button type="submit" class="btn btn-default"><?php esc_html_e( 'Find', 'morello' ); ?></button>
</form>