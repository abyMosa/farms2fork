<?php

if ( ! function_exists( 'frappe_elated_search_options_map' ) ) {
	function frappe_elated_search_options_map() {
		
		frappe_elated_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'frappe' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = frappe_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'frappe' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'search_page_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Layout', 'frappe' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set layout. Default is in grid.', 'frappe' ),
				'parent'        => $search_page_panel,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'frappe' ),
					'full-width' => esc_html__( 'Full Width', 'frappe' )
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'name'          => 'search_page_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'frappe' ),
				'description'   => esc_html__( "Choose a sidebar layout for search page", 'frappe' ),
				'default_value' => 'no-sidebar',
				'options'       => frappe_elated_get_custom_sidebars_options(),
				'parent'        => $search_page_panel
			)
		);
		
		$frappe_custom_sidebars = frappe_elated_get_custom_sidebars();
		if ( count( $frappe_custom_sidebars ) > 0 ) {
			frappe_elated_add_admin_field(
				array(
					'name'        => 'search_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'frappe' ),
					'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'frappe' ),
					'parent'      => $search_page_panel,
					'options'     => $frappe_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		$search_panel = frappe_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'frappe' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
	

		frappe_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_source',
				'default_value' => 'icon_pack',
				'label'         => esc_html__( 'Select Search Icon Source', 'frappe' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'frappe' ),
				'options'       => frappe_elated_get_icon_sources_array()
			)
		);

		$search_icon_pack_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'parent'        => $search_icon_pack_container,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_awesome',
				'label'         => esc_html__( 'Search Icon Pack', 'frappe' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'frappe' ),
				'options'       => frappe_elated_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$search_svg_path_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'svg_path'
					)
				)
			)
		);

		frappe_elated_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_icon_svg_path',
				'label'       => esc_html__( 'Search Icon SVG Path', 'frappe' ),
				'description' => esc_html__( 'Enter your search icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'frappe' ),
			)
		);

		frappe_elated_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_close_icon_svg_path',
				'label'       => esc_html__( 'Search Close Icon SVG Path', 'frappe' ),
				'description' => esc_html__( 'Enter your search close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'frappe' ),
			)
		);
		
		frappe_elated_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'frappe' )
			)
		);

		$search_icon_pack_icon_styles_container = frappe_elated_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_icon_styles_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'parent'        => $search_icon_pack_icon_styles_container,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'frappe' ),
				'description'   => esc_html__( 'Set size for icon', 'frappe' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = frappe_elated_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'frappe' ),
				'description' => esc_html__( 'Define color style for icon', 'frappe' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = frappe_elated_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'frappe' )
			)
		);
		
		frappe_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'frappe' )
			)
		);
		
	}
	
	add_action( 'frappe_elated_action_options_map', 'frappe_elated_search_options_map', 8 );
}