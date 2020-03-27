<?php

if ( ! function_exists( 'frappe_elated_register_opening_hours_widget' ) ) {
	/**
	 * Function that register opening hours widget
	 */
	function frappe_elated_register_opening_hours_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassOpeningHoursWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_opening_hours_widget' );
}