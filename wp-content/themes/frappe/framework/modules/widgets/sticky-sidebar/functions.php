<?php

if(!function_exists('frappe_elated_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function frappe_elated_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'FrappeElatedClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter('frappe_core_filter_register_widgets', 'frappe_elated_register_sticky_sidebar_widget');
}