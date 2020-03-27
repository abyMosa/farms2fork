<?php

namespace FrappeCore\CPT\Shortcodes\TextMarquee;

use FrappeCore\Lib;

class TextMarquee implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_text_marquee';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Text Marquee', 'frappe-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by FRAPPE', 'frappe-core' ),
					'icon'                      => 'icon-wpb-text-marquee extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'text',
							'heading'     => esc_html__( 'Text', 'frappe-core' ),
							'admin_label' => true
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color',
							'heading'    => esc_html__( 'Text Color', 'frappe-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'font_size',
							'heading'    => esc_html__( 'Font Size (px or em)', 'frappe-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_height',
							'heading'    => esc_html__( 'Line Height (px or em)', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'font_weight',
							'heading'     => esc_html__( 'Font Weight', 'frappe-core' ),
							'value'       => array_flip( frappe_elated_get_font_weight_array( true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'font_style',
							'heading'     => esc_html__( 'Font Style', 'frappe-core' ),
							'value'       => array_flip( frappe_elated_get_font_style_array( true ) ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'letter_spacing',
							'heading'    => esc_html__( 'Letter Spacing (px or em)', 'frappe-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_transform',
							'heading'     => esc_html__( 'Text Transform', 'frappe-core' ),
							'value'       => array_flip( frappe_elated_get_text_transform_array( true ) ),
							'save_always' => true
						),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'font_size_1366',
                            'heading'    => esc_html__( 'Font Size (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Laptops', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'line_height_1366',
                            'heading'    => esc_html__( 'Line Height (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Laptops', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'font_size_1024',
                            'heading'    => esc_html__( 'Font Size (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Tablets Landscape', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'line_height_1024',
                            'heading'    => esc_html__( 'Line Height (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Tablets Landscape', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'font_size_768',
                            'heading'    => esc_html__( 'Font Size (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Tablets Portrait', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'line_height_768',
                            'heading'    => esc_html__( 'Line Height (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Tablets Portrait', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'font_size_680',
                            'heading'    => esc_html__( 'Font Size (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Mobiles', 'frappe-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'line_height_680',
                            'heading'    => esc_html__( 'Line Height (px or em)', 'frappe-core' ),
                            'group'      => esc_html__( 'Mobiles', 'frappe-core' )
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'text'             => '',
			'color'            => '',
			'font_size'        => '',
			'line_height'      => '',
			'font_weight'      => '',
			'font_style'       => '',
			'letter_spacing'   => '',
			'text_transform'   => '',
            'font_size_1366'   => '',
            'line_height_1366' => '',
            'font_size_1024'   => '',
            'line_height_1024' => '',
            'font_size_768'    => '',
            'line_height_768'  => '',
            'font_size_680'    => '',
            'line_height_680'  => ''
		);
		$params = shortcode_atts( $args, $atts );

        $params['holder_rand_class'] = 'eltdf-tm-' . mt_rand( 1000, 10000 );
        $params['holder_classes']    = $this->getHolderClasses( $params );
		$params['text_styles'] = $this->getTextStyles( $params );
        $params['text_data']       = $this->getTextData( $params );
		
		$html = frappe_core_get_shortcode_module_template_part( 'templates/text-marquee', 'text-marquee', '', $params );
		
		return $html;
	}

    private function getHolderClasses( $params ) {
        $holderClasses = array();

        $holderClasses[] = ! empty( $params['holder_rand_class'] ) ? esc_attr( $params['holder_rand_class'] ) : '';

        return implode( ' ', $holderClasses );
    }
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['color'] ) ) {
			$styles[] = 'color: ' . $params['color'];
		}
		
		if ( ! empty( $params['font_size'] ) ) {
			if ( frappe_elated_string_ends_with( $params['font_size'], 'px' ) || frappe_elated_string_ends_with( $params['font_size'], 'em' ) ) {
				$styles[] = 'font-size: ' . $params['font_size'];
			} else {
				$styles[] = 'font-size: ' . $params['font_size'] . 'px';
			}
		}
		
		if ( ! empty( $params['line_height'] ) ) {
			if ( frappe_elated_string_ends_with( $params['line_height'], 'px' ) || frappe_elated_string_ends_with( $params['line_height'], 'em' ) ) {
				$styles[] = 'line-height: ' . $params['line_height'];
			} else {
				$styles[] = 'line-height: ' . $params['line_height'] . 'px';
			}
		}
		
		if ( ! empty( $params['font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['font_weight'];
		}
		
		if ( ! empty( $params['font_style'] ) ) {
			$styles[] = 'font-style: ' . $params['font_style'];
		}
		
		if ( ! empty( $params['letter_spacing'] ) ) {
			if ( frappe_elated_string_ends_with( $params['letter_spacing'], 'px' ) || frappe_elated_string_ends_with( $params['letter_spacing'], 'em' ) ) {
				$styles[] = 'letter-spacing: ' . $params['letter_spacing'];
			} else {
				$styles[] = 'letter-spacing: ' . $params['letter_spacing'] . 'px';
			}
		}
		
		if ( ! empty( $params['text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['text_transform'];
		}
		
		return implode( ';', $styles );
	}

    private function getTextData( $params ) {
        $data                    = array();
        $data['data-item-class'] = $params['holder_rand_class'];

        if ( $params['font_size_1366'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['font_size_1366'], 'px' ) || frappe_elated_string_ends_with( $params['font_size_1366'], 'em' ) ) {
                $data['data-font-size-1366'] = $params['font_size_1366'];
            } else {
                $data['data-font-size-1366'] = $params['font_size_1366'] . 'px';
            }
        }

        if ( $params['font_size_1024'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['font_size_1024'], 'px' ) || frappe_elated_string_ends_with( $params['font_size_1024'], 'em' ) ) {
                $data['data-font-size-1024'] = $params['font_size_1024'];
            } else {
                $data['data-font-size-1024'] = $params['font_size_1024'] . 'px';
            }
        }

        if ( $params['font_size_768'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['font_size_768'], 'px' ) || frappe_elated_string_ends_with( $params['font_size_768'], 'em' ) ) {
                $data['data-font-size-768'] = $params['font_size_768'];
            } else {
                $data['data-font-size-768'] = $params['font_size_768'] . 'px';
            }
        }

        if ( $params['font_size_680'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['font_size_680'], 'px' ) || frappe_elated_string_ends_with( $params['font_size_680'], 'em' ) ) {
                $data['data-font-size-680'] = $params['font_size_680'];
            } else {
                $data['data-font-size-680'] = $params['font_size_680'] . 'px';
            }
        }

        if ( $params['line_height_1366'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['line_height_1366'], 'px' ) || frappe_elated_string_ends_with( $params['line_height_1366'], 'em' ) ) {
                $data['data-line-height-1366'] = $params['line_height_1366'];
            } else {
                $data['data-line-height-1366'] = $params['line_height_1366'] . 'px';
            }
        }

        if ( $params['line_height_1024'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['line_height_1024'], 'px' ) || frappe_elated_string_ends_with( $params['line_height_1024'], 'em' ) ) {
                $data['data-line-height-1024'] = $params['line_height_1024'];
            } else {
                $data['data-line-height-1024'] = $params['line_height_1024'] . 'px';
            }
        }

        if ( $params['line_height_768'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['line_height_768'], 'px' ) || frappe_elated_string_ends_with( $params['line_height_768'], 'em' ) ) {
                $data['data-line-height-768'] = $params['line_height_768'];
            } else {
                $data['data-line-height-768'] = $params['line_height_768'] . 'px';
            }
        }

        if ( $params['line_height_680'] !== '' ) {
            if ( frappe_elated_string_ends_with( $params['line_height_680'], 'px' ) || frappe_elated_string_ends_with( $params['line_height_680'], 'em' ) ) {
                $data['data-line-height-680'] = $params['line_height_680'];
            } else {
                $data['data-line-height-680'] = $params['line_height_680'] . 'px';
            }
        }

        return $data;
    }
}