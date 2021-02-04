<?php
get_header();
playerx_edge_get_title();
do_action( 'playerx_edge_action_before_main_content' ); ?>
<div class="edgtf-container edgtf-default-page-template">
	<?php do_action( 'playerx_edge_action_after_container_open' ); ?>
	<div class="edgtf-container-inner clearfix">
		<?php
			$playerx_taxonomy_id   = get_queried_object_id();
			$playerx_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$playerx_taxonomy      = ! empty( $playerx_taxonomy_id ) ? get_term_by( 'id', $playerx_taxonomy_id, $playerx_taxonomy_type ) : '';
			$playerx_taxonomy_slug = ! empty( $playerx_taxonomy ) ? $playerx_taxonomy->slug : '';
			$playerx_taxonomy_name = ! empty( $playerx_taxonomy ) ? $playerx_taxonomy->taxonomy : '';
			
			playerx_core_get_archive_portfolio_list( $playerx_taxonomy_slug, $playerx_taxonomy_name );
		?>
	</div>
	<?php do_action( 'playerx_edge_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
