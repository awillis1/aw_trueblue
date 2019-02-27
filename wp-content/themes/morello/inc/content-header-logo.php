<?php 
	$default_light = get_option( 'custom_logo', EBOR_THEME_DIRECTORY . 'style/images/logo.png' );
	$default_light_retina = get_option( 'custom_logo_retina', EBOR_THEME_DIRECTORY . 'style/images/logo@2x.png' );
?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<img 
		src="#" 
		srcset="<?php echo esc_url( $default_light ); ?> 1x, <?php echo esc_url( $default_light_retina ); ?> 2x" 
		alt="<?php bloginfo( 'title' ); ?>" 
	/>
</a>