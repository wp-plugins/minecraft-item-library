<?php
/*
	Plugin Name: Minecraft Item Library
	Plugin URI: http://www.alieneila.net
	Description: Adds functionality for minecraft recipe and item library system
	Author: Joshua Segatto
	Author URI: http://www.alieneila.net/

	Version: 1.0

	License: GNU General Public License v2.0 (or later)
	License URI: http://www.opensource.org/licenses/gpl-license.php
	
*/


/*
To Do
Block/Item ID
Attack Strength
Health
Cookable
Source
*/

$plugin_path = plugin_dir_path(__FILE__);
$plugin_url = plugin_dir_url(__FILE__);

add_theme_support( 'post-thumbnails', array( 'minecraft-item' ) );
add_image_size( 'recipe-table', 50, 50, true );

add_action( 'wp_enqueue_scripts', 'almc_add_my_stylesheet' );

function almc_add_my_stylesheet() {
	wp_register_style( 'almc-style', plugins_url('css/style.css', __FILE__) );
	wp_enqueue_style( 'almc-style' );
	if (file_exists($plugin_path.'css/custom.css')) {
		wp_register_style( 'alt-almc-style', plugins_url('css/custom.css', __FILE__) );
		wp_enqueue_style( 'alt-almc-style' );
	}
}

include_once($plugin_path.'lib/mciteminit.php');
include_once($plugin_path.'lib/mcitemboxes.php');
include_once($plugin_path.'lib/mcitemtables.php');
include_once($plugin_path.'admin/mcitemadmin.php');

function wpse12814_posts_orderby( $orderby ) {
	global $wpdb;
    $orderby = $wpdb->prefix.'postmeta.meta_value DESC, '.$orderby.'';
    return $orderby;
}

?>