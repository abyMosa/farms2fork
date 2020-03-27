<div class="eltdf-pricing-list clearfix <?php echo esc_attr($holder_class); ?>">
	<?php if ( ! empty( $title ) ) { ?>
		<div class="eltdf-pl-title-holder" <?php frappe_elated_inline_style($title_holder_styles); ?>>
			<h4 class="eltdf-pl-title"><?php echo esc_html($title); ?></h4>
		</div>
	<?php } ?>
	<div class="eltdf-pl-wrapper">
		<?php echo do_shortcode($content); ?>
	</div>
</div>