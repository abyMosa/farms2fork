<?php do_action( 'frappe_elated_action_before_footer_content' ); ?>
</div> <!-- close div.content_inner -->
	</div> <!-- close div.content -->
		<?php if($display_footer && ($display_footer_top || $display_footer_bottom)) { ?>
			<footer class="eltdf-page-footer <?php echo esc_attr($holder_classes); ?>">
				<?php
					if($display_footer_top) {
						frappe_elated_get_footer_top();
					}
					if($display_footer_bottom) {
						frappe_elated_get_footer_bottom();
					}
				?>
			</footer>
		<?php } ?>
	</div> <!-- close div.eltdf-wrapper-inner  -->
</div> <!-- close div.eltdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>