<div class="eltdf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo frappe_elated_get_inline_style($holder_styles); ?>>
	<?php if (!empty($section_title_image)) { ?>
		<div class="eltdf-section-title-image">
			<img src="<?php echo esc_url( $section_title_image) ?>" alt="<?php esc_attr_e( 'section-title-image', 'frappe' ); ?>">
		</div>
	<?php } ?>
	<div class="eltdf-st-inner">
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="eltdf-st-title" <?php echo frappe_elated_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<<?php echo esc_attr($text_tag); ?> class="eltdf-st-text" <?php echo frappe_elated_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true)); ?>
			</<?php echo esc_attr($text_tag); ?>>
		<?php } ?>
	</div>
</div>