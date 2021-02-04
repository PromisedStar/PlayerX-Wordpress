<?php if(playerx_edge_core_plugin_installed()) { ?>
    <div class="edgtf-blog-like">
        <?php if( function_exists('playerx_edge_get_like') ) playerx_edge_get_like(); ?>
    </div>
<?php } ?>