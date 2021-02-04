<?php

if ( ! function_exists( 'playerx_core_get_cpt_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $post_type name of the post type of shortcode
	 * @param string $shortcode name of the shortcode
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param array $additional_params array of additional parameters to pass to template
	 *
	 * @return html
	 */
	function playerx_core_get_cpt_shortcode_module_template_part( $post_type, $shortcode, $template, $slug = '', $params = array(), $additional_params = array() ) {

		//HTML Content from template
		$html          = '';
		$template_path = PLAYERX_CORE_CPT_PATH . '/' . $post_type . '/shortcodes/' . $shortcode . '/templates';

		$temp = $template_path . '/' . $template;
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		if ( is_array( $additional_params ) && count( $additional_params ) ) {
			extract( $additional_params );
		}

		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'playerx_core_get_cpt_single_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $cpt_name name of the cpt folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function playerx_core_get_cpt_single_module_template_part( $template, $cpt_name, $slug = '', $params = array() ) {

		//HTML Content from template
		$html          = '';
		$template_path = PLAYERX_CORE_CPT_PATH . '/' . $cpt_name;

		$temp = $template_path . '/' . $template;

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		if ( ! empty( $template ) ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}

		echo playerx_edge_get_module_part( $html );
	}
}

if ( ! function_exists( 'playerx_core_return_cpt_single_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $cpt_name name of the cpt folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function playerx_core_return_cpt_single_module_template_part( $template, $cpt_name, $slug = '', $params = array() ) {

		//HTML Content from template
		$html          = '';
		$template_path = PLAYERX_CORE_CPT_PATH . '/' . $cpt_name;

		$temp = $template_path . '/' . $template;

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		if ( ! empty( $template ) ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'playerx_core_get_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $shortcode name of the shortcode folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function playerx_core_get_shortcode_module_template_part( $template, $shortcode, $slug = '', $params = array() ) {

		//HTML Content from template
		$html          = '';
		$template_path = PLAYERX_CORE_SHORTCODES_PATH . '/' . $shortcode;

		$temp = $template_path . '/' . $template;

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'playerx_core_get_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module to load
	 * @param string $template name of the template file
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function playerx_core_get_module_template_part( $module, $template, $slug = '', $params = array() ) {

		//HTML Content from template
		$html          = '';
		$template_path = PLAYERX_CORE_ABS_PATH . '/' . $module . '/templates';

		$temp = $template_path . '/' . $template;

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'playerx_core_get_module_shortcode_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module to load
	 * @param string $shortcode name of the shortcode to load
	 * @param string $template name of the template file
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function playerx_core_get_module_shortcode_template_part( $module, $shortcode, $template, $slug = '', $params = array() ) {

		//HTML Content from template
		$html          = '';
		$template_path = PLAYERX_CORE_ABS_PATH . '/' . $module . '/shortcodes/' . $shortcode . '/templates';

		$temp = $template_path . '/' . $template;

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		$template = '';

		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";

				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}

		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'playerx_core_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 */
	function playerx_core_ajax_status( $status, $message, $data = null ) {
		$response = array(
			'status'  => $status,
			'message' => $message,
			'data'    => $data
		);

		$output = json_encode( $response );

		exit( $output );
	}
}

if ( ! function_exists( 'playerx_edge_add_user_custom_fields' ) ) {
	/**
	 * Function creates custom social fields for users
	 *
	 * return $user_contact
	 */
	function playerx_edge_add_user_custom_fields( $user_contact ) {
		/**
		 * Function that add custom user fields
		 **/
		$user_contact['facebook']       = esc_html__( 'Facebook', 'playerx-core' );
		$user_contact['twitter-square'] = esc_html__( 'Twitter', 'playerx-core' );
		$user_contact['linkedin']       = esc_html__( 'Linkedin', 'playerx-core' );
		$user_contact['instagram']      = esc_html__( 'Instagram', 'playerx-core' );
		$user_contact['pinterest']      = esc_html__( 'Pinterest', 'playerx-core' );
		$user_contact['tumblr']         = esc_html__( 'Tumbrl', 'playerx-core' );
		$user_contact['googleplus']     = esc_html__( 'Google Plus', 'playerx-core' );
		$user_contact['youtube']        = esc_html__( 'Youtube', 'playerx-core' );
		$user_contact['twitch']         = esc_html__( 'Twitch', 'playerx-core' );

		return $user_contact;
	}

	add_filter( 'user_contactmethods', 'playerx_edge_add_user_custom_fields' );
}

if ( ! function_exists( 'playerx_core_set_open_graph_meta' ) ) {
	/*
	 * Function that echoes open graph meta tags if enabled
	 */
	function playerx_core_set_open_graph_meta() {

		if ( playerx_edge_option_get_value( 'enable_open_graph' ) === 'yes' ) {

			// get the id
			$id = get_queried_object_id();

			// default type is article, override it with product if page is woo single product
			$type        = 'article';
			$description = '';

			// check if page is generic wp page w/o page id
			if ( playerx_edge_is_default_wp_template() ) {
				$id = 0;
			}

			// check if page is woocommerce shop page
			if ( playerx_edge_is_woocommerce_installed() && ( function_exists( 'is_shop' ) && is_shop() ) ) {
				$shop_page_id = get_option( 'woocommerce_shop_page_id' );

				if ( ! empty( $shop_page_id ) ) {
					$id = $shop_page_id;
					// set flag
					$description = 'woocommerce-shop';
				}
			}

			if ( function_exists( 'is_product' ) && is_product() ) {
				$type = 'product';
			}

			// if id exist use wp template tags
			if ( ! empty( $id ) && ! is_front_page() ) {
				$url   = get_permalink( $id );
				$title = get_the_title( $id );

				// apply bloginfo description to woocommerce shop page instead of first product item description
				if ( $description === 'woocommerce-shop' ) {
					$description = get_bloginfo( 'description' );
                } elseif (get_post_field( 'post_excerpt', $id ) !== '') {
                    $description = strip_tags( apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $id ) ) );
                } else {
                    $description = get_bloginfo( 'description' );
                }


                // has featured image
				if ( get_post_thumbnail_id( $id ) !== '' ) {
					$image = wp_get_attachment_url( get_post_thumbnail_id( $id ) );
				} else {
					$image = playerx_edge_option_get_value( 'open_graph_image' );
				}
			} else {
				global $wp;
				$url         = esc_url( home_url( add_query_arg( array(), $wp->request ) ) );
				$title       = get_bloginfo( 'name' );
				$description = get_bloginfo( 'description' );
				$image       = playerx_edge_option_get_value( 'open_graph_image' );
			}
			?>

            <meta property="og:url" content="<?php echo esc_url( $url ); ?>"/>
            <meta property="og:type" content="<?php echo esc_html( $type ); ?>"/>
            <meta property="og:title" content="<?php echo esc_html( $title ); ?>"/>
            <meta property="og:description" content="<?php echo esc_html( $description ); ?>"/>
            <meta property="og:image" content="<?php echo esc_url( $image ); ?>"/>

		<?php }
	}

	add_action( 'playerx_edge_action_header_meta', 'playerx_core_set_open_graph_meta' );
}

if ( ! function_exists( 'playerx_core_include_widgets_file' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 */
	function playerx_core_include_widgets_file() {

		do_action( 'playerx_core_action_include_widgets_file' );
	}

	add_action( 'playerx_edge_action_before_options_map', 'playerx_core_include_widgets_file', 20 ); // permission 20 is set to be before vc_before_init hook that has permission 9
}

/* Function for adding custom meta boxes hooked to default action */
if ( class_exists( 'WP_Block_Type' ) && defined( 'EDGE_ROOT' ) ) {
	add_action( 'admin_head', 'playerx_edge_meta_box_add' );
} else {
	add_action( 'add_meta_boxes', 'playerx_edge_meta_box_add' );
}


if ( ! function_exists( 'playerx_edge_create_meta_box_handler' ) ) {

	function playerx_edge_create_meta_box_handler( $box, $key, $screen ) {
		add_meta_box(
			'edgtf-meta-box-' . $key,
			$box->title,
			'playerx_edge_render_meta_box',
			$screen,
			'advanced',
			'high',
			array( 'box' => $box )
		);
	}
}

if ( ! function_exists( 'playerx_edge_create_wp_widget' ) ) {
	function playerx_edge_create_wp_widget( $widget ) {
		register_widget( $widget );
	}
}