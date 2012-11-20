<?php
/*
Plugin Name: YARP-rating
Plugin URI: http://tacensi.com/wp/yart-rating
Description: YARP-rating is, you guessed, a rating plugin. Yarp stands for yet another rating plugin, since there are only a few of those ;-) I wanted a plugin to provide user the ability to rate posts and custom posts with one to five stars, as well as the ability to later edit the rates. The other plugins are either too bloated with functions I do not want or do not provide the functionality I want.
Version: 1.0
Author: Thiago Censi
Author URI: http://tacensi.com
License: GPLv2
Copyright 2012 Thiago Censi (email: tacensi@gmail.com)
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/**
 * Plugin activation
 */
register_activation_hook(__FILE__, 'yarp_install');
/**
 * Inicialization function - Creates tables and makes the plugin ready
 * @since 1.0
 */
function yarp_install(){
	// Only WP 3.1+, please
	if( version_compare( get_bloginfo( 'version' ), '3.1', '<' ) ){
		deactivate_plugins( basename( __FILE__ ) );
	}

	// load wp database api, get the prefix and
	// create the new table
	global $wpdb;
	$table_name = $wpdb->prefix . 'yarp-rating';
	$query = "CREATE TABLE `$table_name`(
		`user_id` INT(11) NOT NULL ,
		`post_id` INT(11) NOT NULL ,
		`rating` INT(1) NOT NULL ,
		PRIMARY KEY ( `user_id` , `post_id` )
		)";

	// Create it with dbDelta, for upgrading functionality
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta( $query );
}


/**
 * Loading the plugin
 */
add_action( 'plugins_loaded', 'yarp_load' );
/**
 * Loading function - loads the necessary files et al.
 * @since  1.0
 */
function yarp_load(){
	// loading functions
}

/**
 * Loading the scripts and css on template redirect
 * @since 1.0
 */
add_action( 'template_redirect', 'yarp_load_scripts' );
/**
 * Loads scripts only for the needed views
 * @since  1.0
 */
function yarp_load_scripts(){
	if( is_singular( 'post' ) ){
		// wp_enqueue_scripts
	}
}

/**
 * Loads the admin menu
 */
add_action( 'admin_menu', 'yarp_admin_menu' );
/**
 * Loads the admin menu with options
 * @since  1.0
 */
function yarp_admin_menu(){
	// add_options_page();
}


?>
