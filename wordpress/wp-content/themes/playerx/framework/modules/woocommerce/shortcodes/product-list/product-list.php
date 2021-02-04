<?php

namespace PlayerxCore\CPT\Shortcodes\ProductList;

use PlayerxCore\Lib;

class ProductList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'edgtf_product_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Product List', 'playerx' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list extended-custom-icon',
					'category'                  => esc_html__( 'by PLAYERX', 'playerx' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'playerx' ),
							'value'       => array(
								esc_html__( 'Standard', 'playerx' ) => 'standard',
								esc_html__( 'Masonry', 'playerx' )  => 'masonry'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Product Info Position', 'playerx' ),
							'value'       => array(
								esc_html__( 'Info On Image Hover', 'playerx' ) => 'info-on-image',
								esc_html__( 'Info Below Image', 'playerx' )    => 'info-below-image'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'playerx' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'playerx' ),
							'value'       => array_flip( playerx_edge_get_number_of_columns_array( true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'playerx' ),
							'value'       => array_flip( playerx_edge_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'playerx' ),
							'value'       => array_flip( playerx_edge_get_query_order_by_array( false, array( 'on-sale' => esc_html__( 'On Sale', 'playerx' ) ) ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'playerx' ),
							'value'       => array_flip( playerx_edge_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'playerx' ),
							'value'       => array(
								esc_html__( 'Category', 'playerx' ) => 'category',
								esc_html__( 'Tag', 'playerx' )      => 'tag',
								esc_html__( 'Id', 'playerx' )       => 'id'
							),
							'save_always' => true,
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'playerx' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'playerx' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_size',
							'heading'    => esc_html__( 'Image Proportions', 'playerx' ),
							'value'      => array(
								esc_html__( 'Default', 'playerx' )        => '',
								esc_html__( 'Original', 'playerx' )       => 'full',
								esc_html__( 'Square', 'playerx' )         => 'square',
								esc_html__( 'Landscape', 'playerx' )      => 'landscape',
								esc_html__( 'Portrait', 'playerx' )       => 'portrait',
								esc_html__( 'Medium', 'playerx' )         => 'medium',
								esc_html__( 'Large', 'playerx' )          => 'large',
								esc_html__( 'Shop Single', 'playerx' )    => 'woocommerce_single',
								esc_html__( 'Shop Thumbnail', 'playerx' ) => 'woocommerce_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'product_info_skin',
							'heading'    => esc_html__( 'Product Info Skin', 'playerx' ),
							'value'      => array(
								esc_html__( 'Default', 'playerx' ) => 'default',
								esc_html__( 'Light', 'playerx' )   => 'light',
								esc_html__( 'Dark', 'playerx' )    => 'dark'
							),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-on-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'playerx' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'playerx' ),
							'description' => esc_html__( 'Number of characters', 'playerx' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'playerx' ),
							'value'      => array_flip( playerx_edge_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'playerx' ),
							'value'      => array(
								esc_html__( 'Default', 'playerx' ) => 'default',
								esc_html__( 'Light', 'playerx' )   => 'light',
								esc_html__( 'Dark', 'playerx' )    => 'dark'
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'playerx' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'playerx' ),
							'group'      => esc_html__( 'Product Info Style', 'playerx' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading'    => esc_html__( 'Product Info Text Alignment', 'playerx' ),
							'value'      => array(
								esc_html__( 'Default', 'playerx' ) => '',
								esc_html__( 'Left', 'playerx' )    => 'left',
								esc_html__( 'Center', 'playerx' )  => 'center',
								esc_html__( 'Right', 'playerx' )   => 'right'
							),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'playerx' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'info_bottom_margin',
							'heading'    => esc_html__( 'Product Info Bottom Margin (px)', 'playerx' ),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'playerx' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                    => 'standard',
			'info_position'           => 'info-below-image',
			'number_of_posts'         => '8',
			'number_of_columns'       => 'three',
			'space_between_items'     => 'normal',
			'orderby'                 => 'date',
			'order'                   => 'ASC',
			'taxonomy_to_display'     => 'category',
			'taxonomy_values'         => '',
			'image_size'              => 'full',
			'display_title'           => 'yes',
			'product_info_skin'       => '',
			'title_tag'               => 'h5',
			'title_transform'         => '',
			'display_category'        => 'yes',
			'display_excerpt'         => 'no',
			'excerpt_length'          => '20',
			'display_rating'          => 'no',
			'display_price'           => 'yes',
			'display_button'          => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align'  => '',
			'info_bottom_margin'      => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['class_name']     = 'pli';
		$params['type']           = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['info_position']  = ! empty( $params['info_position'] ) ? $params['info_position'] : $default_atts['info_position'];
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = playerx_edge_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-' . $params['type'] . '-layout' : 'edgtf-' . $default_atts['type'] . '-layout';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'edgtf-' . $params['number_of_columns'] . '-columns' : 'edgtf-' . $default_atts['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'edgtf-' . $params['info_position'] : 'edgtf-' . $default_atts['info_position'];
		$holderClasses[] = ! empty( $params['product_info_skin'] ) ? 'edgtf-product-info-' . $params['product_info_skin'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['post__in'] = $ids;
		}
		
		return $queryArray;
	}
	
	public function getItemClasses( $params ) {
		$itemClasses = array();
		
		$image_size_meta = get_post_meta( get_the_ID(), 'edgtf_product_featured_image_size', true );
		
		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = 'edgtf-fixed-masonry-item edgtf-masonry-size-' . $image_size_meta;
		}
		
		return implode( ' ', $itemClasses );
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getShaderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getTextWrapperStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}
		
		if ( $params['info_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . playerx_edge_filter_px( $params['info_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}