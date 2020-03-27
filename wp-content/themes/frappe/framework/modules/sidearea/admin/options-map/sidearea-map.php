<?php

if (!function_exists('frappe_elated_sidearea_options_map')) {
    function frappe_elated_sidearea_options_map() {

        frappe_elated_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'frappe'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = frappe_elated_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'frappe'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'frappe'),
                'description'   => esc_html__('Choose a type of Side Area', 'frappe'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'frappe'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'frappe'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'frappe'),
                ),
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'frappe'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'frappe'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = frappe_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'frappe'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'frappe'),
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'frappe'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'frappe'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'frappe'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'frappe'),
                'options'       => frappe_elated_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = frappe_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_awesome',
                'label'         => esc_html__('Side Area Icon Pack', 'frappe'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'frappe'),
                'options'       => frappe_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = frappe_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'frappe'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'frappe'),
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'frappe'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'frappe'),
            )
        );

        $side_area_icon_style_group = frappe_elated_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'frappe'),
                'description' => esc_html__('Define styles for Side Area icon', 'frappe')
            )
        );

        $side_area_icon_style_row1 = frappe_elated_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'frappe')
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'frappe')
            )
        );

        $side_area_icon_style_row2 = frappe_elated_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'frappe')
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'frappe')
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'frappe'),
                'description' => esc_html__('Choose a background color for Side Area', 'frappe')
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'frappe'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'frappe'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        frappe_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'frappe'),
                'description'   => esc_html__('Choose text alignment for side area', 'frappe'),
                'options'       => array(
                    ''       => esc_html__('Default', 'frappe'),
                    'left'   => esc_html__('Left', 'frappe'),
                    'center' => esc_html__('Center', 'frappe'),
                    'right'  => esc_html__('Right', 'frappe')
                )
            )
        );
    }

    add_action('frappe_elated_action_options_map', 'frappe_elated_sidearea_options_map', 9);
}