<?php

if ( ! function_exists( 'frappe_elated_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function frappe_elated_register_separator_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_separator_widget' );
}