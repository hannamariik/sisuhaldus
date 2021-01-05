<?php
/*
Plugin Name: Joulud
Plugin URI: https://hanna-mariikriisa.ikt.khk.ee/wordpress/
Description: Joulud
Version: 1.0
Author: Hanna-Marii Kriisa
Author URI: https://hanna-mariikriisa.ikt.khk.ee/wordpress/
Text Domain: weather-effect
Domain Path: /languages
*/

define( 'WE_PLUGIN_PATH', plugin_dir_url( __FILE__ ) );

//Plugin Text Domain
define('WE_TXTD','weather-effect' );

//Load text domain
add_action( 'plugins_loaded', 'WE_load_textdomain' );

function WE_load_textdomain() {
	load_plugin_textdomain( WE_TXTD, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

require_once('settings.php');

//Default settings
function weather_effect_default_settings() {
	$weather_effect_settings = get_option('weather_effect_settings');
	add_option( 'weather_effect_settings', $_POST );
}
register_activation_hook( __FILE__, 'weather_effect_default_settings' );

// load jQuery
function awplife_we_script() {
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'awplife_we_script' );

function awplife_we_scripts_load_in_head(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('awplife-we-snow-christmas-snow-js',  WE_PLUGIN_PATH .'assets/js/christmas-snow/christmas-snow.js');
	wp_enqueue_script('awplife-we-snow-snow-falling-js',  WE_PLUGIN_PATH .'assets/js/snow-falling/snow-falling.js');
	wp_enqueue_script('awplife-we-snow-snowfall-master-js',  WE_PLUGIN_PATH .'assets/js/snowfall-master/snowfall-master.min.js', array( 'jquery' ), '', true);
	
	$weather_effect_settings = get_option('weather_effect_settings');
	if(isset($weather_effect_settings['enable_weather_effect'])) $enable_weather_effect = $weather_effect_settings['enable_weather_effect']; else $enable_weather_effect = 1;
	
	// check weather effect ON / OFF
	if($enable_weather_effect == 1) {
		require_once('output.php');
	}
}
add_action( "wp_head", "awplife_we_scripts_load_in_head" );
?>