<article <?php echo esc_attr( $item_classes ); ?>>
    <div class="edgtf-match-item-holder">
        <a class="edgtf-match-link" <?php echo playerx_edge_get_inline_attrs( $link_atts ); ?>></a>
        <div class="edgtf-match-single-team">
            <div class="edgtf-match-item-image-holder">
                <img src="<?php echo esc_url( $team_one_image ); ?>" alt="<?php echo esc_attr( $team_one_name ); ?>"/>
				<?php echo wp_get_attachment_image( $team_one_image, array( 42, 42 ) ); ?>
            </div>
        </div>
        <div class="edgtf-match-vs-image">
            <img src="<?php echo esc_url( $vs_image ); ?>" alt="<?php esc_attr_e( 'Match vs image', 'playerx-core' ); ?>"/>
        </div>
        <div class="edgtf-match-single-team">
            <div class="edgtf-match-item-image-holder">
                <img src="<?php echo esc_url( $team_two_image ); ?>" alt="<?php echo esc_attr( $team_two_name ); ?>"/>
            </div>
        </div>
        <div class="edgtf-match-info">
            <<?php echo esc_attr( $team_title_tag ); ?> class="edgtf-match-team-title">
			<?php echo esc_attr( $team_one_name ); ?>
        </<?php echo esc_attr( $team_title_tag ); ?>>
        <span><?php echo esc_html__( 'VS', 'playerx-core' ) ?></span>
        <<?php echo esc_attr( $team_title_tag ); ?> class="edgtf-match-team-title">
		<?php echo esc_attr( $team_two_name ); ?>
    </<?php echo esc_attr( $team_title_tag ); ?>>
    <div class="edgtf-match-meta">
		<?php if ( $category != '' ) { ?>
			<?php echo playerx_edge_get_module_part( $category ); ?>
		<?php } ?>
		<?php if ( $date != '' ) { ?>
			<?php echo playerx_edge_get_module_part( $date ); ?>
		<?php } ?>
    </div>
    </div>
	<?php if ( $result != '' && $status === 'finished' ) { ?>
        <div class="edgtf-match-result-holder">
            <span class="edgtf-match-info-status"><?php echo esc_attr( $result ); ?></span>
        </div>
	<?php } elseif ( $status === 'canceled' ) { ?>
        <div class=edgtf-match-canceled-holder>
            <span><?php esc_html_e( 'Canceled', 'playerx-core' ); ?></span>
        </div>
	<?php } elseif ( $status === 'to_be_played' || $status === 'in_progress' ) { ?>
        <div class="edgtf-match-stream-holder">
            <a href="<?php echo esc_url( $stream ); ?>"><i class="edgtf-icon-font-awesome fab fa-twitch edgtf-icon-element" style=""></i></a>
        </div>
	<?php } ?>
    </div>
</article>