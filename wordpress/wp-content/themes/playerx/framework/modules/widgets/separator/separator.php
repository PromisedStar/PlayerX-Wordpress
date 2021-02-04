<?php

class PlayerxEdgeClassSeparatorWidget extends PlayerxEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_separator_widget',
			esc_html__( 'Playerx Separator Widget', 'playerx' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'playerx' ) )
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
					'normal'     => esc_html__( 'Normal', 'playerx' ),
					'full-width' => esc_html__( 'Full Width', 'playerx' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'playerx' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'playerx' ),
					'left'   => esc_html__( 'Left', 'playerx' ),
					'right'  => esc_html__( 'Right', 'playerx' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'playerx' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'playerx' ),
					'dashed' => esc_html__( 'Dashed', 'playerx' ),
					'dotted' => esc_html__( 'Dotted', 'playerx' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'playerx' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'playerx' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'playerx' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'playerx' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'playerx' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget edgtf-separator-widget">';
			echo do_shortcode( "[edgtf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}