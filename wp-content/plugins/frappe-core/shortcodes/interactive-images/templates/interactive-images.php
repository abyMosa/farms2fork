<div class="eltdf-interactive-images <?php echo esc_attr($holder_classes); ?>">
    <div class="eltdf-interactive-images-outer">
        <?php if($orientation == 'midright') { ?>
            <div class="eltdf-ii-text-holder">
                <div class="eltdf-title-content-holder">
                    <div class="eltdf-title-text-holder">
                        <?php if(!empty($title)) { ?>
                            <h2 class="eltdf-ii-title"><?php echo esc_html($title); ?></h2>
                        <?php } ?>
                        <?php if(!empty($subtitle)) { ?>
                            <h4 class="eltdf-ii-subtitle"><?php echo esc_html($subtitle); ?></h4>
                        <?php } ?>
                    </div>
                    <?php if(!empty($title_image)) { ?>
                        <div class="eltdf-title-image">
                            <?php echo wp_get_attachment_image($title_image['image_id'], 'full'); ?>
                        </div>
                    <?php } ?>
                </div>
                <?php if(!empty($text)) { ?>
                    <p class="eltdf-ii-text"><?php echo esc_html($text); ?></p>
                <?php } ?>
                <?php if($enable_button === 'yes') { 
                
                    echo frappe_elated_get_button_html(array(
                        'type'                   => 'solid',
                        'link'                   => $custom_link ,
                        'target'                 => $custom_link_target,
                        'text'                   => $button_text,
                        'size'                   => 'medium',
                        'color'                  => '#fff',
                        'hover_color'            => '#fff',
                        'background_color'       => '#fbbcc0',
                        'hover_background_color' => '#b1e9ae',
                        'hover_border_color'     => '#b1e9ae',
                        'border_color'           => '#fbbcc0',
                        'custom_class'           => 'eltdf-interactive-images-button'
                    )); 

                 } ?>
            </div>
            <a itemprop="url" href="<?php echo esc_url($custom_link);?>" target="<?php echo esc_attr($custom_link_target);?>" class="eltdf-interactive-images-link">
                 <div class="eltdf-interactive-images-main">
                    <?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
                    <div class="eltdf-interactive-images-middle eltdf-ii-right" <?php echo frappe_elated_get_inline_attrs($this_object->getParallaxDataOne($params)); ?>>
                        <?php echo wp_get_attachment_image($image_middle['image_id'], 'full'); ?>
                    </div>
                </div>
            </a>
        <?php } ?>
        <?php if($orientation == 'midleft') { ?>
            <a itemprop="url" href="<?php echo esc_url($custom_link);?>" target="<?php echo esc_attr($custom_link_target);?>" class="eltdf-interactive-images-link">
                <div class="eltdf-interactive-images-main">
                    <?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
                    <div class="eltdf-interactive-images-middle eltdf-ii-left" <?php echo frappe_elated_get_inline_attrs($this_object->getParallaxDataOne($params)); ?>>
                        <?php echo wp_get_attachment_image($image_middle['image_id'], 'full'); ?>
                    </div>
                </div>
            </a>
            <div class="eltdf-ii-text-holder">
                <div class="eltdf-title-content-holder">
                    <?php if(!empty($title_image)) { ?>
                        <div class="eltdf-title-image">
                            <?php echo wp_get_attachment_image($title_image['image_id'], 'full'); ?>
                        </div>
                    <?php } ?>
                    <div class="eltdf-title-text-holder">
                        <?php if(!empty($title)) { ?>
                            <h2 class="eltdf-ii-title"><?php echo esc_html($title); ?></h2>
                        <?php } ?>
                        <?php if(!empty($subtitle)) { ?>
                            <h4 class="eltdf-ii-subtitle"><?php echo esc_html($subtitle); ?></h4>
                        <?php } ?>
                    </div>
                </div>
                <?php if(!empty($text)) { ?>
                    <p class="eltdf-ii-text"><?php echo esc_html($text); ?></p>
                <?php } ?>
                <?php if($enable_button === 'yes') { 
                
                    echo frappe_elated_get_button_html(array(
                        'type'                   => 'solid',
                        'link'                   => $custom_link,
                        'target'                 => $custom_link_target,
                        'text'                   => $button_text,
                        'size'                   => 'medium',
                        'color'                  => '#fff',
                        'hover_color'            => '#fff',
                        'background_color'       => '#fbbcc0',
                        'hover_background_color' => '#b1e9ae',
                        'hover_border_color'     => '#b1e9ae',
                        'border_color'           => '#fbbcc0',
                        'custom_class'           => 'eltdf-interactive-images-button'
                    )); 

                 } ?>
            </div>
        <?php } ?>
    </div>
</div>