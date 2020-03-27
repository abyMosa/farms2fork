<?php

if ( ! function_exists( 'frappe_elated_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function frappe_elated_register_icon_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_icon_widget' );
}