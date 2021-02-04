<?php

if ( ! function_exists( 'playerx_edge_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function playerx_edge_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'PlayerxEdgeClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'playerx_edge_filter_register_widgets', 'playerx_edge_register_image_gallery_widget' );
}