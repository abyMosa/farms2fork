<?php

if ( ! function_exists( 'frappe_elated_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function frappe_elated_register_search_opener_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_search_opener_widget' );
}