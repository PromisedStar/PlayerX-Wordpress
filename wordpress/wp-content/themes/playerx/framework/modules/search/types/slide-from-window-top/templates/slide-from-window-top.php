<?php ?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edgtf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="edgtf-grid">
	<?php } ?>
		<div class="edgtf-search-form-inner">
			<span <?php playerx_edge_class_attribute( $search_submit_icon_class ); ?>>
	            <?php echo playerx_edge_get_icon_sources_html( 'search', false, array( 'search' => 'yes' ) ); ?>
			</span>
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'playerx' ); ?>" name="s" class="edgtf-swt-search-field" autocomplete="off"/>
			<a <?php playerx_edge_class_attribute( $search_close_icon_class ); ?> href="#">
				<?php echo playerx_edge_get_icon_sources_html( 'search', true, array( 'search' => 'yes' ) ); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
	</div>
	<?php } ?>
</form>