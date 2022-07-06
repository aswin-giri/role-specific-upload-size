<?php 
namespace wprsmus;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('wprsmus\Action')){

	class Action {


		function __construct(){

			add_action( 'plugins_loaded', array( $this, 'plugin_i18n' ) );

			register_activation_hook( RSMUS_PLUGIN, array( $this, 'activation_hook' ) );

			register_deactivation_hook( RSMUS_PLUGIN, array( $this, 'deactivation_hook' ) );

			add_action( 'wp_ajax_rsmus_save_options', array( $this, 'rsmus_save_options' ) );

			add_filter( 'upload_size_limit', array( $this, 'filter_limit' ) );

		}


		function plugin_i18n(){

			load_plugin_textdomain('wprsmus', false, dirname( plugin_basename( RSMUS_PLUGIN ) ).'/languages/');

		}

		function filter_limit( $size ){

			$options = rsmus()->helper()->get_saved_options();

			foreach( $options as $key => $value ){

		      if ( current_user_can( $key ) ) {
		        return rsmus()->helper()->get_saved_options( $key )*1048576;
		      }

		    }

		    return $size;

		}


		function rsmus_save_options(){
			$hosting_limit = rsmus()->helper()->get_hosting_max_limit();
			$data = $_POST['role_max_size'];
			$nonce = $_POST['_wpnonce'];
			$nonce_action = 'role-based-max-upload-size';
			$sanatized_data = [];

			if( isset( $data, $nonce) && wp_verify_nonce( $nonce, $nonce_action ) && current_user_can( 'administrator' ) ){

				foreach( $data as $key => $value ){

					$v = sanitize_text_field( $value );
					$v = intval( $v );

					if( $v > $hosting_limit ){
						$v = $hosting_limit;
					}

					$sanatized_data[ $key ] = $v;


				}

				update_option( 'rsmus_max_upload_size', $sanatized_data );
				wp_send_json_success( __( 'Data saved successfully!', 'wprsmus' ) );

			}else{
				wp_send_json_error( __( 'Invalid request!', 'wprsmus' ) );
			}
		}


		function activation_hook(){

			$data = [];
			$roles = rsmus()->helper()->get_roles();
			$wp_limit = rsmus()->helper()->get_wp_max_limit();

			foreach($roles as $key => $value ){
				$data[$key] = $wp_limit;
			}

			update_option( 'rsmus_max_upload_size', $data );

		}



		function deactivation_hook(){

			delete_option( 'rsmus_max_upload_size' );

		}



	}

}