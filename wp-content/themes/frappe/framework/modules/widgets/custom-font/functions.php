<?php

if ( ! function_exists( 'frappe_elated_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function frappe_elated_register_custom_font_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_custom_font_widget' );
}