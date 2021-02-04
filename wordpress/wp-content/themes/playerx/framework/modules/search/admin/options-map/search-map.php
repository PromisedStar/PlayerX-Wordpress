<?php

if ( ! function_exists( 'playerx_edge_get_search_types_options' ) ) {
    function playerx_edge_get_search_types_options() {
        $search_type_options = apply_filters( 'playerx_edge_filter_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'playerx_edge_search_options_map' ) ) {
	function playerx_edge_search_options_map() {
		
		playerx_edge_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'playerx' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = playerx_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'playerx' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'search_page_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Layout', 'playerx' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set layout. Default is in grid.', 'playerx' ),
				'parent'        => $search_page_panel,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'playerx' ),
					'full-width' => esc_html__( 'Full Width', 'playerx' )
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'name'          => 'search_page_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'playerx' ),
				'description'   => esc_html__( "Choose a sidebar layout for search page", 'playerx' ),
				'default_value' => 'no-sidebar',
				'options'       => playerx_edge_get_custom_sidebars_options(),
				'parent'        => $search_page_panel
			)
		);
		
		$playerx_custom_sidebars = playerx_edge_get_custom_sidebars();
		if ( count( $playerx_custom_sidebars ) > 0 ) {
			playerx_edge_add_admin_field(
				array(
					'name'        => 'search_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'playerx' ),
					'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'playerx' ),
					'parent'      => $search_page_panel,
					'options'     => $playerx_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		$search_panel = playerx_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'playerx' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_type',
				'default_value' => 'fullscreen',
				'label'         => esc_html__( 'Select Search Type', 'playerx' ),
				'description'   => esc_html__( "Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'playerx' ),
				'options'       => playerx_edge_get_search_types_options()
			)
		);

		playerx_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_source',
				'default_value' => 'icon_pack',
				'label'         => esc_html__( 'Select Search Icon Source', 'playerx' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'playerx' ),
				'options'       => playerx_edge_get_icon_sources_array( false, false )
			)
		);

		$search_icon_pack_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $search_icon_pack_container,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_awesome',
				'label'         => esc_html__( 'Search Icon Pack', 'playerx' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'playerx' ),
				'options'       => playerx_edge_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$search_svg_path_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'svg_path'
					)
				)
			)
		);

		playerx_edge_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_icon_svg_path',
				'label'       => esc_html__( 'Search Icon SVG Path', 'playerx' ),
				'description' => esc_html__( 'Enter your search icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'playerx' ),
			)
		);

		playerx_edge_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_close_icon_svg_path',
				'label'       => esc_html__( 'Search Close Icon SVG Path', 'playerx' ),
				'description' => esc_html__( 'Enter your search close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'playerx' ),
			)
		);

        playerx_edge_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'search_sidebar_columns',
                'parent'        => $search_panel,
                'default_value' => '3',
                'label'         => esc_html__( 'Search Sidebar Columns', 'playerx' ),
                'description'   => esc_html__( 'Choose number of columns for FullScreen search sidebar area', 'playerx' ),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ),
				'dependency' => array(
					'show' => array(
						'search_type' => apply_filters('search_sidebar_columns_dependency', $dependency_array = array())
					)
				)
            )
        );
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'playerx' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'playerx' ),
				'dependency' => array(
					'show' => array(
						'search_type' => apply_filters('search_in_grid_dependency', $dependency_array = array())
					)
				)
			)
		);
		
		playerx_edge_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'playerx' )
			)
		);

		$search_icon_pack_icon_styles_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_icon_styles_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $search_icon_pack_icon_styles_container,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'playerx' ),
				'description'   => esc_html__( 'Set size for icon', 'playerx' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = playerx_edge_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'playerx' ),
				'description' => esc_html__( 'Define color style for icon', 'playerx' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = playerx_edge_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'playerx' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'playerx' )
			)
		);
		
		$enable_search_icon_text_container = playerx_edge_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'dependency' => array(
					'show' => array(
						'enable_search_icon_text' => 'yes'
					)
				)
			)
		);
		
		$enable_search_icon_text_group = playerx_edge_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'playerx' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'playerx' )
			)
		);
		
		$enable_search_icon_text_row = playerx_edge_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'playerx' )
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'playerx' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'playerx' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = playerx_edge_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'playerx' ),
				'default_value' => '',
				'options'       => playerx_edge_get_text_transform_array()
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'playerx' ),
				'default_value' => '-1',
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'playerx' ),
				'default_value' => '',
				'options'       => playerx_edge_get_font_style_array(),
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'playerx' ),
				'default_value' => '',
				'options'       => playerx_edge_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = playerx_edge_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		playerx_edge_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'playerx' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'playerx_edge_action_options_map', 'playerx_edge_search_options_map', 16 );
}