<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'frappe_elated_map_blog_meta' ) ) {
	function frappe_elated_map_blog_meta() {
		$eltdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = frappe_elated_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'frappe' ),
				'name'  => 'blog_meta'
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'frappe' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'frappe' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'frappe' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'frappe' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'frappe' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'frappe' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'frappe' ),
					'in-grid'    => esc_html__( 'In Grid', 'frappe' ),
					'full-width' => esc_html__( 'Full Width', 'frappe' )
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'frappe' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'frappe' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'frappe' ),
					'two'   => esc_html__( '2 Columns', 'frappe' ),
					'three' => esc_html__( '3 Columns', 'frappe' ),
					'four'  => esc_html__( '4 Columns', 'frappe' ),
					'five'  => esc_html__( '5 Columns', 'frappe' )
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'frappe' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'frappe' ),
				'options'     => frappe_elated_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'frappe' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'frappe' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'frappe' ),
					'fixed'    => esc_html__( 'Fixed', 'frappe' ),
					'original' => esc_html__( 'Original', 'frappe' )
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'frappe' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'frappe' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'frappe' ),
					'standard'        => esc_html__( 'Standard', 'frappe' ),
					'load-more'       => esc_html__( 'Load More', 'frappe' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'frappe' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'frappe' )
				)
			)
		);
		
		frappe_elated_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'frappe' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'frappe' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'frappe_elated_action_meta_boxes_map', 'frappe_elated_map_blog_meta', 30 );
}