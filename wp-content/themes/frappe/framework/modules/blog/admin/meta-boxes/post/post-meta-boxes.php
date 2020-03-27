<?php

/*** Post Settings ***/

if ( ! function_exists( 'frappe_elated_map_post_meta' ) ) {
	function frappe_elated_map_post_meta() {
		
		$post_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'frappe' ),
				'name'  => 'post-meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'frappe' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'frappe' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => frappe_elated_get_custom_sidebars_options( true )
			)
		);
		
		$frappe_custom_sidebars = frappe_elated_get_custom_sidebars();
		if ( count( $frappe_custom_sidebars ) > 0 ) {
			frappe_elated_create_meta_box_field( array(
				'name'        => 'eltdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'frappe' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'frappe' ),
				'parent'      => $post_meta_box,
				'options'     => frappe_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'frappe' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'frappe' ),
				'parent'      => $post_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'frappe' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'frappe' ),
				'default_value' => 'small',
				'parent'        => $post_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'frappe' ),
					'large-width'        => esc_html__( 'Large Width', 'frappe' ),
					'large-height'       => esc_html__( 'Large Height', 'frappe' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'frappe' )
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'frappe' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'frappe' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'frappe' ),
					'large-width' => esc_html__( 'Large Width', 'frappe' )
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'frappe' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'frappe' ),
				'parent'        => $post_meta_box,
				'options'       => frappe_elated_get_yes_no_select_array()
			)
		);

		do_action('frappe_elated_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_post_meta', 20 );
}
