<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('Role_Specific_Max_Upload_Size')){

    class Role_Specific_Max_Upload_Size {

        static protected $instance = null;

        public $classes = [];


        public static function autoload( $class_name ){

            $class_name = str_replace( 'wprsmus','includes', $class_name );
            $class_name = str_replace( '\\','/', $class_name );
            $array = explode( '/', strtolower( $class_name ) );
            $class_file_name = 'class-'. end( $array ).'.php';
            $array[ count( $array ) - 1 ] = strtolower($class_file_name);
            $class_name = implode('/',$array);

            if( file_exists( RSMUS_PATH.$class_name ) ){
                require RSMUS_PATH.$class_name;
            }

        }


        public static function instance(){

            if( is_null( self::$instance ) ){
                self::$instance = new self();
            }

            return self::$instance;

        }


        function __construct(){
            $this->includes();
        }


        function includes(){

            $this->enqueue();
            $this->helper();
            $this->action();

	        $this->admin();

        }


        function enqueue(){
            if( empty($this->classes['enqueue'])){
                $this->classes['enqueue'] = new wprsmus\Enqueue();
            }

            return $this->classes['enqueue'];
        }

        function helper(){
            if( empty($this->classes['helper'])){
                $this->classes['helper'] = new wprsmus\Helper();
            }

            return $this->classes['helper'];
        }

        function admin(){
            if( empty($this->classes['admin'])){
                $this->classes['admin'] = new wprsmus\admin\Admin();
            }

            return $this->classes['admin'];
        }

    	function action(){
                if( empty($this->classes['action'])){
                    $this->classes['action'] = new wprsmus\Action();
                }

                return $this->classes['action'];
         }


        function get_template_part( $template , $args = [] ){


            if( ! empty( $args ) ){

                extract( $args );
            }
            
            $path = RSMUS_PATH.'templates/'.$template.'.php';
            $path = apply_filters( 'RSMUS_template',$path, $template );

            include $path;

        }




    }

}

spl_autoload_register( array( 'Role_Specific_Max_Upload_Size','autoload' ) );

if( ! function_exists('rsmus')){

    function rsmus(){
        return Role_Specific_Max_Upload_Size::instance();
    }

}

rsmus();