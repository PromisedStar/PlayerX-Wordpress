<?php

if ( ! function_exists( 'playerx_edge_include_woocommerce_shortcodes' ) ) {
	function playerx_edge_include_woocommerce_shortcodes() {
		foreach ( glob( EDGE_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( playerx_edge_core_plugin_installed() ) {
		add_action( 'playerx_core_action_include_shortcodes_file', 'playerx_edge_include_woocommerce_shortcodes' );
	}
}
