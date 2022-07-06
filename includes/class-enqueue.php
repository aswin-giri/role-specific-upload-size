<?php 
namespace wprsmus;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('wprsmus\Enqueue')){

	class Enqueue {


		function __construct(){

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );

		}


		function admin_assets(){
			
			wp_enqueue_style( 'role-specific-max-upload-size_admin_styles', RSMUS_URL.'assets/css/role-specific-max-upload-size-admin-style.min.css' );

			wp_enqueue_script( 'jquery' );
			
			wp_enqueue_script( 'role-specific-max-upload-size_main_scripts', RSMUS_URL.'assets/js/role-specific-max-upload-size-admin-script.min.js', array( 'jquery' ),'1.0',true );

		}

	}

}