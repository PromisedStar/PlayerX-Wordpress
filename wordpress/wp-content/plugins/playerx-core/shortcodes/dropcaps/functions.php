<?php

if ( ! function_exists( 'playerx_core_add_dropcaps_shortcodes' ) ) {
	function playerx_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PlayerxCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'playerx_core_filter_add_vc_shortcode', 'playerx_core_add_dropcaps_shortcodes' );
}