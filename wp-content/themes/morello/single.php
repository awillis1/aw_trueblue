<?php
	get_header();
	the_post();
	
	echo ebor_page_title( get_the_title(), wp_get_attachment_url( get_post_thumbnail_id() ), get_post_meta( $post->ID, '_ebor_page_title_layout', 1 ) );
	
	//Sidebar controls
	$sidebar = ( is_active_sidebar( 'primary' ) && get_post_meta( $post->ID, '_ebor_disable_sidebar', true ) !=='on' ) ? true : false;
	$class = ( $sidebar ) ? 'col-md-8' : 'col-md-8 col-md-offset-2';
	
	get_template_part( 'inc/content-wrapper', 'open' );
?>
  
<div id="post-<?php the_ID(); ?>" class="blog classic-view row">

	<div class="<?php echo esc_attr( $class ); ?> blog-content">
	
		<div class="blog-posts">
			<div <?php post_class( 'post' ); ?>>
				<div class="post-content">
					<?php
						get_template_part( 'inc/content-format', get_post_format() );
						get_template_part( 'inc/content-post', 'meta' );
						the_title( '<h3 class="post-title">', '</h3>' );
						the_content();
						wp_link_pages();
						the_tags( '<div class="pull-left"><strong>'. esc_html__( 'Tags', 'morello' ) .':</strong><div class="meta tags">', ', ', '</div></div>' );
						get_template_part( 'inc/content-post', 'sharing' );
					?>
				</div><!-- /.post-content --> 
			</div><!-- /.post --> 
		</div><!-- /.blog-posts -->
		
		<?php
			if( comments_open() ) {
				comments_template();
			}
		?>
	
	</div><!-- /.blog-content -->
	
	<?php 
		if( $sidebar ) {
			get_sidebar(); 
		}
	?>

</div><!-- /.blog --> 

<?php 
	get_template_part( 'inc/content-wrapper', 'close' );
	get_footer();