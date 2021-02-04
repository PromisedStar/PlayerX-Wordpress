<?php

class PlayerxEdgeClassButtonWidget extends PlayerxEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_button_widget',
			esc_html__( 'Playerx Button Widget', 'playerx' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'playerx' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'playerx' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'playerx' ),
					'outline' => esc_html__( 'Outline', 'playerx' ),
					'simple'  => esc_html__( 'Simple', 'playerx' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'playerx' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'playerx' ),
					'medium' => esc_html__( 'Medium', 'playerx' ),
					'large'  => esc_html__( 'Large', 'playerx' ),
					'huge'   => esc_html__( 'Huge', 'playerx' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'playerx' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'playerx' ),
				'default' => esc_html__( 'Button Text', 'playerx' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'playerx' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'playerx' ),
				'options' => playerx_edge_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'playerx' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'playerx' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'playerx' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'playerx' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'playerx' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'playerx' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'playerx' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'playerx' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'playerx' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'playerx' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'playerx' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'playerx' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget edgtf-button-widget">';
			echo do_shortcode( "[edgtf_button $params]" ); // XSS OK
		echo '</div>';
	}
}