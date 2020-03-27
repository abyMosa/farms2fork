<?php

if ( ! function_exists( 'frappe_elated_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function frappe_elated_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'frappe' );
		
		return $type;
	}
	
	add_filter( 'frappe_elated_filter_title_type_global_option', 'frappe_elated_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'frappe_elated_filter_title_type_meta_boxes', 'frappe_elated_set_title_standard_with_breadcrumbs_type_for_options' );
}