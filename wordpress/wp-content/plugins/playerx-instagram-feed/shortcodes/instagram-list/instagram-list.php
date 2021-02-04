<?php

namespace PlayerxInstagram\Shortcodes\InstagramList;

use PlayerxInstagram\Lib;


class InstagramList implements Lib\ShortcodeInterface
{
    private $base;

    public function __construct()
    {
        $this->base = 'edgtf_instagram_list';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase()
    {
        return $this->base;
    }

    public function vcMap()
    {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Edge Instagram List', 'playerx-instagram-feed'),
                    'base' => $this->base,
                    'category' => esc_html__('by PLAYERX', 'playerx-instagram-feed'),
                    'icon' => 'icon-wpb-instagram-list extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'number_of_columns',
                            'heading' => esc_html__('Number of Columns', 'playerx-instagram-feed'),
                            'value' => array_flip(playerx_edge_get_number_of_columns_array(false, array('one', 'six'))),
                            'save_always' => true
                        ),
                        array(
                            'param_name' => 'type',
                            'type' => 'dropdown',
                            'heading' => esc_html__('Type', 'playerx-instagram-feed'),
                            'value' => array(
                                esc_html__( 'Gallery', 'playerx-instagram-feed') => 'gallery',
                                esc_html__( 'Carousel', 'playerx-instagram-feed') => 'carousel'
                            )
                        ),
                        array(
                            'param_name' => 'space_between_columns',
                            'type' => 'dropdown',
                            'heading' => esc_html__('Space Between Items', 'playerx-instagram-feed'),
                            'value' => array_flip(playerx_edge_get_space_between_items_array())
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'number_of_photos',
                            'heading' => esc_html__('Number of Photos', 'playerx-instagram-feed')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'transient_time',
                            'heading' => esc_html__('Images Cache Time', 'playerx-instagram-feed'),
                            'value' => '10800',
                            'save_always' => true
                        ),

                        array(
                            'param_name' => 'show_instagram_icon',
                            'type' => 'dropdown',
                            'heading' => esc_html__('Show Instagram Icon', 'playerx-instagram-feed'),
                            'value' => array_flip(playerx_edge_get_yes_no_select_array(false)),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_loop',
                            'heading' => esc_html__('Enable Slider Loop', 'playerx-instagram-feed'),
                            'value' => array_flip(playerx_edge_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'playerx-instagram-feed')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_autoplay',
                            'heading' => esc_html__('Enable Slider Autoplay', 'playerx-instagram-feed'),
                            'value' => array_flip(playerx_edge_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'playerx-instagram-feed')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'slider_speed',
                            'heading' => esc_html__('Slide Duration', 'playerx-instagram-feed'),
                            'description' => esc_html__('Default value is 5000 (ms)', 'playerx-instagram-feed'),
                            'group' => esc_html__('Slider Settings', 'playerx-instagram-feed')
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'slider_speed_animation',
                            'heading' => esc_html__('Slide Animation Duration', 'playerx-instagram-feed'),
                            'description' => esc_html__('Speed of slide animation in milliseconds. Default value is 600.', 'playerx-instagram-feed'),
                            'group' => esc_html__('Slider Settings', 'playerx-instagram-feed')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_navigation',
                            'heading' => esc_html__('Enable Slider Navigation Arrows', 'playerx-instagram-feed'),
                            'value' => array_flip(playerx_edge_get_yes_no_select_array(false, true)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'playerx-instagram-feed')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'slider_pagination',
                            'heading' => esc_html__('Enable Slider Pagination', 'playerx-instagram-feed'),
                            'value' => array_flip(playerx_edge_get_yes_no_select_array(false, false)),
                            'save_always' => true,
                            'group' => esc_html__('Slider Settings', 'playerx-instagram-feed')
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null)
    {
        $args = array(
            'number_of_columns' => 'three',
            'space_between_columns' => 'normal',
            'number_of_photos' => '',
            'transient_time' => '',
            'show_instagram_icon' => 'no',
            'type' => 'gallery',
            'slider_loop' => 'yes',
            'slider_autoplay' => 'yes',
            'slider_speed' => '5000',
            'slider_speed_animation' => '600',
            'slider_navigation' => 'yes',
            'slider_pagination' => 'no'
        );
        $params = shortcode_atts($args, $atts);
        extract($params);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['carousel_classes'] = $this->getCarouselClasses($params);

        $instagram_api = new \PlayerxInstagramApi();
        $params['instagram_api'] = $instagram_api;

        $images_array = $instagram_api->getImages($params['number_of_photos'], array(
            'use_transients' => true,
            'transient_name' => '_playerx_instagram_api_transient_name' ,
            'transient_time' => $params['transient_time']
        ));

        $params['images_array'] = $images_array;
        $params['data_attr'] = $this->getSliderData($params);

        //Get HTML from template based on type of team
        $html = playerx_instagram_get_shortcode_module_template_part('templates/holder', 'instagram-list', '', $params);

        return $html;
    }

    public function getHolderClasses($params)
    {
        $holderClasses = array();

        $holderClasses[] = $this->getColumnNumberClass($params['number_of_columns']);
        $holderClasses[] = !empty($params['space_between_columns']) ? 'edgtf-' . $params['space_between_columns'] . '-space' : 'edgtf-il-normal-space';

        return implode(' ', $holderClasses);
    }


    public function getCarouselClasses($params)
    {
        $carouselClasses = array();

        if ($params['type'] === 'carousel') {
            $carouselClasses = 'edgtf-instagram-carousel edgtf-owl-slider';

        } else if ($params['type'] == 'gallery') {
            $carouselClasses = 'edgtf-instagram-gallery';
        }

        return $carouselClasses;
    }


    public function getColumnNumberClass($params)
    {
        switch ($params) {
            case 'one':
                $classes = 'edgtf-il-one-column';
                break;
            case 'two':
                $classes = 'edgtf-il-two-columns';
                break;
	        case 'three':
		        $classes = 'edgtf-il-three-columns';
		        break;
            case 'four':
                $classes = 'edgtf-il-four-columns';
                break;
            case 'five':
                $classes = 'edgtf-il-five-columns';
                break;
            default:
                $classes = 'edgtf-il-three-columns';
                break;
        }

        return $classes;
    }

    private function getSliderData($params)
    {
        $slider_data = array();

        $slider_data['data-number-of-items'] = $params['number_of_columns'];
        $slider_data['data-enable-loop'] = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
        $slider_data['data-enable-autoplay'] = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
        $slider_data['data-slider-speed'] = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
        $slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
        $slider_data['data-enable-navigation'] = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
        $slider_data['data-enable-pagination'] = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';

        return $slider_data;
    }
}