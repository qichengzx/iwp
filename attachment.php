<?php
/*
Template Name: 附件
*/
?>
<?php 
if ( wp_attachment_is_image() ) {
	echo ' <span class="meta-sep">|</span>  ';
	$metadata = wp_get_attachment_metadata();
	printf( __( 'Full size is %s pixels', 'twentyten'),
	sprintf( '<a href="%1$s" title="%2$s">%3$s × %4$s</a>',
		wp_get_attachment_url(),
		esc_attr( __('Link to full-size image', 'twentyten') ),
			$metadata['width'],
			$metadata['height']
		)
	);
}
?>