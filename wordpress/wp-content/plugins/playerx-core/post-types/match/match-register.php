<?php

namespace PlayerxCore\CPT\Match;

use PlayerxCore\Lib\PostTypeInterface;

/**
 * Class MatchRegister
 * @package PlayerxCore\CPT\Match
 */
class MatchRegister implements PostTypeInterface {
	/**
	 * @var string
	 */
	private $base;
	private $taxBase;
	private $tagBase;

	public function __construct() {
		$this->base    = 'match-item';
		$this->taxBase = 'match-category';

		add_filter( 'single_template', array( $this, 'registerSingleTemplate' ) );
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Registers custom post type with WordPress
	 */
	public function register() {
		$this->registerPostType();
		$this->registerTax();
		$this->registerTagTax();
	}

	/**
	 * Registers match single template if one doesn't exists in theme.
	 * Hooked to single_template filter
	 *
	 * @param $single string current template
	 *
	 * @return string string changed template
	 */
	public function registerSingleTemplate( $single ) {
		global $post;

		if ( $post->post_type == $this->base ) {
			if ( ! file_exists( get_template_directory() . '/single-match-item.php' ) ) {
				return PLAYERX_CORE_CPT_PATH . '/match/templates/single-' . $this->base . '.php';
			}
		}

		return $single;
	}

	/**
	 * Registers custom post type with WordPress
	 */
	private function registerPostType() {

		$menuPosition = 5;
		$menuIcon     = 'dashicons-admin-post';
		$slug         = $this->base;

		if ( playerx_core_theme_installed() ) {
			if ( playerx_edge_options()->getOptionValue( 'match_single_slug' ) ) {
				$slug = playerx_edge_options()->getOptionValue( 'match_single_slug' );
			}
		}

		register_post_type( $this->base,
			array(
				'labels'        => array(
					'name'          => esc_html__( 'Playerx Match', 'playerx-core' ),
					'singular_name' => esc_html__( 'Match Item', 'playerx-core' ),
					'add_item'      => esc_html__( 'New Match Item', 'playerx-core' ),
					'add_new_item'  => esc_html__( 'Add New Match Item', 'playerx-core' ),
					'edit_item'     => esc_html__( 'Edit Match Item', 'playerx-core' )
				),
				'public'        => true,
				'has_archive'   => true,
				'rewrite'       => array( 'slug' => $slug ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'supports'      => array(
					'author',
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'page-attributes',
					'comments'
				),
				'menu_icon'     => $menuIcon
			)
		);
	}

	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Match Categories', 'playerx-core' ),
			'singular_name'     => esc_html__( 'Match Category', 'playerx-core' ),
			'search_items'      => esc_html__( 'Search Match Categories', 'playerx-core' ),
			'all_items'         => esc_html__( 'All Match Categories', 'playerx-core' ),
			'parent_item'       => esc_html__( 'Parent Match Category', 'playerx-core' ),
			'parent_item_colon' => esc_html__( 'Parent Match Category:', 'playerx-core' ),
			'edit_item'         => esc_html__( 'Edit Match Category', 'playerx-core' ),
			'update_item'       => esc_html__( 'Update Match Category', 'playerx-core' ),
			'add_new_item'      => esc_html__( 'Add New Match Category', 'playerx-core' ),
			'new_item_name'     => esc_html__( 'New Match Category Name', 'playerx-core' ),
			'menu_name'         => esc_html__( 'Match Categories', 'playerx-core' ),
		);

		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical' => true,
			'labels'       => $labels,
			'show_ui'      => true,
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'match-category' ),
		) );
	}

	/**
	 * Registers custom tag taxonomy with WordPress
	 */
	private function registerTagTax() {
		$labels = array(
			'name'              => esc_html__( 'Match Tags', 'playerx-core' ),
			'singular_name'     => esc_html__( 'Match Tag', 'playerx-core' ),
			'search_items'      => esc_html__( 'Search Match Tags', 'playerx-core' ),
			'all_items'         => esc_html__( 'All Match Tags', 'playerx-core' ),
			'parent_item'       => esc_html__( 'Parent Match Tag', 'playerx-core' ),
			'parent_item_colon' => esc_html__( 'Parent Match Tags:', 'playerx-core' ),
			'edit_item'         => esc_html__( 'Edit Match Tag', 'playerx-core' ),
			'update_item'       => esc_html__( 'Update Match Tag', 'playerx-core' ),
			'add_new_item'      => esc_html__( 'Add New Match Tag', 'playerx-core' ),
			'new_item_name'     => esc_html__( 'New Match Tag Name', 'playerx-core' ),
			'menu_name'         => esc_html__( 'Match Tags', 'playerx-core' ),
		);

		register_taxonomy( 'match-tag', array( $this->base ), array(
			'hierarchical' => false,
			'labels'       => $labels,
			'show_ui'      => true,
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'match-tag' ),
		) );
	}
}