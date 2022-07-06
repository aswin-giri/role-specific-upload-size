<?php 
namespace wprsmus;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('wprsmus\Helper')){

	class Helper {

		public $user_roles = [];
		public $hosting_limit = 0;
		public $wp_limit = 0;
		public $options = [];

		function __construct(){



		}



		function get_roles() {

		  if( empty( $this->user_roles ) ){

			  	$editable_roles = get_editable_roles();
				  foreach ($editable_roles as $role => $details) {
				      $roles[ esc_attr($role) ] = translate_user_role($details['name']);;
				  }

			  $this->user_roles = $roles;

		  }

		  return $this->user_roles;

		}


		function get_hosting_max_limit(){

			if( ! $this->hosting_limit ){

				$this->hosting_limit = min((int)ini_get('post_max_size'), (int)ini_get('upload_max_filesize'));

			}

			return $this->hosting_limit;

		}


		function get_wp_max_limit(){

			if( ! $this->wp_limit ){
				
				$this->wp_limit = wp_max_upload_size()/1048576;
			}

			return $this->wp_limit;

		}


		function get_saved_options( $role_key = '' ){

			if( empty( $this->options ) ){

				$options = get_option( 'rsmus_max_upload_size' );

				if( ! $options ){
					$this->options = [];
				}else{
					$this->options = $options;
				}
			}

			if( $role_key ){
				if( isset( $this->options[ $role_key] ) ){
					return esc_html( $this->options[ $role_key] );
				}else{
					return esc_html( $this->get_wp_max_limit() );
				}
			}

			return $this->options;

		}



	}

}