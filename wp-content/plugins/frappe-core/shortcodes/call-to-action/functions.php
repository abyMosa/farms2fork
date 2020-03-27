<?php

if ( ! function_exists( 'frappe_core_add_call_to_action_shortcodes' ) ) {
	function frappe_core_add_call_to_action_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'FrappeCore\CPT\Shortcodes\CallToAction\CallToAction'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'frappe_core_filter_add_vc_shortcode', 'frappe_core_add_call_to_action_shortcodes' );
}

if ( ! function_exists( 'frappe_core_set_call_to_action_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for call to action shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function frappe_core_set_call_to_action_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-call-to-action';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'frappe_core_filter_add_vc_shortcodes_custom_icon_class', 'frappe_core_set_call_to_action_icon_class_name_for_vc_shortcodes' );
}