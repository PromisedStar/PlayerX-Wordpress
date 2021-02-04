<?php

if ( ! function_exists( 'playerx_instagram_include_shortcodes_file' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function playerx_instagram_include_shortcodes_file() {
		foreach ( glob( PLAYERX_INSTAGRAM_SHORTCODES_PATH . '/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
		
		do_action( 'playerx_instagram_action_include_shortcodes_file' );
	}
	
	add_action( 'init', 'playerx_instagram_include_shortcodes_file', 6 ); // permission 6 is set to be before vc_before_init hook that has permission 9
}

if ( ! function_exists( 'playerx_instagram_load_shortcodes' ) ) {
	function playerx_instagram_load_shortcodes() {
		include_once PLAYERX_INSTAGRAM_ABS_PATH . '/lib/shortcode-loader.php';
		
		PlayerxInstagram\Lib\ShortcodeLoader::getInstance()->load();
	}
	
	add_action( 'init', 'playerx_instagram_load_shortcodes', 7 ); // permission 7 is set to be before vc_before_init hook that has permission 9 and after playerx_instagram_include_shortcodes_file hook
}

if ( ! function_exists( 'playerx_instagram_get_shortcode_module_template_part' ) ) {
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
	function playerx_instagram_get_shortcode_module_template_part( $template, $shortcode, $slug = '', $params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = PLAYERX_INSTAGRAM_SHORTCODES_PATH . '/' . $shortcode;
		
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