<?php

class FrappeElatedClassSearchOpener extends FrappeElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_search_opener',
			esc_html__( 'Frappe Search Opener', 'frappe' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'frappe' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$search_layout_params = array(
			array(
				'type'        => 'dropdown',
				'name'        => 'direction',
				'title'       => esc_html__( 'Direction Of The Search Field', 'frappe' ),
				'description' => esc_html__( 'Show search field left or right from icon', 'frappe' ),
				'options'     => array(
					'right' => esc_html__( 'Right', 'frappe' ),
					'left'  => esc_html__( 'Left', 'frappe' ),
				)
			)
		);
		
		$search_icon_params = array(
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_color',
				'title'       => esc_html__( 'Icon Color', 'frappe' ),
				'description' => esc_html__( 'Define color for search icon', 'frappe' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_hover_color',
				'title'       => esc_html__( 'Icon Hover Color', 'frappe' ),
				'description' => esc_html__( 'Define hover color for search icon', 'frappe' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'frappe' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'frappe' )
			)
		);
		
		$search_icon_pack_params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_size',
				'title'       => esc_html__( 'Icon Size (px)', 'frappe' ),
				'description' => esc_html__( 'Define size for search icon', 'frappe' )
			)
		);
		
		if ( frappe_elated_options()->getOptionValue( 'search_icon_pack' ) == 'icon_pack' ) {
			$this->params = array_merge( $search_layout_params, $search_icon_pack_params, $search_icon_params );
		} else {
			$this->params = array_merge( $search_layout_params, $search_icon_params );
		}
		
	}
	
	public function widget( $args, $instance ) {
		global $frappe_elated_IconCollections;
		
		$search_icon_source   = frappe_elated_options()->getOptionValue( 'search_icon_source' );
		$search_icon_pack     = frappe_elated_options()->getOptionValue( 'search_icon_pack' );
		$search_icon_svg_path = frappe_elated_options()->getOptionValue( 'search_icon_svg_path' );
		
		$search_icon_class_array = array(
			'eltdf-search-opener',
			'eltdf-icon-has-hover'
		);
		
		$search_icon_class_array[] = $search_icon_source == 'icon_pack' ? 'eltdf-search-opener-icon-pack' : 'eltdf-search-opener-svg-path';
		$styles                    = array();
		$class                     = array( 'eltdf-search-widget-holder', 'eltdf-search-' . $instance['direction'] );
		$class[]                   = 'eltdf-search-expanding';
		
		if ( ! empty( $instance['search_icon_size'] ) ) {
			$styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
		}
		
		if ( ! empty( $instance['search_icon_color'] ) ) {
			$styles[] = 'color: ' . $instance['search_icon_color'] . ';';
		}
		
		if ( ! empty( $instance['search_icon_margin'] ) ) {
			$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
		}
		?>
		
		<div <?php frappe_elated_class_attribute( $class ); ?>>
			<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				<button <?php frappe_elated_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php frappe_elated_class_attribute( $search_icon_class_array ); ?> type="submit" <?php frappe_elated_inline_style( $styles ); ?> >
					<?php if ( ( $search_icon_source == 'icon_pack' ) && isset( $search_icon_pack ) ) {
						$frappe_elated_IconCollections->getSearchIcon( $search_icon_pack, false );
					} else if ( ( $search_icon_source == 'svg_path' ) && isset( $search_icon_svg_path ) ) {
						echo frappe_elated_get_module_part( $search_icon_svg_path );
					} ?>
				</button>
				<div class="eltdf-search-opener-field">
					<input type="text" placeholder="<?php esc_attr_e( 'Search', 'frappe' ); ?>" name="s" class="eltdf-search-field" autocomplete="off"/>
				</div>
			</form>
		</div>
	<?php }
}