<?php

if ( ! function_exists( 'frappe_elated_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function frappe_elated_woocommerce_options_map() {
		
		frappe_elated_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'frappe' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = frappe_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'frappe' )
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'frappe' ),
				'default_value' => 'eltdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'frappe' ),
				'options'       => array(
					'eltdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'frappe' ),
					'eltdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'frappe' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'frappe' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'frappe' ),
				'default_value' => 'normal',
				'options'       => frappe_elated_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'frappe' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'frappe' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'frappe' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'frappe' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'frappe' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'frappe' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'frappe' ),
				'default_value' => 'h5',
				'options'       => frappe_elated_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'woo_enable_percent_sign_value',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Percent Sign', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will show percent value mark instead of sale label on products', 'frappe' ),
				'parent'        => $panel_product_list
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = frappe_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'frappe' )
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'frappe' ),
				'parent'        => $panel_single_product,
				'options'       => frappe_elated_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_single_product_title_tag',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'frappe' ),
				'options'       => frappe_elated_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'frappe' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'frappe' ),
					'3' => esc_html__( 'Three', 'frappe' ),
					'2' => esc_html__( 'Two', 'frappe' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'frappe' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'frappe' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'frappe' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'frappe' ),
				'parent'        => $panel_single_product,
				'options'       => frappe_elated_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'frappe' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'frappe' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'frappe' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'frappe' ),
				'default_value' => 'eltdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'frappe' ),
				'options'       => array(
					'eltdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'frappe' ),
					'eltdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'frappe' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('frappe_elated_woocommerce_additional_options_map');
	}
	
	add_action( 'frappe_elated_action_options_map', 'frappe_elated_woocommerce_options_map', 21 );
}