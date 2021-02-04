<?php

namespace PlayerxCore\CPT\Shortcodes\SectionTitle;

use PlayerxCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'edgtf_section_title';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Section Title', 'playerx-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by PLAYERX', 'playerx-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'playerx-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'playerx-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'playerx-core' ),
							'value'       => array(
								esc_html__( 'Standard', 'playerx-core' ) => 'standard',
								esc_html__( 'Minimal', 'playerx-core' )  => 'minimal',
							),
							'save_always' => true,
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'playerx-core' ),
							'value'       => array(
								esc_html__( 'Default', 'playerx-core' ) => '',
								esc_html__( 'Left', 'playerx-core' )    => 'left',
								esc_html__( 'Center', 'playerx-core' )  => 'center',
								esc_html__( 'Right', 'playerx-core' )   => 'right'
							),
							'save_always' => true,
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding',
							'heading'    => esc_html__( 'Holder Side Padding (px or %)', 'playerx-core' ),
							'dependency' => array( 'element' => 'type', 'value' => array( 'standard' ) )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'holder_background',
							'heading'    => esc_html__( 'Title Box Backaground Color', 'playerx-core' ),
							'dependency' => array( 'element' => 'type', 'value' => array( 'minimal' ) ),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'playerx-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'playerx-core' ),
							'value'       => array_flip( playerx_edge_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'playerx-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'playerx-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Title Style', 'playerx-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_hightlight_words',
							'heading'     => esc_html__( 'Highlight Words', 'playerx-core' ),
							'description' => esc_html__( 'Enter the positions of the words you would like to display in a most dominant color of your theme. Separate the positions with commas (e.g. if you would like the first, second, and third word to have a desired color, you would enter "1,2,3")', 'playerx-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'playerx-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_break_words',
							'heading'     => esc_html__( 'Position of Line Break', 'playerx-core' ),
							'description' => esc_html__( 'Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter "3")', 'playerx-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'playerx-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'second_title_break_words',
							'heading'     => esc_html__( 'Position of Second Line Break', 'playerx-core' ),
							'description' => esc_html__( 'Enter the position of the second word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter "3")', 'playerx-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'playerx-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_break_words',
							'heading'     => esc_html__( 'Disable Line Break for Smaller Screens', 'playerx-core' ),
							'value'       => array_flip( playerx_edge_get_yes_no_select_array( false ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'playerx-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'separator_type',
							'heading'    => esc_html__( 'Separator Type', 'playerx-core' ),
							'value'      => array(
								esc_html__( 'Image', 'playerx-core' ) => 'image',
								esc_html__( 'SVG', 'playerx-core' )   => 'svg'
							),
							'dependency' => array( 'element' => 'type', 'value' => array( 'standard' ) )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Bottom Image', 'playerx-core' ),
							'description' => esc_html__( 'Select image from media library', 'playerx-core' ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'separator_type', 'value' => array( 'image' ) )
						),
						array(
							'type'        => 'textarea_raw_html',
							'param_name'  => 'svg',
							'heading'     => esc_html__( 'SVG Path Code', 'playerx-core' ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'separator_type', 'value' => array( 'svg' ) )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'separator_top_margin',
							'heading'     => esc_html__( 'Separator Top Margin', 'playerx-core' ),
							'description' => esc_html__( 'Enter top margin in px for separator. Exampple: 20px', 'playerx-core' ),
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'playerx-core' ),
							'dependency' => array( 'element' => 'type', 'value' => array( 'standard' ) )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'playerx-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'playerx-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_font_size',
							'heading'    => esc_html__( 'Text Font Size (px)', 'playerx-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'playerx-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_line_height',
							'heading'    => esc_html__( 'Text Line Height (px)', 'playerx-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'playerx-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_font_weight',
							'heading'     => esc_html__( 'Text Font Weight', 'playerx-core' ),
							'value'       => array_flip( playerx_edge_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'playerx-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'playerx-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'playerx-core' )
						)
					)
				)
			);
		}
	}

	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'             => '',
			'type'                     => 'standard',
			'position'                 => '',
			'holder_padding'           => '',
			'holder_background'        => '',
			'title'                    => '',
			'title_tag'                => 'h3',
			'title_color'              => '',
			'title_hightlight_words'   => '',
			'title_break_words'        => '',
			'second_title_break_words' => '',
			'disable_break_words'      => '',
			'text'                     => '',
			'text_color'               => '',
			'text_font_size'           => '',
			'text_line_height'         => '',
			'text_font_weight'         => '',
			'text_margin'              => '',
			'separator_type'           => '',
			'image'                    => '',
			'svg'                      => '',
			'separator_top_margin'     => '',
		);
		$params = shortcode_atts( $args, $atts );

		$params['holder_classes']   = $this->getHolderClasses( $params, $args );
		$params['holder_styles']    = $this->getHolderStyles( $params );
		$params['title']            = $this->getModifiedTitle( $params );
		$params['title_tag']        = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']     = $this->getTitleStyles( $params );
		$params['text_styles']      = $this->getTextStyles( $params );
		$params['separator_styles'] = $this->getSeparatorStyles( $params );

		$html = playerx_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'section-title', '', $params );

		return $html;
	}

	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-st-' . $params['type'] : 'edgtf-st-' . $args['type'];
		$holderClasses[] = $params['disable_break_words'] === 'yes' ? 'edgtf-st-disable-title-break' : '';

		return implode( ' ', $holderClasses );
	}

	private function getHolderStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding: 0 ' . $params['holder_padding'];
		}

		if ( ! empty( $params['holder_background'] ) ) {
			$styles[] = 'background-color: ' . $params['holder_background'];
		}

		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}

		return implode( ';', $styles );
	}

	private function getModifiedTitle( $params ) {
		$title                    = $params['title'];
		$title_hightlight_words   = str_replace( ' ', '', $params['title_hightlight_words'] );
		$title_break_words        = str_replace( ' ', '', $params['title_break_words'] );
		$second_title_break_words = str_replace( ' ', '', $params['second_title_break_words'] );

		if ( ! empty( $title ) ) {
			$hightlight_words = explode( ',', $title_hightlight_words );
			$split_title      = explode( ' ', $title );

			if ( ! empty( $title_hightlight_words ) ) {
				foreach ( $hightlight_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="edgtf-st-title-hightlight">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}

			if ( ! empty( $title_break_words ) ) {
				if ( ! empty( $split_title[ $title_break_words - 1 ] ) ) {
					$split_title[ $title_break_words - 1 ] = $split_title[ $title_break_words - 1 ] . '<br />';
				}
			}

			if ( ! empty( $second_title_break_words ) ) {
				if ( ! empty( $split_title[ $second_title_break_words - 1 ] ) ) {
					$split_title[ $second_title_break_words - 1 ] = $split_title[ $second_title_break_words - 1 ] . '<br />';
				}
			}

			$title = implode( ' ', $split_title );
		}

		return $title;
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}

		if ( ! empty( $params['text_font_size'] ) ) {
			$styles[] = 'font-size: ' . playerx_edge_filter_px( $params['text_font_size'] ) . 'px';
		}

		if ( ! empty( $params['text_line_height'] ) ) {
			$styles[] = 'line-height: ' . playerx_edge_filter_px( $params['text_line_height'] ) . 'px';
		}

		if ( ! empty( $params['text_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['text_font_weight'];
		}

		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['text_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getSeparatorStyles( $params ) {
		$styles = array();

		if ( $params['separator_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . playerx_edge_filter_px( $params['separator_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}
}