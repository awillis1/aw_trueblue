<?php $additional = get_post_meta( $post->ID, '_ebor_meta_repeat_group', true ); ?>

<ul class="item-details">
	<li> <strong><?php esc_html_e( 'Categories', 'morello' ); ?>:</strong> <?php echo ebor_the_terms( 'portfolio_category', ', ', 'link' ); ?></li>
	
	<?php 
		if( $additional ){
			foreach( $additional as $index => $item ){
				echo '<li><strong>';
				if( isset ( $item['_ebor_the_additional_title'] ) ) {
					echo wp_kses_post( $item['_ebor_the_additional_title'] );
				}
				echo ':</strong> ';
				if( isset ( $item['_ebor_the_additional_detail'] ) ) {
					echo wp_kses_post( $item['_ebor_the_additional_detail'] );
				}
				echo '</li>';
			}
		}
	?>

	<li><strong><?php esc_html_e( 'Share', 'morello' ); ?>:</strong>
		<ul class="goodshare-wrapper">
			<li> <a href="#" class="goodshare ion-social-facebook" data-type="fb"></a> </li>
			<li><a href="#" class="goodshare ion-social-twitter" data-type="tw"></a> </li>
			<li><a href="#" class="goodshare ion-social-pinterest" data-type="pt"></a> </li>
			<li><a href="#" class="goodshare ion-social-tumblr" data-type="tm"></a> </li>
		</ul><!-- /.goodshare-wrapper --> 
	</li>
	
</ul>