<?php
namespace PlayerxCore\CPT\Shortcodes\StreamBox;

use PlayerxCore\lib;

class StreamBox implements lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'edgtf_stream_box';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if ( function_exists( 'vc_map' ) ) {
            vc_map(
                array(
                    'name'                      => esc_html__( 'Stream Box', 'playerx-core' ),
                    'base'                      => $this->base,
                    'category'                  => esc_html__( 'by PLAYERX', 'playerx-core' ),
                    'icon'                      => 'icon-wpb-stream-box extended-custom-icon',
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
                            'heading'     => esc_html__( 'Layout', 'playerx-core' ),
                            'value'       => array(
                                esc_html__( 'Standard (three streams)', 'playerx-core' ) => 'standard',
                                esc_html__( 'Minimal (one stream)', 'playerx-core' )    => 'minimal',
                            ),
                            'save_always' => true,
                        ),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'main_stream_image',
                            'heading'     => esc_html__( 'Main Stream Image', 'playerx-core' ),
                            'description' => esc_html__( 'Select image from media library', 'playerx-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'main_stream_title',
                            'heading'    => esc_html__( 'Main Stream Title', 'playerx-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'main_stream_link',
                            'heading'    => esc_html__( 'Main Stream Title', 'playerx-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'main_stream_platform',
                            'heading'    => esc_html__(' Streaming video platform ', 'playerx-core')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'main_stream_channel',
                            'heading'    => esc_html__(' Streaming video platform channel name', 'playerx-core')
                        ),
                        array(
                            'type' => 'param_group',
                            'heading' => esc_html__( 'Additional Stream Items', 'playerx-core' ),
                            'param_name' => 'items',
                            'params' => array(
                                array(
                                    'type'        => 'attach_image',
                                    'param_name'  => 'stream_background_image',
                                    'heading'     => esc_html__( 'Stream Background Image', 'playerx-core' ),
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'param_name'  => 'stream_title',
                                    'heading'     => esc_html__( 'Stream Title', 'playerx-core' ),
                                    'admin_label' => true
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'param_name'  => 'stream_link',
                                    'heading'     => esc_html__( 'Stream link', 'playerx-core' ),
                                    'admin_label' => true
                                ),
                            )
                        ),
                    )
                )
            );
        }
    }

    public function render( $atts, $content = null ) {
        $args = array(
            'items'       => '',
            'custom_class'=> '',
            'type'        => 'standard',
            'main_stream_image' => '',
            'main_stream_title' => '',
            'main_stream_link' => '',
            'main_stream_platform' => '',
            'main_stream_channel' => '',
        );
        $params = shortcode_atts( $args, $atts );

        $params['holder_classes'] = $this->getHolderClasses( $params, $args );
        $params['single_stream'] = $this->getSingleStreamParams($params);

        $html = playerx_core_get_shortcode_module_template_part( 'templates/stream-box', 'stream-box', '', $params );

        return $html;
    }

    private function getHolderClasses( $params, $args ) {
        $holderClasses = array();

        $holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
        $holderClasses[] = ! empty( $params['type'] ) ? 'edgtf-sb-' . $params['type'] : 'edgtf-st-' . $args['type'];

        return implode( ' ', $holderClasses );
    }

    private function getSingleStreamParams($params) {
        $single_stream = json_decode(urldecode($params['items']), true);
        $single_items = array();

        foreach ($single_stream as $single_stream_item) {

            $single_items[] = $single_stream_item;
        }

        return $single_items;

    }
}