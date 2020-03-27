<?php

if ( ! function_exists( 'frappe_elated_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function frappe_elated_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_image_gallery_widget' );
}