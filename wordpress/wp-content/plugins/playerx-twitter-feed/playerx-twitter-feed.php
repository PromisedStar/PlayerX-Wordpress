<?php
/*
Plugin Name: Playerx Twitter Feed
Description: Plugin that adds Twitter feed functionality to our theme
Author: Edge Themes
Version: 1.0.2
*/

define( 'PLAYERX_TWITTER_FEED_VERSION', '1.0.2' );
define( 'PLAYERX_TWITTER_ABS_PATH', dirname( __FILE__ ) );
define( 'PLAYERX_TWITTER_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'PLAYERX_TWITTER_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'PLAYERX_TWITTER_ASSETS_PATH', PLAYERX_TWITTER_ABS_PATH . '/assets' );
define( 'PLAYERX_TWITTER_ASSETS_URL_PATH', PLAYERX_TWITTER_URL_PATH . 'assets' );
define( 'PLAYERX_TWITTER_SHORTCODES_PATH', PLAYERX_TWITTER_ABS_PATH . '/shortcodes' );
define( 'PLAYERX_TWITTER_SHORTCODES_URL_PATH', PLAYERX_TWITTER_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'playerx_twitter_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function playerx_twitter_theme_installed() {
		return defined( 'EDGE_ROOT' );
	}
}

if ( ! function_exists( 'playerx_twitter_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function playerx_twitter_feed_text_domain() {
		load_plugin_textdomain( 'playerx-twitter-feed', false, PLAYERX_TWITTER_REL_PATH . '/languages' );
	}

	add_action( 'plugins_loaded', 'playerx_twitter_feed_text_domain' );
}