<?php

class FrappeElatedClassSocialIconWidget extends FrappeElatedClassWidget {
	
	public function __construct() {
		parent::__construct(
			'eltdf_social_icon_widget',
			esc_html__( 'Frappe Social Icon Widget', 'frappe' ),
			array( 'description' => esc_html__( 'Add social network icons to widget areas', 'frappe' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array_merge(
			frappe_elated_icon_collections()->getSocialIconWidgetParamsArray(),
			array(
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'frappe' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Target', 'frappe' ),
					'options' => frappe_elated_get_link_target_array()
				),
				array(
					'type'  => 'textfield',
					'name'  => 'icon_size',
					'title' => esc_html__( 'Icon Size (px)', 'frappe' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'frappe' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'frappe' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'frappe' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'frappe' )
				)
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$icon_styles = array();
		
		if ( ! empty( $instance['color'] ) ) {
			$icon_styles[] = 'color: ' . $instance['color'] . ';';
		}
		
		if ( ! empty( $instance['icon_size'] ) ) {
			$icon_styles[] = 'font-size: ' . frappe_elated_filter_px( $instance['icon_size'] ) . 'px';
		}
		
		if ( ! empty( $instance['margin'] ) ) {
			$icon_styles[] = 'margin: ' . $instance['margin'] . ';';
		}
		
		$link        = ! empty( $instance['link'] ) ? $instance['link'] : '#';
		$target      = ! empty( $instance['target'] ) ? $instance['target'] : '_self';
		$hover_color = ! empty( $instance['hover_color'] ) ? $instance['hover_color'] : '';
		
		$icon_holder_html = '';
		if ( ! empty( $instance['icon_pack'] ) ) {
			$icon_class   = array( 'eltdf-social-icon-widget' );
			$icon_class[] = ! empty( $instance['fa_icon'] ) && $instance['icon_pack'] === 'font_awesome' ? 'fa ' . $instance['fa_icon'] : '';
			$icon_class[] = ! empty( $instance['fe_icon'] ) && $instance['icon_pack'] === 'font_elegant' ? $instance['fe_icon'] : '';
			$icon_class[] = ! empty( $instance['ion_icon'] ) && $instance['icon_pack'] === 'ion_icons' ? $instance['ion_icon'] : '';
			$icon_class[] = ! empty( $instance['linea_icon'] ) && $instance['icon_pack'] === 'linea_icons' ? $instance['linea_icon'] : '';
			$icon_class[] = ! empty( $instance['linear_icon'] ) && $instance['icon_pack'] === 'linear_icons' ? 'lnr ' . $instance['linear_icon'] : '';
			$icon_class[] = ! empty( $instance['simple_line_icon'] ) && $instance['icon_pack'] === 'simple_line_icons' ? $instance['simple_line_icon'] : '';
			
			$icon_class = implode( ' ', $icon_class );
			
			$icon_holder_html = '<span class="' . $icon_class . '"></span>';
		}
		?>
		
		<a class="eltdf-social-icon-widget-holder eltdf-icon-has-hover" <?php echo frappe_elated_get_inline_attr( $hover_color, 'data-hover-color' ); ?> <?php frappe_elated_inline_style( $icon_styles ) ?> href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">
			<?php echo wp_kses_post( $icon_holder_html ); ?>
		</a>
		<?php
	}
}