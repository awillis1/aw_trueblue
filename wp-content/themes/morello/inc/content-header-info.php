<?php
	$phone = get_option( 'header_phone', '+00 (123) 456 78 90' );
	$email = get_option( 'header_email', 'first.last@email.com' );
	
	if( $email ) {
		echo '<li><i class="ion-android-mail"></i> <a href="'. esc_url( 'mailto:'. $email ) .'" class="email-link">'. $email .'</a></li>';
	}
		
	if( $phone ) {
		echo '<li><i class="ion-headphone"></i> '. $phone .' </li>';	
	}
