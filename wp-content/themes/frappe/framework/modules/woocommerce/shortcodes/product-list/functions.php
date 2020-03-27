<?php

if ( ! function_exists( 'frappe_elated_add_product_list_shortcode' ) ) {
	function frappe_elated_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'FrappeCore\CPT\Shortcodes\ProductList\ProductList',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( frappe_elated_core_plugin_installed() ) {
		add_filter( 'frappe_core_filter_add_vc_shortcode', 'frappe_elated_add_product_list_shortcode' );
	}
}

if ( ! function_exists( 'frappe_elated_add_product_list_into_shortcodes_list' ) ) {
	function frappe_elated_add_product_list_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'eltdf_product_list';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'frappe_elated_filter_woocommerce_shortcodes_list', 'frappe_elated_add_product_list_into_shortcodes_list' );
}