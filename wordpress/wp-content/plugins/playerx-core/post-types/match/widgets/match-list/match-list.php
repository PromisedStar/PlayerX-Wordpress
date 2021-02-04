<?php

class PlayerxEdgeClassMatchListWidget extends PlayerxEdgeClassWidget {
	protected $params;

	public function __construct() {
		parent::__construct(
			'edgtf_match_list_widget', // Base ID
			esc_html__('Playerx Match List', 'playerx-core'), // Name
			array('description' => esc_html__('Display matches from Match Post', 'playerx-core')) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name'  => 'title',
				'type'  => 'textfield',
				'title' => esc_html__('Title', 'playerx-core')
			),
            array(
                'type'          => 'dropdown',
                'title'         => esc_html__('Style', 'playerx-core'),
                'name'          => 'skin',
                'options'       => array(
                    'dark' => esc_html__('Dark', 'playerx-core'),
                    'light' => esc_html__('Light', 'playerx-core')
                )
            ),
            array(
                'type'        => 'dropdown',
                'title'     => esc_html__('Team Name Tag', 'playerx-core'),
                'name'        => 'team_title_tag',
                'options'       => array(
                    'h5' => 'h5',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h6' => 'h6',
                )
            ),
            array(
                'name'    => 'show_categories',
                'type'    => 'dropdown',
                'title'   => esc_html__('Show Categories', 'playerx-core'),
                'options' => array(
                    'no'  => esc_html__('No', 'playerx-core'),
                    'yes' => esc_html__('Yes', 'playerx-core')
                )
            ),
            array(
                'name'    => 'show_date',
                'type'    => 'dropdown',
                'title'   => esc_html__('Show Date', 'playerx-core'),
                'options' => array(
                    'yes' => esc_html__('Yes', 'playerx-core'),
                    'no'  => esc_html__('No', 'playerx-core')
                )
            ),
			array(
				'name'  => 'number',
				'type'  => 'textfield',
				'title' => esc_html__('Number of posts', 'playerx-core')
			),
			array(
				'name'    => 'order_by',
				'type'    => 'dropdown',
				'title'   => esc_html__('Order By', 'playerx-core'),
				'options' => array(
					'title' => esc_html__('Title', 'playerx-core'),
					'date'  => esc_html__('Date', 'playerx-core')
				)
			),
			array(
				'name'    => 'order',
				'type'    => 'dropdown',
				'title'   => esc_html__('Order', 'playerx-core'),
				'options' => array(
					'ASC'  => esc_html__('ASC', 'playerx-core'),
					'DESC' => esc_html__('DESC', 'playerx-core')
				)
			),
			array(
				'name'  => 'category',
				'type'  => 'textfield',
				'title' => esc_html__('Category Slug', 'playerx-core'),
			),
            array(
				'name'  => 'selected_projects',
				'type'  => 'textfield',
				'title' => esc_html__('Show Only Projects with Listed IDs', 'playerx-core'),
			),
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content = '';
		$params = array();

		//is instance empty?
		if (is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach ($instance as $key => $value) {
				$params[$key] = $value;
			}
		}

		echo '<div class="widget edgtf-match-list-widget">';

		if (!empty($instance['title'])) {
            echo playerx_edge_get_module_part( $args['before_title'] . $instance['title'] . $args['after_title'] );
		}

		echo playerx_edge_execute_shortcode('edgtf_match_small_list', $params);

		echo '</div>'; //close edgt-match-list-widget
	}

}
