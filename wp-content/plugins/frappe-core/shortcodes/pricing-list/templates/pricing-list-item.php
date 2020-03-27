<?php if(!empty($link)): ?><a  class="eltdf-pricing-list-item-link" itemprop="url" target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($link); ?>"><?php endif; ?>
    <div class="eltdf-pricing-list-item clearfix <?php echo ! empty($image) ? 'eltdf-pli-with-image' : ''; ?> <?php echo esc_attr( $item_classes ); ?>">
        <?php if(!empty($image)){ ?>
            <div class="eltdf-pli-image-holder">
                <?php echo wp_get_attachment_image($image); ?>
            </div>
        <?php } ?>
        <div class="eltdf-pli-content clearfix">
            <?php if(!empty($title)): ?>
                <div class="eltdf-pli-title-holder">
                    <h5 itemprop="name" class="eltdf-pli-title entry-title" <?php echo frappe_elated_get_inline_style($title_styles); ?>>
                            <?php echo esc_html($title); ?>
                    </h5>
                    <div class="eltdf-pli-dots" <?php frappe_elated_inline_style($separator_styles); ?>></div>
                    <?php if(!empty($price)) : ?>
                        <div class="eltdf-pli-price-holder">
                            <span class="eltdf-pli-price" <?php echo frappe_elated_get_inline_style($price_styles); ?>>
                                <span><?php echo esc_html($price); ?></span>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="eltdf-pli-bottom-content">
                <?php if(!empty($description)) : ?>
                    <div class="eltdf-pli-desc clearfix" <?php echo frappe_elated_get_inline_style($desc_styles); ?>>
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php if(!empty($link)): ?></a><?php endif; ?>