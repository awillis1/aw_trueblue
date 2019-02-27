<?php
	if ( has_nav_menu( 'primary' ) ){
		wp_nav_menu( 
			array(
			    'theme_location'    => 'primary',
			    'depth'             => 3,
			    'container'         => false,
			    'container_class'   => false,
			    'menu_class'        => 'nav navbar-nav',
			    'menu_id'           => 'menu-standard-navigation',
			    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			    'walker'            => new ebor_bootstrap_navwalker()
			)
		);
	}