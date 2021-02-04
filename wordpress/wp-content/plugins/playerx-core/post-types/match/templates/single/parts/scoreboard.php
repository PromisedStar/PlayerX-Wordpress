<?php
$team_one_name      = get_post_meta( get_the_ID(), 'edgtf_match_team_one_name_meta', true );
$team_two_name      = get_post_meta( get_the_ID(), 'edgtf_match_team_two_name_meta', true );
$team_one_image     = get_post_meta( get_the_ID(), 'edgtf_match_team_one_image_meta', true );
$team_two_image     = get_post_meta( get_the_ID(), 'edgtf_match_team_two_image_meta', true );
$custom_image_sizes = array( 252, 332 );

//$featured_image = ;
$holder_style = 'background-image: url("' . get_the_post_thumbnail_url() . '")';

$status = get_post_meta( get_the_ID(), 'edgtf_match_status_meta', true );

if ( $status == 'finished' ) {
	$vs_image = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_finished.png';
} else {
	$vs_image = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_light.png';
}

?>
<div class="edgtf-match-single-scoreboard edgtf-has-parallax-background edgtf-bg-parallax edgtf-title-holder" <?php playerx_edge_inline_style( $holder_style ) ?>>
    <div class="edgtf-match-item-holder">
        <div class="edgtf-match-single-team">
            <div class="edgtf-match-item-image-holder">
				<?php echo playerx_edge_generate_thumbnail( null, $team_one_image, $custom_image_sizes[0], $custom_image_sizes[1] ); ?>
            </div>
            <div class="edgtf-match-item-text-holder">
                <h4 class="edgtf-match-team-title">
					<?php echo esc_attr( $team_one_name ); ?>
                </h4>
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
                <h4 class="edgtf-match-team-title">
					<?php echo esc_attr( $team_two_name ); ?>
                </h4>
            </div>
        </div>

    </div>
</div>