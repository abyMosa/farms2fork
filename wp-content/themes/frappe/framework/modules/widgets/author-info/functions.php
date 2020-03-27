<?php

if ( ! function_exists( 'frappe_elated_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function frappe_elated_register_author_info_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_author_info_widget' );
}