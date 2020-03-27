<?php if(frappe_elated_core_plugin_installed()) { ?>
    <div class="eltdf-blog-like">
        <?php if( function_exists('frappe_elated_get_like') ) frappe_elated_get_like(); ?>
    </div>
<?php } ?>