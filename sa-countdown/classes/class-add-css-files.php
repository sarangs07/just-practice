<?php
	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */

	if( ! class_exists(addCsslinks)){

		class addCsslinks{

			private static $static_veriable;

 			public static function instantiate(){

 				if ( ! isset( self::$static_veriable ) ) {
					self::$static_veriable = new addCsslinks();
					self::$static_veriable->addCss();
				}

				return self::$static_veriable;

 			}

 			/**
 			*	Creating function to add the css files & links
 			*/

 			public function addCss(){
 				//echo "In Add Function - It is working";
 				//loading css
 				add_action( 'admin_init', array( $this, 'enque_css_files' ) );
 				add_action( 'init', array( $this, 'enque_front_end_style' ) );

 			//loading js
 				add_action( 'init', array( $this, 'addCountdownScript' ) );
 				
 			}

 			function enque_css_files(){
 				//echo "css file added - It is working";
 				add_action( 'wp_enqueue_scripts', array( $this, 'enque_css_files' ) );

 				wp_register_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
				wp_enqueue_style( 'bootstrap-css' );
 			}

 			public function addCountdownScript(){
 				wp_register_script('sa-countdown-script', plugins_url().'/sa-countdown/assets/js/sa-countdown-script.js');
 				wp_enqueue_script('sa-countdown-script');
 			}

 			public function enque_front_end_style(){
 				add_action( 'wp_enqueue_scripts', array( $this, 'enque_front_end_style' ) );
 				wp_register_style( 'sa-countdown-stylesheet', plugins_url().'/sa-countdown/assets/css/sa-countdown-style.css' );
				wp_enqueue_style( 'sa-countdown-stylesheet' );
 			}
 			
		}

		addCsslinks::instantiate();
	}
?>