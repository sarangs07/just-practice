<?php
	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */

	 if( ! class_exists(create_cd_shortcode)){

	 	class create_cd_shortcode{

	 		private static $static_veriable;

 			public static function instantiate(){
 				//echo "in instantiate function <br />";
 				if ( ! isset( self::$static_veriable ) ) {
					self::$static_veriable = new create_cd_shortcode();
					self::$static_veriable->hook_create_cd_shortcode();
				}

				return self::$static_veriable;

 			}

 			public function hook_create_cd_shortcode(){
 				//echo "in hook_create_cd_shortcode function <br />";
 				add_shortcode('sa_countdown', array( $this, 'createcdShortcode' ) );
 			}

 			public function createcdShortcode(){
 				//echo "in createcdShortcode function <br />";
 				ob_start(); 
 				

			    $data = '<div class="countdown_box">'; 
			    $data .= '<h3>';
			    $data .= get_option( 'myplugin_option_name', 'Title Not found' );
			    $data .= '</h3>';
			    $data .= '<div id="show_sa_countdown"></div>'; 
			    $data .= '</div>';
		    	return $data;
				    
				
 			}
	 	}


	 	create_cd_shortcode::instantiate();
	 }


?>
