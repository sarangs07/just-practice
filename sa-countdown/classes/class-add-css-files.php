<?php
	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */

	if( ! class_exists('Add_Css_Files')){

		class Add_Css_Files{

			/**
			*	Creating constructor to initialite the veriables and the functions.
			*/
 			function __construct(){
				//loading css
 				add_action( 'wp_enqueue_scripts', array( $this, 'EnqueFrontEndStyle' ) );
 				//loading js
 				//add_action( 'wp_enqueue_scripts', array( $this, 'AddCountDownScript' ) );
 				//load css to admin side
 				add_action('admin_enqueue_scripts',	array( $this, 'EnqueAdminStyle' ) );
 			}

 			/**
 			*	Creating function to add the JS file link
 			*
 			public function AddCountDownScript(){
 				wp_register_script('sa-countdown-script', plugins_url().'/sa-countdown/assets/js/sa-countdown-script.js');
 				wp_enqueue_script('sa-countdown-script');
 			}*/

 			/**
 			*	Creating function to add the CSS file link
 			*/
 			public function EnqueFrontEndStyle(){
 				
 				wp_register_style( 'sa-countdown-stylesheet', plugins_url().'/sa-countdown/assets/css/sa-countdown-style.css' );
				wp_enqueue_style( 'sa-countdown-stylesheet' );
 			}

 			/**
 			*	Creating function to add the CSS file link in admin panel
 			*/
 			public function EnqueAdminStyle(){
 				
 				wp_register_style( 'admin-bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
				wp_enqueue_style( 'admin-bootstrap-css' );
 			}
 			
		}

		/**
		*	creating object of the class
		*/
		$obj = new Add_Css_Files();
	}
?>