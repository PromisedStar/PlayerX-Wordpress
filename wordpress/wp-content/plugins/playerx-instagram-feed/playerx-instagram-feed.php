<?php
/*
Plugin Name: Playerx Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Edge Themes
Version: 2.1
*/

define( 'PLAYERX_INSTAGRAM_FEED_VERSION', '2.1' );
define( 'PLAYERX_INSTAGRAM_ABS_PATH', dirname( __FILE__ ) );
define( 'PLAYERX_INSTAGRAM_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'PLAYERX_INSTAGRAM_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'PLAYERX_INSTAGRAM_ASSETS_PATH', PLAYERX_INSTAGRAM_ABS_PATH . '/assets' );
define( 'PLAYERX_INSTAGRAM_ASSETS_URL_PATH', PLAYERX_INSTAGRAM_URL_PATH . 'assets' );
define( 'PLAYERX_INSTAGRAM_SHORTCODES_PATH', PLAYERX_INSTAGRAM_ABS_PATH . '/shortcodes' );
define( 'PLAYERX_INSTAGRAM_SHORTCODES_URL_PATH', PLAYERX_INSTAGRAM_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'playerx_instagram_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function playerx_instagram_theme_installed() {
		return defined( 'EDGE_ROOT' );
	}
}

if ( ! function_exists( 'playerx_instagram_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function playerx_instagram_feed_text_domain() {
		load_plugin_textdomain( 'playerx-instagram-feed', false, PLAYERX_INSTAGRAM_REL_PATH . '/languages' );
	}

	add_action( 'plugins_loaded', 'playerx_instagram_feed_text_domain' );
}