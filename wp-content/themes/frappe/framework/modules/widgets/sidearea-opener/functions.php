<?php

if ( ! function_exists( 'frappe_elated_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function frappe_elated_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_sidearea_opener_widget' );
}