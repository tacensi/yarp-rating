<?php
/**
 * Uninstallation of YARP-Rating plugin
 * This scripts handles the destruction of the data
 * created by the plugin, in the post_meta and custom tables
 * @package  YARP-rating
 * @since  1.0
 */

// Makes sure the call is from inside WP
if( !define( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

global $wpdb;

$prefix = $wpdb->base_prefix;

$sql = "DROP TABLE {$prefix}yarp-rating";

$wpdb->query( $sql );

?>