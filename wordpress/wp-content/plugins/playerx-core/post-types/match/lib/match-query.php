<?php
namespace PlayerxCore\CPT\Match\Lib;

class MatchQuery {
    /**
     * @var private instance of current class
     */
    private static $instance;

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {
    }

    /**
     * Private sleep because of Singletone
     */
    private function __wakeup() {
    }

    /**
     * Private clone because of Singletone
     */
    private function __clone() {
    }

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if (self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    public function queryVCParams() {
        return array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__('Order By', 'playerx-core'),
                'param_name'  => 'order_by',
                'value'       => array(
                    esc_html__('Menu Order', 'playerx-core') => 'menu_order',
                    esc_html__('Title', 'playerx-core')      => 'title',
                    esc_html__('Date', 'playerx-core')       => 'date'
                ),
                'admin_label' => true,
                'save_always' => true,
                'description' => '',
                'group'       => esc_html__('Query Options', 'playerx-core')
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__('Order', 'playerx-core'),
                'param_name'  => 'order',
                'value'       => array(
                    esc_html__('ASC', 'playerx-core')  => 'ASC',
                    esc_html__('DESC', 'playerx-core') => 'DESC',
                ),
                'admin_label' => true,
                'save_always' => true,
                'description' => '',
                'group'       => esc_html__('Query Options', 'playerx-core')
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__('One-Category Match List', 'playerx-core'),
                'param_name'  => 'category',
                'value'       => '',
                'admin_label' => true,
                'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'playerx-core'),
                'group'       => esc_html__('Query Options', 'playerx-core')
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__('One-Status Match List', 'playerx-core'),
                'param_name'  => 'status',
                'value' => array(
                    '' => '',
                    esc_html__('To Be Played', 'playerx-core') => 'to_be_played',
                    esc_html__('In Progress', 'playerx-core')=> 'in_progress',
                    esc_html__('Finished', 'playerx-core')=> 'finished',
                    esc_html__('Canceled', 'playerx-core')=> 'canceled'
                ),
                'admin_label' => true,
                'description' => esc_html__('Choose one status slug (leave empty for showing all statuses)', 'playerx-core'),
                'group'       => esc_html__('Query Options', 'playerx-core')
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__('Number of Matches Per Page', 'playerx-core'),
                'param_name'  => 'number',
                'value'       => '-1',
                'admin_label' => true,
                'description' => esc_html__('Enter -1 to show all', 'playerx-core'),
                'group'       => esc_html__('Query Options', 'playerx-core')
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__('Show Only Projects with Listed IDs', 'playerx-core'),
                'param_name'  => 'selected_projects',
                'value'       => '',
                'admin_label' => true,
                'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'playerx-core'),
                'group'       => esc_html__('Query Options', 'playerx-core')
            )
        );
    }

    public function getShortcodeAtts() {
        return array(
            'order_by'          => 'date',
            'order'             => 'ASC',
            'number'            => '-1',
            'category'          => '',
            'status'            => '',
            'selected_projects' => '',
            'next_page'         => ''
        );
    }

    public function buildQueryObject($params) {
        $meta_query = array();
        $queryArray = array(
            'post_type'      => 'match-item',
            'orderby'        => $params['order_by'],
            'order'          => $params['order'],
            'posts_per_page' => $params['number']
        );

        if (!empty($params['category'])) {
            $queryArray['match-category'] = $params['category'];
        }

        if (!empty($params['status'])) {
            switch ($params['status']) {
                case 'to_be_played':
                    $meta_query = array(
                        array(
                            'key' => 'edgtf_match_status_meta',
                            'value' => 'to_be_played',
                        ),
                    );
                    break;
                case 'in_progress':
                    $meta_query = array(
                        array(
                            'key' => 'edgtf_match_status_meta',
                            'value' => 'in_progress',
                        ),
                    );
                    break;
                case 'finished':
                    $meta_query = array(
                        array(
                            'key' => 'edgtf_match_status_meta',
                            'value' => 'finished',
                        ),
                    );
                    break;
                case 'canceled':
                    $meta_query = array(
                        array(
                            'key' => 'edgtf_match_status_meta',
                            'value' => 'canceled',
                        ),
                    );
                    break;
            }
        }

        if (is_array($meta_query) && count($meta_query)){
            $queryArray['meta_query'][] = $meta_query;
        }

        $projectIds = null;
        if (!empty($params['selected_projects'])) {
            $projectIds = explode(',', $params['selected_projects']);
            $queryArray['post__in'] = $projectIds;
        }

        if (!empty($params['next_page'])) {
            $queryArray['paged'] = $params['next_page'];

        } else {
            $queryArray['paged'] = 1;
        }

        return new \WP_Query($queryArray);
    }
}