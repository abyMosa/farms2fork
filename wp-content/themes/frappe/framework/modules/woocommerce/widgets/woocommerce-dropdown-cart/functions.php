<?php

if ( ! function_exists( 'frappe_elated_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function frappe_elated_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'FrappeElatedClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'frappe_core_filter_register_widgets', 'frappe_elated_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'frappe_elated_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function frappe_elated_get_dropdown_cart_icon_class() {
		$dropdown_cart_icon_source = frappe_elated_options()->getOptionValue( 'dropdown_cart_icon_source' );
		
		$dropdown_cart_icon_class_array = array(
			'eltdf-header-cart'
		);
		
		$dropdown_cart_icon_class_array[] = $dropdown_cart_icon_source == 'icon_pack' ? 'eltdf-header-cart-icon-pack' : 'eltdf-header-cart-svg-path';
		
		return $dropdown_cart_icon_class_array;
	}
}

if ( ! function_exists( 'frappe_elated_get_dropdown_cart_icon_html' ) ) {
	/**
	 * Returns dropdown cart icon HTML
	 */
	function frappe_elated_get_dropdown_cart_icon_html() {
		$dropdown_cart_icon_source   = frappe_elated_options()->getOptionValue( 'dropdown_cart_icon_source' );
		$dropdown_cart_icon_pack     = frappe_elated_options()->getOptionValue( 'dropdown_cart_icon_pack' );
		$dropdown_cart_icon_svg_path = frappe_elated_options()->getOptionValue( 'dropdown_cart_icon_svg_path' );
		
		$dropdown_cart_icon_html = '';
		
		if ( ( $dropdown_cart_icon_source == 'icon_pack' ) && ( isset( $dropdown_cart_icon_pack ) ) ) {
			$dropdown_cart_icon_html .= frappe_elated_icon_collections()->getDropdownCartIcon( $dropdown_cart_icon_pack );
		} else if ( isset( $dropdown_cart_icon_svg_path ) ) {
			$dropdown_cart_icon_html .= $dropdown_cart_icon_svg_path;
		}
		
		return $dropdown_cart_icon_html;
	}
}