<?php
 global $table_prefix, $wpdb;

$tblname = 'ummpa_state_data_list';
$wp_track_table = trim($table_prefix . "$tblname");
$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE `".$wp_track_table."` (
		  `id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `state` varchar(255) NOT NULL,
		  `state_code` varchar(255) NOT NULL,
		  `city_name` varchar(255) NOT NULL,
		  `failure_quarrantine` varchar(255) NOT NULL,
		  `source_url_quarrantine` varchar(255) NOT NULL,
		  `failure_contact_trace` varchar(255) NOT NULL,
		  `source_url_contacttrace` varchar(255) NOT NULL,
		  `failure_wear_mask` varchar(255) NOT NULL,
		  `source_url_wearmask` varchar(255) NOT NULL,
		  `author_id` bigint(20) NOT NULL,
		  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  PRIMARY KEY (`id`)
		) $charset_collate;";
    // $sql = "CREATE TABLE `". $wp_track_table . "` ( ";
    // $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
    // $sql .= "  `pincode`  int(128)   NOT NULL, ";
    // $sql .= "  PRIMARY KEY `order_id` (`id`) "; 
    // $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";

// die();
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    dbDelta($sql);
?>