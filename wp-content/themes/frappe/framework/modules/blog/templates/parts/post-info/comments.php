<?php if(comments_open()) { ?>
	<div class="eltdf-post-info-comments-holder">
		<a itemprop="url" class="eltdf-post-info-comments" href="<?php comments_link(); ?>">
			<i class="icon_comment_alt"></i>
			<?php comments_number('0 ' . esc_html__('Comments','frappe'), '1 '.esc_html__('Comment','frappe'), '% '.esc_html__('Comments','frappe') ); ?>
		</a>
	</div>
<?php } ?>