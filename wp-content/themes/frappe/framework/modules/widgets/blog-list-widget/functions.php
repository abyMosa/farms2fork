<?php

if ( ! function_exists( 'frappe_elated_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function frappe_elated_register_blog_list_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_blog_list_widget' );
}