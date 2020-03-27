<?php
$blog_single_navigation = frappe_elated_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = frappe_elated_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="eltdf-blog-single-navigation">
		<div class="eltdf-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$post_navigation = array(
					'prev' => array(
						'mark' => '<span class="eltdf-blog-single-nav-mark fa fa-chevron-left"></span>',
						'label' => '<span class="eltdf-blog-single-nav-label">'.esc_html__('previous', 'frappe').'</span>'
					),
					'next' => array(
						'mark' => '<span class="eltdf-blog-single-nav-mark fa fa-chevron-right"></span>',
						'label' => '<span class="eltdf-blog-single-nav-label">'.esc_html__('next', 'frappe').'</span>'
					)
				);
			
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
					}
				} else {
					if(get_previous_post() !== ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				/* Single navigation section - RENDERING */
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) {
						$postObject = $post_navigation[ $nav_type ]['post'];
						$postID     = $postObject->ID;
						$imageClass = get_the_post_thumbnail( $postObject ) !== '' ? 'eltdf-blog-single-nav-has-image' : 'eltdf-blog-single-nav-no-image';
						?>
						<a itemprop="url" class="eltdf-blog-single-<?php echo esc_attr($nav_type); ?> <?php echo esc_attr($imageClass); ?>" href="<?php echo get_permalink($postID); ?>">
							<?php echo get_the_post_thumbnail( $postID, 'thumbnail' ); ?>
							<span class="eltdf-blog-single-nav-info">
								<span class="eltdf-blog-single-nav-title"><?php echo get_the_title($postID); ?></span>
								<?php
								echo wp_kses($post_navigation[$nav_type]['mark'], array('span' => array('class' => true)));
								echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true)));
								?>
							</span>
						</a>
					<?php }
				}
			?>
		</div>
	</div>
<?php } ?>