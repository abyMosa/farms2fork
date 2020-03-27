<?php

if ( ! function_exists( 'frappe_elated_map_footer_meta' ) ) {
	function frappe_elated_map_footer_meta() {
		
		$footer_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'frappe_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'frappe' ),
				'name'  => 'footer_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'frappe' ),
				'options'       => frappe_elated_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = frappe_elated_add_admin_container(
			array(
				'name'       => 'eltdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'eltdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			frappe_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'frappe' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'frappe' ),
					'options'       => frappe_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			frappe_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'frappe' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'frappe' ),
					'options'       => frappe_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

        frappe_elated_create_meta_box_field(
            array(
                'name'          => 'eltdf_footer_in_grid_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Footer in Grid', 'frappe' ),
                'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'frappe' ),
                'options'       => frappe_elated_get_yes_no_select_array(),
                'dependency' => array(
                    'hide' => array(
                        'eltdf_show_footer_top_meta' => array('', 'no'),
                        'eltdf_show_footer_bottom_meta' => array('', 'no')
                    )
                ),
                'parent'        => $show_footer_meta_container
            )
        );

        frappe_elated_create_meta_box_field(
            array(
                'name'          => 'eltdf_uncovering_footer_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Uncovering Footer', 'frappe' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'frappe' ),
                'options'       => frappe_elated_get_yes_no_select_array(),
                'parent'        => $show_footer_meta_container,
            )
        );
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_footer_meta', 70 );
}