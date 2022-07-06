<?php
/*
 Plugin Name: Role Specific Max Upload Size
 Plugin URI: https://wordpress.org/plugins/role-specific-max-upload-size/
 Description: A simple plugin that lets you set different \"max_upload_size\" for each user role on your WordPress site. This is especially helpful if you want your administrator user to have a maximum max_upload_size limit whereas you want your users to upload smaller files.
 Version: 1.0
 Requires at least: 3.0
 Requires PHP: 5.6
 Author: Aswin Giri
 Author URI: https://aswin.com.np
 License: GPL v2 or later
 License URI: https://www.gnu.org/licenses/gpl-2.0.html
 Text Domain: wprsmus
 Domain Path: /languages
 */

if( ! defined( 'RSMUS_PLUGIN' )){
	define( 'RSMUS_PLUGIN', __FILE__  );
}

if( ! defined( 'RSMUS_URL' )){
	define( 'RSMUS_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}


if( ! defined( 'RSMUS_PATH' )){
	define( 'RSMUS_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}


include RSMUS_PATH.'includes/init.php';