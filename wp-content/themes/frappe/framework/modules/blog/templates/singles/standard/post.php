<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php frappe_elated_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-text-main">
                    <?php frappe_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php the_content(); ?>
                    <?php do_action('frappe_elated_action_single_link_pages'); ?>
                </div>
                <div class="eltdf-post-info-bottom clearfix">
                    <div class="eltdf-post-info-bottom-left">
	                    <?php frappe_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
	                    <?php frappe_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
	                    <?php frappe_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    </div>
                    <div class="eltdf-post-info-bottom-right">
	                    <?php frappe_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
	                    <?php frappe_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                        <?php frappe_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>