<?php
get_header();
klippe_mikado_get_title();
do_action( 'klippe_mikado_before_main_content' ); ?>
<div class="mkdf-container mkdf-default-page-template">
    <?php do_action( 'klippe_mikado_after_container_open' ); ?>
    <div class="mkdf-container-inner clearfix">
        <?php

        $cat_id = get_queried_object_id();
        $cat = get_term_by( 'id', $cat_id, 'event-category' );
        $cat_slug = $cat->slug;

        klippe_mikado_get_event_category_list($cat_slug);
        ?>
    </div>
    <?php do_action( 'klippe_mikado_before_container_close' ); ?>
</div>
<?php get_footer(); ?>