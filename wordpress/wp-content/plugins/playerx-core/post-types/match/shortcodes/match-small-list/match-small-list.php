<?php

namespace PlayerxCore\CPT\Shortcodes\Match;

use PlayerxCore\Lib;
use PlayerxCore\CPT\Match\Lib as MatchLib;

/**
 * Class MatchList
 * @package EdgeCore\CPT\Match\Shortcodes
 */
class MatchSmallList implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * MatchList constructor.
	 */
	public function __construct() {
		$this->base = 'edgtf_match_small_list';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer
	 *
	 * @see vc_map
	 */
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
					'name'                      => esc_html__( 'Match Small List', 'playerx-core' ),
					'base'                      => $this->getBase(),
					'category'                  => 'by PLAYERX',
					'icon'                      => 'icon-wpb-match-small-list extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array_merge(
						array(
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Style', 'playerx-core' ),
								'param_name'  => 'skin',
								'value'       => array(
									esc_html__( 'Dark', 'playerx-core' )  => 'dark',
									esc_html__( 'Light', 'playerx-core' ) => 'light'
								),
								'save_always' => true,
								'admin_label' => true,
								'description' => '',
								'group'       => esc_html__( 'Layout Options', 'playerx-core' )
							),
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Team Name Tag', 'playerx-core' ),
								'param_name'  => 'team_title_tag',
								'value'       => array(
									''   => '',
									'h2' => 'h2',
									'h3' => 'h3',
									'h4' => 'h4',
									'h5' => 'h5',
									'h6' => 'h6',
								),
								'group'       => esc_html__( 'Layout Options', 'playerx-core' ),
								'description' => ''
							),
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Show Categories', 'playerx-core' ),
								'param_name'  => 'show_categories',
								'value'       => array(
									esc_html__( 'No', 'playerx-core' )  => 'no',
									esc_html__( 'Yes', 'playerx-core' ) => 'yes'
								),
								'save_always' => true,
								'admin_label' => true,
								'description' => esc_html__( 'Default value is No', 'playerx-core' ),
								'group'       => esc_html__( 'Layout Options', 'playerx-core' )
							),
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Show Date', 'playerx-core' ),
								'param_name'  => 'show_date',
								'value'       => array(
									esc_html__( 'Yes', 'playerx-core' ) => 'yes',
									esc_html__( 'No', 'playerx-core' )  => 'no',
								),
								'save_always' => true,
								'admin_label' => true,
								'description' => esc_html__( 'Default value is Yes', 'playerx-core' ),
								'group'       => esc_html__( 'Layout Options', 'playerx-core' )
							),
							array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Show Result', 'playerx-core' ),
								'param_name'  => 'show_result',
								'value'       => array(
									esc_html__( 'No', 'playerx-core' )  => 'no',
									esc_html__( 'Yes', 'playerx-core' ) => 'yes',
								),
								'save_always' => true,
								'admin_label' => true,
								'description' => esc_html__( 'Default value is Yes', 'playerx-core' ),
								'group'       => esc_html__( 'Layout Options', 'playerx-core' )
							)
						),
						MatchLib\MatchQuery::getInstance()->queryVCParams()
					)
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {

		$args = array(
			'skin'            => 'dark',
			'team_title_tag'  => 'h5',
			'show_categories' => 'no',
			'show_date'       => 'yes',
			'show_result'     => 'yes',
		);

		$matchQuery = MatchLib\MatchQuery::getInstance();

		$args = array_merge( $args, $matchQuery->getShortcodeAtts() );

		$params = shortcode_atts( $args, $atts );

		extract( $params );

		$queryResults            = $matchQuery->buildQueryObject( $params );
		$params['query_results'] = $queryResults;

		$holder_classes = $this->getMatchHolderClasses( $params );

		$html = '';
		$html .= '<div ' . playerx_edge_get_class_attribute( $holder_classes ) . ' >';

		if ( $queryResults->have_posts() ) {
			while ( $queryResults->have_posts() ) {
				$queryResults->the_post();

				$new_params                   = $this->getTeamsOptions( $params );
				$new_params['team_title_tag'] = $params['team_title_tag'];

				$html .= playerx_core_get_cpt_shortcode_module_template_part( 'match', 'match-small-list', 'match', '', $new_params );
			}

		} else {
			$html .= '<p>' . esc_html_e( 'Sorry, no posts matched your criteria.', 'playerx-core' ) . '</p>';
		}

		wp_reset_postdata();

		$html .= '</div>'; //close edgtf-match-list-holder

		return $html;
	}

	/**
	 * Generates match item categories html based on id
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemCategoriesHtml( $params ) {
		$id = get_the_ID();

		$category_html = '';
		if ( $params['show_categories'] == 'yes' ) {

			$categories    = wp_get_post_terms( $id, 'match-category' );
			$category_html = '<span class="edgtf-match-category-holder">';
			$k             = 1;
			foreach ( $categories as $cat ) {
				$category_html .= '<span>' . $cat->name . '</span>';
				if ( count( $categories ) != $k ) {
					$category_html .= ', ';
				}
				$k ++;
			}
			$category_html .= '</span>';
		}

		return $category_html;
	}

	/**
	 * Generates match item date html based on id
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemDateHtml( $params ) {
		$id   = get_the_ID();
		$html = '';

		if ( $params['show_date'] == 'yes' ) {

			$date = get_post_meta( $id, 'edgtf_match_date_meta', true );

			$dateobj = date_create_from_format( 'Y-m-d', $date );

			$date = date_format( $dateobj, 'jS M Y' );


			$time = get_post_meta( $id, 'edgtf_match_time_meta', true );

			$html = '<span class="edgtf-match-date">' . $date . ', ' . $time . '</span>';
		}

		return $html;
	}

	/**
	 * Checks if match has external link and returns it. Else returns link to match single page
	 *
	 * @param $params
	 *
	 * @return false|mixed|string
	 */
	public function getItemLink( $params ) {

		$match_link_array = array();

		$id           = get_the_ID();
		$match_link   = get_permalink( $id );
		$match_target = '';

		$match_link_array['href']   = $match_link;
		$match_link_array['target'] = $match_target;

		return $match_link_array;

	}

	/**
	 * Get shortcode classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getMatchHolderClasses( $params ) {

		$classes = array();

		$classes[] = 'edgtf-match-small-list-holder';

		if ( $params['skin'] != '' ) {
			$classes[] = 'edgtf-match-skin-' . $params['skin'];
		}

		return implode( ' ', $classes );

	}

	/**
	 * Get shortcode classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getMatchItemClasses( $params ) {

		$classes = array();

		$status = get_post_meta( $id = get_the_ID(), 'edgtf_match_status_meta', true );

		if ( $status ) {
			$classes[] = 'edgtf-match-status-' . $status;
		}

		return implode( ' ', $classes );

	}

	/**
	 * Get versus image
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getVSImageURL( $params ) {

		$url = '';

		$status = get_post_meta( get_the_ID(), 'edgtf_match_status_meta', true );

		if ( $status == 'finished' ) {
			$url = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_finished.png';
		} else if ( $params['skin'] == 'light' ) {
			$url = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_light.png';
		} else {
			$url = PLAYERX_CORE_ASSETS_URL_PATH . '/img/vs_dark.png';
		}

		return $url;

	}

	private function getTeamsOptions( $params ) {

		$new_params = array();

		$id                         = get_the_ID();
		$new_params['item_classes'] = $this->getMatchItemClasses( $params );
		$new_params['link_atts']    = $this->getItemLink( $params );
		$new_params['vs_image']     = $this->getVSImageURL( $params );

		$new_params['status']         = get_post_meta( $id, 'edgtf_match_status_meta', true );
		$new_params['category']       = $this->getItemCategoriesHtml( $params );
		$new_params['date']           = $this->getItemDateHtml( $params );
		$new_params['team_one_name']  = get_post_meta( $id, 'edgtf_match_team_one_name_meta', true );
		$new_params['team_two_name']  = get_post_meta( $id, 'edgtf_match_team_two_name_meta', true );
		$new_params['team_one_image'] = get_post_meta( $id, 'edgtf_match_team_one_image_meta', true );
		$new_params['team_two_image'] = get_post_meta( $id, 'edgtf_match_team_two_image_meta', true );

		$new_params['result'] = '';
		if ( $params['show_result'] == 'yes' ) {
			$new_params['result'] = get_post_meta( $id, 'edgtf_match_result_meta', true );
		}

		$new_params['stream'] = get_post_meta( $id, 'edgtf_match_stream_link', true );


		return $new_params;
	}

}