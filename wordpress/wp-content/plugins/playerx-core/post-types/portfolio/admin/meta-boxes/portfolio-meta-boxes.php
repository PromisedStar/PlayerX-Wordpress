<?php

if ( ! function_exists( 'playerx_core_map_portfolio_meta' ) ) {
	function playerx_core_map_portfolio_meta() {
		global $playerx_edge_global_Framework;
		
		$playerx_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$playerx_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$playerx_portfolio_images = new PlayerxEdgeClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'playerx-core' ), '', '', 'portfolio_images' );
		$playerx_edge_global_Framework->edgtMetaBoxes->addMetaBox( 'portfolio_images', $playerx_portfolio_images );
		
		$playerx_portfolio_image_gallery = new PlayerxEdgeClassMultipleImages( 'edgtf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'playerx-core' ), esc_html__( 'Choose your portfolio images', 'playerx-core' ) );
		$playerx_portfolio_images->addChild( 'edgtf-portfolio-image-gallery', $playerx_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$playerx_portfolio_images_videos = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'playerx-core' ),
				'name'  => 'edgtf_portfolio_images_videos'
			)
		);
		playerx_edge_add_repeater_field(
			array(
				'name'        => 'edgtf_portfolio_single_upload',
				'parent'      => $playerx_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'playerx-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'playerx-core' ),
						'options' => array(
							'image' => esc_html__('Image','playerx-core'),
							'video' => esc_html__('Video','playerx-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'playerx-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'playerx-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'playerx-core'),
							'vimeo' => esc_html__('Vimeo', 'playerx-core'),
							'self' => esc_html__('Self Hosted', 'playerx-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'playerx-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'playerx-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'playerx-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$playerx_additional_sidebar_items = playerx_edge_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'playerx-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		playerx_edge_add_repeater_field(
			array(
				'name'        => 'edgtf_portfolio_properties',
				'parent'      => $playerx_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'playerx-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'playerx-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'playerx-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'playerx-core' )
					)
				)
			)
		);
	}
	
	add_action( 'playerx_edge_action_meta_boxes_map', 'playerx_core_map_portfolio_meta', 40 );
}