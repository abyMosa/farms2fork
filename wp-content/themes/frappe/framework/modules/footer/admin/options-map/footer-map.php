<?php

if ( ! function_exists( 'frappe_elated_footer_options_map' ) ) {
	function frappe_elated_footer_options_map() {

		frappe_elated_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'frappe' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = frappe_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'frappe' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		frappe_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'frappe' ),
				'parent'        => $footer_panel
			)
		);

        frappe_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'frappe' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'frappe' ),
                'parent'        => $footer_panel,
            )
        );

		frappe_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'frappe' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = frappe_elated_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4 4 4',
				'label'         => esc_html__( 'Footer Top Columns', 'frappe' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'frappe' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'frappe' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'frappe' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'frappe' ),
					'left'   => esc_html__( 'Left', 'frappe' ),
					'center' => esc_html__( 'Center', 'frappe' ),
					'right'  => esc_html__( 'Right', 'frappe' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		frappe_elated_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'frappe' ),
				'description' => esc_html__( 'Set background color for top footer area', 'frappe' ),
				'parent'      => $show_footer_top_container
			)
		);

		frappe_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'frappe' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = frappe_elated_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		frappe_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '4 4 4',
				'label'         => esc_html__( 'Footer Bottom Columns', 'frappe' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'frappe' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		frappe_elated_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'frappe' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'frappe' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'frappe_elated_action_options_map', 'frappe_elated_footer_options_map', 10 );
}