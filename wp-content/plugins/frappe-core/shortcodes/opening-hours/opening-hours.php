<?php

namespace FrappeCore\CPT\Shortcodes\OpeningHours;

use FrappeCore\Lib;

class OpeningHours implements Lib\ShortcodeInterface
{
    private $base;

    public function __construct() {
        $this->base = 'eltdf_opening_hours';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name'                      => esc_html__('Frappe Opening Hours', 'frappe-core'),
                    'base'                      => $this->getBase(),
                    'category'                  => esc_html__('by FRAPPE', 'frappe-core'),
                    'icon'                      => 'icon-wpb-custom-font extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array(
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'day',
                            'heading'     => esc_html__('Day of the Week', 'frappe-core'),
                            'description' => esc_html__('eg: Monday ', 'frappe-core'),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'day_color',
                            'heading'    => esc_html__('Day Label Color', 'frappe-core'),
                            'save_always' => true,
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'hours',
                            'heading'     => esc_html__('Hours', 'frappe-core'),
                            'description' => esc_html__('eg: 9:00 - 22:00 ', 'frappe-core'),
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'hours_color',
                            'heading'    => esc_html__('Hours Label Color', 'frappe-core'),
                            'save_always' => true,
                        ),
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'day'             => '',
            'hours'           => '',
            'hours_color'     => '',
            'day_color'     => '',
        );

        $params = shortcode_atts($args, $atts);

        $params['hours_styles']     = $this->getHoursStyles( $params );
        $params['day_styles']     = $this->getDayStyles( $params );

        $html =  frappe_core_get_shortcode_module_template_part('templates/opening-hours', 'opening-hours', '', $params);

        return $html;
    }

    private function getHoursStyles( $params ) {
        $styles = array();

        if($params['hours_color'] !== '') {
            $styles['color'] = 'color: ' . $params['hours_color'];
        }

        return $styles;
    }

    private function getDayStyles( $params ) {
        $styles = array();

        if($params['day_color'] !== '') {
            $styles['color'] = 'color: ' . $params['day_color'];
        }

        return $styles;
    }

}