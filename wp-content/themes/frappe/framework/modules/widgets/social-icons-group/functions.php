<?php

if ( ! function_exists( 'frappe_elated_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function frappe_elated_register_social_icons_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_social_icons_widget' );
}