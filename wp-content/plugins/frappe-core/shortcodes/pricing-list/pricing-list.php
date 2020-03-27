<?php
namespace FrappeCore\CPT\Shortcodes\PricingList;

use FrappeCore\Lib;

class PricingList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_list';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                    => esc_html__( 'Pricing list', 'frappe-core' ),
				'base'                    => $this->base,
				'as_parent'               => array( 'only' => 'eltdf_pricing_list_item' ),
				'content_element'         => true,
				'category'                => esc_html__( 'by FRAPPE', 'frappe-core' ),
				'icon'                    => 'icon-wpb-pricing-list extended-custom-icon',
				'show_settings_on_create' => true,
				'js_view'                 => 'VcColumnView',
				'params'                  => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'skin',
						'heading'     => esc_html__('Skin', 'frappe-core'),
						'value'       => array(
							esc_html__( 'Dark', 'frappe-core' )   => '',
							esc_html__( 'Light', 'frappe-core' )  => 'eltdf-pli-light'
						),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'item_space',
						'heading'     => esc_html__('Space between items', 'frappe-core'),
						'value'       => array(
							esc_html__( 'Normal', 'frappe-core' ) => 'eltdf-pli-normal-space',
							esc_html__( 'Large', 'frappe-core' )  => 'eltdf-pli-large-space'
						),
						'save_always' => true
					),
				)
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array(
			'skin'        => '',
			'item_space'  => 'eltdf-pli-normal-space'
		);

		$params = shortcode_atts($args, $atts);

		$params['title_holder_styles'] = $this->getTitleHolderStyles($params);
		$params['holder_class']        = $this->getHolderClass($params);
		$params['content']             = $content;
		
		$html = frappe_core_get_shortcode_module_template_part('templates/pricing-list', 'pricing-list', '', $params);

		return $html;
	}

	private function getTitleHolderStyles($params) {
		$styles = array();

		if(!empty($params['title_align'])) {
			$styles[] = 'text-align: '. $params['title_align'];
		}

		return implode( ';', $styles );
	}

	private function getHolderClass($params) {
		$class = array();

		if(!empty($params['skin'])) {
			$class[] = $params['skin'];
		}

		if(!empty($params['item_space'])) {
			$class[] = $params['item_space'];
		}

		return implode( ' ', $class );
	}
}