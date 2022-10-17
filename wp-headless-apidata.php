<?php
/**
 * Plugin Name: Headless-apidata
 * Plugin URI: https://www.wpwebdevelopment.com
 * Description: Display content using a shortcode to insert API data from a WP Rest API
 * Version: 1.0a
 * Text Domain: headless-apidata
 * Author: Gary Matthew Payne
 * Author URI: https://www.wpwebdevelopment.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Includes
//include('includes/api-func.php');
include('init.php');


// Hooks
add_action('wp_enqueue_scripts', 'headless_apidata_enqueue_scripts');


// Shortcodes
add_shortcode('headless_apidata', 'headless_apidata_function');