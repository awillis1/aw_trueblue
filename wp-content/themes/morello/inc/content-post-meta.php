<div class="meta">

	<span class="date">
		<?php the_time( get_option( 'date_format' ) ); ?>
	</span>
	
	<span class="category">
		<?php the_category( ', ' ); ?>
	</span>
	
	<?php if( comments_open() ) : ?> 
		<span class="comments">
			<a href="<?php comments_link(); ?>"><?php comments_number( esc_html__( '0 Comments', 'morello' ), esc_html__( '1 Comment', 'morello' ), esc_html__( '% Comments', 'morello' ) ); ?></a>
		</span>
	<?php endif; ?>
	
	<?php if( is_user_logged_in() ) : ?>
		<span>
			<?php edit_post_link(); ?>
		</span>
	<?php endif; ?>

</div>