<?php
	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */

	 if( ! class_exists('Create_Cd_Shortcode')){

	 	class Create_Cd_Shortcode{

	 		/**
			*	Creating constructor to initialite the veriables and the functions.
			*/
	 		function __construct(){
 				add_shortcode('sa_countdown', array( $this, 'CreateCdShortcode' ) );
 				add_action( 'wp_head', array( $this, 'AddCountdownScript' ) );
 			}

 			/**
 			*	Create function to place countdown script in the head tag of the website page.
 			*/
 			function AddCountdownScript(){
 				$formated_date = date( 'M d, Y g:i:s', strtotime(get_option( 'sa_countdown_date', 'Date Not found' ) ) );
 				
 				$script_data   = '<script>	// Set the date we are counting down to
									var countDownDate = new Date("'.$formated_date.'").getTime();

									// Update the count down every 1 second
									var x = setInterval(function() {

								    // Get todays date and time
								    var now = new Date().getTime();
								    
								    // Find the distance between now an the count down date
								    var distance = countDownDate - now;
								    
								    // Time calculations for days, hours, minutes and seconds
								    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
								    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
								    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
								    
								    // Output the result in an element with id="demo"
								    document.getElementById("show_sa_countdown").innerHTML = "<span>" + days + "</span><h4>Days &nbsp;&nbsp;</h4>" + "<span>" + hours + "</span> <h4>Hours &nbsp;&nbsp;</h4>"
								    + "<span>" + minutes + "</span> <h4>Minutes &nbsp;&nbsp;</h4>" + "<span>" + seconds + "</span> <h4>Seconds &nbsp;&nbsp;</h4>";
								    
								    // If the count down is over, write some text 
								    if (distance < 0) {
								        clearInterval(x);
								        document.getElementById("show_sa_countdown").innerHTML = "EXPIRED";
								    }
								}, 1000);</script>';

								echo $script_data;
 			}

 			/**
 			*	Creating function to create shortcode
 			*/
 			public function CreateCdShortcode(){
 				ob_start(); 
			    $data  = '<div class="countdown_box">'; 
			    $data .= '<h3>';
			    $data .= get_option( 'myplugin_option_name', 'Title Not found' );
			    $data .= '</h3>';
			    $data .= '<div id="show_sa_countdown"></div>'; 
			    $data .= '</div>';
		    	return $data;
 			}
	 	}

	 	/**
		*	creating object of the class
		*/
	 	$obj = new Create_Cd_Shortcode();
	 }
?>
