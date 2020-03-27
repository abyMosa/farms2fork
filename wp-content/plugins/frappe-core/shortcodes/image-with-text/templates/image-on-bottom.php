<div class="eltdf-image-with-text-holder eltdf-bottom-image <?php echo esc_attr($holder_classes); ?>">
    <div class="eltdf-iwt-text-holder">
        <?php if(!empty($title)) { ?>
            <<?php echo esc_attr($title_tag); ?> class="eltdf-iwt-title" <?php echo frappe_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        <?php } ?>
		<?php if(!empty($text)) { ?>
            <p class="eltdf-iwt-text" <?php echo frappe_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>

        <?php if($enable_button === 'yes') { 
            $button_params = array(
                'type'         => 'solid',
                'link'         => $custom_link ,
                'text'         => $button_text,
                'custom_class' => 'eltdf-img-with-text-button'
            );
            
            echo frappe_elated_return_button_html( $button_params );

         } ?>
    </div>
    <div class="eltdf-iwt-image">
        <?php if ($image_behavior === 'lightbox') { ?>
            <a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[iwt_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
        <?php } else if ($image_behavior === 'custom-link' && !empty($custom_link)) { ?>
                <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
        <?php } ?>
            <?php if(is_array($image_size) && count($image_size)) : ?>
                <?php echo frappe_elated_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
            <?php else: ?>
                <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
            <?php endif; ?>
        <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
            </a>
        <?php } ?>
    </div>
</div>