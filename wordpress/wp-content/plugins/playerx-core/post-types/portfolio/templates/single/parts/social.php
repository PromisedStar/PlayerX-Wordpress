<?php if ( playerx_edge_options()->getOptionValue( 'enable_social_share' ) == 'yes' && playerx_edge_options()->getOptionValue( 'enable_social_share_on_portfolio-item' ) == 'yes' ) : ?>
	<div class="edgtf-ps-info-item edgtf-ps-social-share">
		<?php
		/**
		 * Available params type, icon_type and title
		 *
		 * Return social share html
		 */
		echo playerx_edge_get_social_share_html( array( 'type'  => 'list', 'title' => esc_attr__( 'Share:', 'playerx-core' ) ) ); ?>
	</div>
<?php endif; ?>