<?php

if ( ! function_exists( 'frappe_elated_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function frappe_elated_register_button_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_button_widget' );
}