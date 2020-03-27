<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'frappe_elated_title_area_typography_style' ) ) {
	function frappe_elated_title_area_typography_style() {
		
		// title default/small style
		
		$item_styles = frappe_elated_get_typography_styles( 'page_title' );
		
		$item_selector = array(
			'.eltdf-title-holder .eltdf-title-wrapper .eltdf-page-title'
		);
		
		echo frappe_elated_dynamic_css( $item_selector, $item_styles );
		
		// subtitle style
		
		$item_styles = frappe_elated_get_typography_styles( 'page_subtitle' );
		
		$item_selector = array(
			'.eltdf-title-holder .eltdf-title-wrapper .eltdf-page-subtitle'
		);
		
		echo frappe_elated_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'frappe_elated_action_style_dynamic', 'frappe_elated_title_area_typography_style' );
}