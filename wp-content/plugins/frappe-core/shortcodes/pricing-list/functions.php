<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Eltdf_Pricing_List extends WPBakeryShortCodesContainer {}
}

if(!function_exists('frappe_core_add_pricing_list_shortcodes')) {
	function frappe_core_add_pricing_list_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'FrappeCore\CPT\Shortcodes\PricingList\PricingList',
			'FrappeCore\CPT\Shortcodes\PricingListItem\PricingListItem'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('frappe_core_filter_add_vc_shortcode', 'frappe_core_add_pricing_list_shortcodes');
}

if( !function_exists('frappe_core_set_pricing_list_icon_class_name_for_vc_shortcodes') ) {
	/**
	 * Function that set custom icon class name for video button shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function frappe_core_set_pricing_list_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
		$shortcodes_icon_class_array[] = '.icon-wpb-pricing-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-pricing-list-item';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter('frappe_core_filter_add_vc_shortcodes_custom_icon_class', 'frappe_core_set_pricing_list_icon_class_name_for_vc_shortcodes');
}