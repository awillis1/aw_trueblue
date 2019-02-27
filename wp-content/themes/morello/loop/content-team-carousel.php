<?php 
	$icons = get_post_meta( $post->ID, '_ebor_team_social_icons', true );
	$protocols = array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet', 'skype' );
?>

<div class="item">
	<div class="box">
	
		<div class="icon icon-img"> 
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</div>
		
		<div class="info">
		
			<?php 
				the_title( '<h4><a href="'. get_permalink() .'">', '</a></h4><span class="meta">'. get_post_meta( $post->ID, '_ebor_the_job_title', 1 ) .'</span>' ); 
				the_excerpt();
			?> 
			
			<div class="divide20"></div>
			
			<?php if( is_array($icons) ) : ?>
				<ul class="social">
					<?php 
						foreach( $icons as $key => $icon ){
							if(!( isset( $icon['_ebor_social_icon_url'] ) )) {
								continue;
							}
								
							echo '<li><a href="'. esc_url( $icon['_ebor_social_icon_url'], $protocols ) .'" target="_blank"><i class="'. esc_attr( $icon['_ebor_social_icon'] ) .'"></i></a></li>';
						}
					?>
				</ul>
			<?php endif; ?>
			
		</div>
		
	</div>
</div><!--/.item -->