<?php
/**
 * Uninstallation of YARP-Rating plugin
 * This scripts handles the destruction of the data
 * created by the plugin, in the post_meta and custom tables
 * @package  YARP-rating
 * @since  1.0
 */

// Makes sure the call is from inside WP
if( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

global $wpdb;

$table_name = $wpdb->prefix . 'yarp-rating';
$query = "DROP TABLE `$table_name`";

$wpdb->query( $query );

?>