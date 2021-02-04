<section class="edgtf-side-menu">
    <div class="edgtf-side-area-inner">
        <a <?php playerx_edge_class_attribute( $close_icon_classes ); ?> href="#">
            <?php echo playerx_edge_get_icon_sources_html( 'side_area', true ); ?>
        </a>
        <?php if ( is_active_sidebar( 'sidearea' ) ) {
            dynamic_sidebar( 'sidearea' );
        } ?>
    </div>
    <div class="edgtf-side-area-bottom">
		<?php if ( is_active_sidebar( 'sidearea-bottom' ) ) {
			dynamic_sidebar( 'sidearea-bottom' );
		} ?>
    </div>
</section>