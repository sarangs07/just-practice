<?php

	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */
	if( ! class_exists(Clas_Countdown) ) {

		/**
		*	create Clas_Countdown class
		*/

		class Clas_Countdown{
			/**
			*	Declearing the static veriables
			*/
			private static $static_veriable;

			/**
			*	create a function to load all the required files and the constant veriable
			*/
			public static function instantiate(){
				
				if ( ! isset( self::$static_veriable ) ) {
					self::$static_veriable = new Clas_Countdown();
					self::$static_veriable->constantVers();
					self::$static_veriable->includesFiles();
				}

				return self::$static_veriable;

			}

			/**
			* creating function to declare the contant veriables
			*/

			public static function constantVers(){
				// here declare all the veriables which will be requierd in the countdown function.
				define( 'SA_COUNTDOWN_MAIN_FILE', trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'sa-countdown.php'  );
				define( 'SA_COUNTDOWN_BASE', plugin_basename( SA_COUNTDOWN_MAIN_FILE ) );
				define( 'SA_COUNTDOWN_DIR', plugin_dir_path( SA_COUNTDOWN_MAIN_FILE ) );
				define( 'SA_COUNTDOWN_PLUGIN_URL', plugins_url( '/', SA_COUNTDOWN_MAIN_FILE ) );
			}
			
			/**
			*	Creating function to load the desired files
			*/

			public static function includesFiles(){
				//require_once('sa-countdown other files to include one by one');
				require_once( SA_COUNTDOWN_DIR . 'classes/class-create-option-page.php' );
				require_once( SA_COUNTDOWN_DIR . 'classes/class-add-css-files.php' );
				require_once( SA_COUNTDOWN_DIR . 'classes/class-create-shortcode.php' );
			}
		}

		Clas_Countdown::instantiate();
	}
?>