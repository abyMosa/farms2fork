<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php frappe_elated_inline_style($button_styles); ?> <?php frappe_elated_class_attribute($button_classes); ?> <?php echo frappe_elated_get_inline_attrs($button_data); ?> <?php echo frappe_elated_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo frappe_elated_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>