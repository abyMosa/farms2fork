<li class="eltdf-bl-item eltdf-item-space clearfix">
	<div class="eltdf-bli-inner">
		<div class="eltdf-img-date-wrapper">
			<?php 
			  if ( $post_info_date == 'yes' ) {
	               frappe_elated_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
               }

               if ( $post_info_image == 'yes' ) {
					frappe_elated_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
				}
			?>
		</div>
        <div class="eltdf-bli-content">
            <?php if ($post_info_comments == 'yes' || $post_info_like == 'yes' || $post_info_share == 'yes' ) { ?>
                <div class="eltdf-bli-info">
	                <?php
		                if ( $post_info_comments == 'yes' ) {
			                frappe_elated_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                frappe_elated_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
		                if ( $post_info_share == 'yes' ) {
			                frappe_elated_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
	
	        <?php frappe_elated_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="eltdf-bli-excerpt">
		        <?php frappe_elated_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
	        </div>
	        <div class="eltdf-info-bottom">
	        	<?php
	        		if ( $post_info_author == 'yes' ) {
		                frappe_elated_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
	                } 
		        	if ( $post_info_category == 'yes' ) {
		                frappe_elated_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
	                }
	        	?>
	        </div>
        </div>
	</div>
</li>