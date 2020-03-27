<?php

if ( ! function_exists( 'frappe_elated_register_icon_with_text_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function frappe_elated_register_icon_with_text_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassIconWithTextWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_icon_with_text_widget' );
}