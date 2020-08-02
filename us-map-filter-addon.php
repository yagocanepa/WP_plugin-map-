<?php
/*
Plugin Name: US Map data filter addon plugin.
Description: User can filter data according to US state.
Author: Yogendra Singh Solanki
Version: 1.0.0
Requires PHP: 5.4
WC requires at least: 3.5.0
WC tested up to: 4.3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}
define( 'USMPA_BASE_DIR', plugin_dir_path( __FILE__ ) );
define( 'USMPA_BASE_URL', plugin_dir_url(__FILE__) );

/** On plugin activation create database **/
function usmpa_create_plugin_database_table()
{
  global $wpdb;
	if ( is_multisite() ) {
        // Get all blogs in the network and activate plugin on each one
        $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
        foreach ( $blog_ids as $blog_id ) {
            switch_to_blog( $blog_id );
           	require ('inc/db.php');
            restore_current_blog();
        }
    } else {
       require ('inc/db.php');
    }
	
	    
}

register_activation_hook( __FILE__, 'usmpa_create_plugin_database_table' );

function register_usmpa_view_admin_submenu_page() {

    add_submenu_page( 'usr-map', 'View State Data', 'View State Data', 'manage_options', 'usmpa-state-data', 'usmpa_view_state_data_callback' );

}

/**
 * Enqueue a script in the WordPress admin, excluding edit.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function usmpa_selectively_enqueue_admin_script( $hook ) {
    if( isset( $_REQUEST['page'] ) && ( $_REQUEST['page'] == "usmpa-state-data" || $_REQUEST['page'] == "usmpa-add-state-data'" ) ){
      wp_enqueue_script( 'usmpa-admin-assets-js', plugin_dir_url( __FILE__ ) . 'assets/admin/usmpa-admin-js.js', array(), '1.0', true );
      wp_localize_script( 'usmpa-admin-assets-js', 'usmpa_js_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'usmpa_ajax_nonce' => wp_create_nonce('usmpa-fro-form-ajax'), 'usmpa_site_url' => site_url() ) );

      
    }
   
}
add_action( 'admin_enqueue_scripts', 'usmpa_selectively_enqueue_admin_script' );
function usmpa_view_state_data_callback() {
   include('include/admin/show_usmpa_admin_data.php');

}

add_action('admin_menu', 'register_usmpa_view_admin_submenu_page',99)
;
function register_usmpa_admin_submenu_page() {

    add_submenu_page( 'usr-map', 'Add State Data', 'Add State Data', 'manage_options', 'usmpa-add-state-data', 'usmpa_state_data_callback' );

}

function usmpa_state_data_callback() {
   include('include/admin/add_usmpa_admin_data.php');

}

add_action('admin_menu', 'register_usmpa_admin_submenu_page',99);
require_once(dirname(__FILE__).'/include/class-usmap-yss.php');



?>