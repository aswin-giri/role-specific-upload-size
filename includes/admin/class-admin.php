<?php 
namespace wprsmus\admin;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('wprsmus\admin\Admin')){

	class Admin {


		function __construct(){

			add_action( 'admin_menu', array( $this, 'add_settings_page' ) );

		}


		function add_settings_page(){
			add_submenu_page( 'options-general.php', __( 'Role specific Max upload size','wprsmus' ), __( 'Role specific Max upload size', 'wprsmus' ), 'manage_options', 'role-specific-max-upload-size', array( $this, 'role_specific_max_upload_size_settings_view') );
		}

		function role_specific_max_upload_size_settings_view(){

			if( current_user_can( 'administrator' )){
				rsmus()->get_template_part( 'admin/settings' );
			}
			
		}


	}

}