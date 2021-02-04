<article <?php esc_attr( $item_classes ); ?>>
    <a class="edgtf-match-link" <?php echo playerx_edge_get_inline_attrs( $link_atts ); ?>></a>
    <div class="edgtf-match-item-holder">
        <div class="edgtf-match-single-team">
            <div class="edgtf-match-item-image-holder">
				<?php echo playerx_edge_generate_thumbnail( null, $team_one_image, $custom_image_sizes[0], $custom_image_sizes[1] ); ?>
            </div>
            <div class="edgtf-match-item-text-holder">
                <<?php echo esc_attr( $team_title_tag ); ?> class="edgtf-match-team-title">
				<?php echo esc_attr( $team_one_name ); ?>
            </<?php echo esc_attr( $team_title_tag ); ?>>
        </div>
    </div>
    <div class="edgtf-match-vs-image">
        <img src="<?php echo esc_url( $vs_image ); ?>" alt="<?php esc_attr_e( 'Match vs image', 'playerx-core' ); ?>"/>
    </div>
    <div class="edgtf-match-single-team">
        <div class="edgtf-match-item-image-holder">
			<?php echo playerx_edge_generate_thumbnail( null, $team_two_image, $custom_image_sizes[0], $custom_image_sizes[1] ); ?>
        </div>
        <div class="edgtf-match-item-text-holder">
            <<?php echo esc_attr( $team_title_tag ); ?> class="edgtf-match-team-title">
			<?php echo esc_attr( $team_two_name ); ?>
        </<?php echo esc_attr( $team_title_tag ); ?>>
    </div>
    </div>
    </div>
    <div class="edgtf-match-info">
        <div class="edgtf-match-meta">
			<?php if ( $category != '' ) { ?>
				<?php echo playerx_edge_get_module_part( $category ); ?>
			<?php } ?>
			<?php if ( $date != '' ) { ?>
				<?php echo playerx_edge_get_module_part( $date ); ?>
			<?php } ?>
        </div>

    </div>
	<?php if ( $result != '' ) { ?>
        <div class="edgtf-match-result-holder">
            <span class="edgtf-match-info-status"><?php echo esc_attr( $result ); ?></span>
        </div>
	<?php } ?>
</article>