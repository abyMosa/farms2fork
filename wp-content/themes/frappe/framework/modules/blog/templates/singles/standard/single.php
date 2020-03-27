<?php

frappe_elated_get_single_post_format_html($blog_single_type);

do_action('frappe_elated_action_after_article_content');

frappe_elated_get_module_template_part('templates/parts/single/author-info', 'blog');

frappe_elated_get_module_template_part('templates/parts/single/single-navigation', 'blog');

frappe_elated_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

frappe_elated_get_module_template_part('templates/parts/single/comments', 'blog');