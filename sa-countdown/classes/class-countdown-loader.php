<?php

	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */
	if( ! class_exists('Sa_Countdown_Loader') ) {

		/**
		*	create Sa_Countdown_Loader class
		*/

		class Sa_Countdown_Loader{

			/**
			*	Creating constructor to initialite the veriables and the functions.
			*/
				function __construct(){
					$this->constantVers();
					$this->includesFiles();
				}
			

			/**
			* creating function to declare the contant veriables
			*/

			function constantVers(){
				// Here declared all the veriables which will be requierd in the countdown function.
				define( 'SA_COUNTDOWN_MAIN_FILE', trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'sa-countdown.php'  );
				define( 'SA_COUNTDOWN_BASE', plugin_basename( SA_COUNTDOWN_MAIN_FILE ) );
				define( 'SA_COUNTDOWN_DIR', plugin_dir_path( SA_COUNTDOWN_MAIN_FILE ) );
				define( 'SA_COUNTDOWN_PLUGIN_URL', plugins_url( '/', SA_COUNTDOWN_MAIN_FILE ) );
			}
			
			/**
			*	Creating function to load the desired files
			*/

			function includesFiles(){
				//require_once('sa-countdown other files to include one by one');
				require_once( SA_COUNTDOWN_DIR . 'classes/class-create-option-page.php' );
				require_once( SA_COUNTDOWN_DIR . 'classes/class-add-css-files.php' );
				require_once( SA_COUNTDOWN_DIR . 'classes/class-create-shortcode.php' );
			}
		}

		/**
		*	creating object of the class
		*/
		$obj = new Sa_Countdown_Loader();
	}
?>