<?php

class PlayerxEdgeClassAuthorInfoWidget extends PlayerxEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_author_info_widget',
			esc_html__( 'Playerx Author Info Widget', 'playerx' ),
			array( 'description' => esc_html__( 'Add author info element to widget areas', 'playerx' ) )
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Custom CSS Class', 'playerx' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'author_username',
				'title' => esc_html__( 'Author Username', 'playerx' )
			)
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );

		$extra_class = '';
		if ( ! empty( $instance['extra_class'] ) ) {
			$extra_class = $instance['extra_class'];
		}

		$authorID = 1;
		if ( ! empty( $instance['author_username'] ) ) {
			$author = get_user_by( 'login', $instance['author_username'] );

			if ( $author ) {
				$authorID = $author->ID;
			}
		}

		$author_info     = get_the_author_meta( 'description', $authorID );
		$author_name     = get_the_author_meta( 'display_name', $authorID );
		$social_networks = playerx_edge_core_plugin_installed() ? playerx_edge_get_user_custom_fields( $authorID ) : false;
		?>

        <div class="widget edgtf-author-info-widget <?php echo esc_attr( $extra_class ); ?>">
            <div class="edgtf-aiw-inner">
                <a itemprop="url" class="edgtf-aiw-image" href="<?php echo esc_url( get_author_posts_url( $authorID ) ); ?>">
					<?php echo playerx_edge_kses_img( get_avatar( $authorID, 380 ) ); ?>
                </a>
                <div class="edgtf-aiw-content-wrapper">
					<?php if ( $author_info !== "" ) { ?>
                        <h5 class="edgtf-aiw-title"><?php echo esc_html( $author_name ); ?></h5>
                        <p itemprop="description" class="edgtf-aiw-text"><?php echo wp_kses_post( $author_info ); ?></p>
					<?php } ?>
                </div>
				<?php if ( is_array( $social_networks ) && count( $social_networks ) ) { ?>
                    <div class="edgtf-author-social-icons clearfix">
						<?php foreach ( $social_networks as $network ) { ?>
                            <a itemprop="url" href="<?php echo esc_url( $network['link'] ) ?>" target="_blank">
								<?php echo playerx_edge_icon_collections()->renderIcon( $network['class'], 'font_awesome' ); ?>
                            </a>
						<?php } ?>
                    </div>
				<?php } ?>
            </div>
        </div>
		<?php
	}
}