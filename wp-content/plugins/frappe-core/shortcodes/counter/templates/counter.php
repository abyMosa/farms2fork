<div class="eltdf-counter-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="eltdf-counter-inner">
		<?php if (!empty($counter_image)) { ?>
			<div class="eltdf-counter-image">
				<img src="<?php echo esc_url( $counter_image) ?>" alt="<?php esc_attr_e( 'counter_image', 'frappe' ); ?>">
			</div>
		<?php } ?>
		<?php if(!empty($digit)) { ?>
			<span class="eltdf-counter <?php echo esc_attr($type) ?>" <?php echo frappe_elated_get_inline_style($counter_styles); ?>><?php echo esc_html($digit); ?></span>
		<?php } ?>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="eltdf-counter-title" <?php echo frappe_elated_get_inline_style($counter_title_styles); ?>>
				<?php echo esc_html($title); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<p class="eltdf-counter-text" <?php echo frappe_elated_get_inline_style($counter_text_styles); ?>><?php echo esc_html($text); ?></p>
		<?php } ?>
	</div>
</div>