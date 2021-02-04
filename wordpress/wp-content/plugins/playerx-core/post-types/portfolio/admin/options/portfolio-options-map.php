<?php

if ( ! function_exists( 'playerx_edge_portfolio_options_map' ) ) {
	function playerx_edge_portfolio_options_map() {
		
		playerx_edge_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'playerx-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = playerx_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'playerx-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'playerx-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'playerx-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'playerx-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'playerx-core' ),
				'parent'        => $panel_archive,
				'options'       => playerx_edge_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'playerx-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'playerx-core' ),
				'default_value' => 'normal',
				'options'       => playerx_edge_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'playerx-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'playerx-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'playerx-core' ),
					'landscape' => esc_html__( 'Landscape', 'playerx-core' ),
					'portrait'  => esc_html__( 'Portrait', 'playerx-core' ),
					'square'    => esc_html__( 'Square', 'playerx-core' )
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'playerx-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'playerx-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'playerx-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'playerx-core' )
				)
			)
		);
		
		$panel = playerx_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'playerx-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'playerx-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'playerx-core' ),
				'parent'        => $panel,
				'options'       => array(
					'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'playerx-core' ),
					'images'            => esc_html__( 'Portfolio Images', 'playerx-core' ),
					'small-images'      => esc_html__( 'Portfolio Small Images', 'playerx-core' ),
					'slider'            => esc_html__( 'Portfolio Slider', 'playerx-core' ),
					'small-slider'      => esc_html__( 'Portfolio Small Slider', 'playerx-core' ),
					'gallery'           => esc_html__( 'Portfolio Gallery', 'playerx-core' ),
					'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'playerx-core' ),
					'masonry'           => esc_html__( 'Portfolio Masonry', 'playerx-core' ),
					'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'playerx-core' ),
					'custom'            => esc_html__( 'Portfolio Custom', 'playerx-core' ),
					'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'playerx-core' )
				)
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'playerx-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'playerx-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => playerx_edge_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'playerx-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'playerx-core' ),
				'default_value' => 'normal',
				'options'       => playerx_edge_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'playerx-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'playerx-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => playerx_edge_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'playerx-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'playerx-core' ),
				'default_value' => 'normal',
				'options'       => playerx_edge_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		playerx_edge_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'playerx-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'playerx-core' ),
					'yes' => esc_html__( 'Yes', 'playerx-core' ),
					'no'  => esc_html__( 'No', 'playerx-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'playerx-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'playerx-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'playerx-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'playerx-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'playerx-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'playerx-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'playerx-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = playerx_edge_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'playerx-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'playerx-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'playerx-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'playerx-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'playerx_edge_action_options_map', 'playerx_edge_portfolio_options_map', 14 );
}