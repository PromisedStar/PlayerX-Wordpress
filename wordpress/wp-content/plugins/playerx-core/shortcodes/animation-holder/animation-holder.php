<?php
namespace PlayerxCore\CPT\Shortcodes\AnimationHolder;

use PlayerxCore\Lib;

class AnimationHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_animation_holder';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Animation Holder', 'playerx-core' ),
					'base'                    => $this->base,
					"as_parent"               => array( 'except' => 'vc_row' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by PLAYERX', 'playerx-core' ),
					'icon'                    => 'icon-wpb-animation-holder extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'animation',
							'heading'     => esc_html__( 'Animation Type', 'playerx-core' ),
							'value'       => array(
								esc_html__( 'Element Grow In', 'playerx-core' )          => 'edgtf-grow-in',
								esc_html__( 'Element Fade In Down', 'playerx-core' )     => 'edgtf-fade-in-down',
								esc_html__( 'Element From Fade', 'playerx-core' )        => 'edgtf-element-from-fade',
								esc_html__( 'Element From Left', 'playerx-core' )        => 'edgtf-element-from-left',
								esc_html__( 'Element From Right', 'playerx-core' )       => 'edgtf-element-from-right',
								esc_html__( 'Element From Top', 'playerx-core' )         => 'edgtf-element-from-top',
								esc_html__( 'Element From Bottom', 'playerx-core' )      => 'edgtf-element-from-bottom',
								esc_html__( 'Element Flip In', 'playerx-core' )          => 'edgtf-flip-in',
								esc_html__( 'Element X Rotate', 'playerx-core' )         => 'edgtf-x-rotate',
								esc_html__( 'Element Z Rotate', 'playerx-core' )         => 'edgtf-z-rotate',
								esc_html__( 'Element Y Translate', 'playerx-core' )      => 'edgtf-y-translate',
								esc_html__( 'Element Fade In X Rotate', 'playerx-core' ) => 'edgtf-fade-in-left-x-rotate',
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'animation_delay',
							'heading'    => esc_html__( 'Animation Delay (ms)', 'playerx-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'animation'       => '',
			'animation_delay' => ''
		);
		extract( shortcode_atts( $args, $atts ) );
		
		$html = '<div class="edgtf-animation-holder ' . esc_attr( $animation ) . '" data-animation="' . esc_attr( $animation ) . '" data-animation-delay="' . esc_attr( $animation_delay ) . '"><div class="edgtf-animation-inner">' . do_shortcode( $content ) . '</div></div>';
		
		return $html;
	}
}