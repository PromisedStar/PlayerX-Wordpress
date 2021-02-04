<article class="<?php echo esc_attr( $item_classes ); ?>">
    <div class="edgtf-match-item-holder">
        <a class="edgtf-match-link" <?php echo playerx_edge_get_inline_attrs( $link_atts ); ?>></a>
        <div class="edgtf-match-single-team">
            <div class="edgtf-match-item-image-holder">
                <img src="<?php echo esc_url( $team_one_image ); ?>" alt="<?php echo esc_attr( $team_one_name ); ?>"/>
				<?php echo wp_get_attachment_image( $team_one_image, array() ); ?>
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
            <img src="<?php echo esc_url( $team_two_image ); ?>" alt="<?php echo esc_attr( $team_two_name ); ?>"/>
        </div>
        <div class="edgtf-match-item-text-holder">
            <<?php echo esc_attr( $team_title_tag ); ?> class="edgtf-match-team-title">
			<?php echo esc_attr( $team_two_name ); ?>
        </<?php echo esc_attr( $team_title_tag ); ?>>
    </div>
    </div>
    <div class="edgtf-match-info">
        <div class="edgtf-match-category">
			<?php if ( $category != '' ) { ?>
				<?php echo playerx_edge_get_module_part( $category ); ?>
			<?php } ?>
        </div>
        <<?php echo esc_attr( $title_tag ); ?> class="edgtf-match-title">
		<?php echo esc_attr( get_the_title() ); ?>
    </<?php echo esc_attr( $title_tag ); ?>>
    <div class="edgtf-match-date">
		<?php if ( $date != '' ) { ?>
			<?php echo playerx_edge_get_module_part( $date ); ?>
		<?php } ?>
    </div>

    </div>
	<?php if ( $result !== '' && $status === 'finished' ) { ?>
        <div class="edgtf-match-result-holder">
            <span class="edgtf-match-info-status"><?php echo esc_attr( $result ); ?></span>
        </div>
	<?php } elseif ( $status === 'canceled' ) { ?>
        <div class=edgtf-match-canceled-holder>
            <span><?php esc_html_e( 'Canceled', 'playerx-core' ); ?></span>
        </div>
	<?php } elseif ( $status === 'to_be_played' || $status === 'in_progress' ) { ?>
        <div class="edgtf-match-stream-holder">
            <a href="<?php echo esc_url( $stream ); ?>" target="_blank"><i class="edgtf-icon-font-awesome fab fa-twitch edgtf-icon-element" style=""></i><span><?php esc_html_e( 'watch stream', 'playerx-core' ); ?></span></a>
        </div>
	<?php } ?>
    </div>
</article>