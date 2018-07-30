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
 				$today_date = date("d-m-Y");
 				$till_date  = "13-08-2018";

 				if(strtotime($till_date) != strtotime($today_date))
 				{
 					$Draw_time = str_replace('/', '-', "13/08/2018 12am");

					$now = new DateTime();

					$futureDate = new DateTime($Draw_time);
					
						$interval = $futureDate->diff($now);
						$countdown = $interval->format("<span>%a</span> <h4>days</h4> <span>%h</span> <h4>hours</h4> <span>%i</span> <h4>minutes</h4> <span>%s</span> <h4>secs</h4>");

					    $data = '<div class="countdown_box">'; 
					    $data .= $countdown; 
					    $data .= '</div>';
				    	return $data;
				    
				}
				else{

				}
 			}
	 	}


	 	create_cd_shortcode::instantiate();
	 }


?>
