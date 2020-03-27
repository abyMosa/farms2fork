<?php

if ( ! function_exists( 'frappe_elated_map_woocommerce_meta' ) ) {
	function frappe_elated_map_woocommerce_meta() {
		
		$woocommerce_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'frappe' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'frappe' ),
				'description' => esc_html__( 'Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'frappe' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'frappe' ),
					'small'              => esc_html__( 'Small', 'frappe' ),
					'large-width'        => esc_html__( 'Large Width', 'frappe' ),
					'large-height'       => esc_html__( 'Large Height', 'frappe' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'frappe' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'frappe' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'frappe' ),
				'options'       => frappe_elated_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'frappe' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_woocommerce_meta', 99 );
}