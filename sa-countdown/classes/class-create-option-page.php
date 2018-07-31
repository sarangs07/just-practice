<?php
	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */

	 if( ! class_exists('Create_Option_Page') ) {

	 	class Create_Option_Page{

	 		
	 		/**
			*	Creating constructor to initialite the veriables and the functions.
			*/
 			function __construct(){
				$this->allhooks();
			}

 			/**
 			*	Function to call all the hooks
 			*/
 			public function allhooks(){
 				add_action( 'admin_init', array( $this, 'plugin_setting' ) );
 				add_action( 'admin_menu', array( $this, 'my_plugin_menu' ) );
 			}


 			/**
 			*	Function to add the plugin setting
 			*/
 			public function plugin_setting(){
 				//adding option one
 				add_option( 'sa_countdown_option_name', 'Enter plugin title here');
 				//adding option two
 				add_option( 'sa_countdown_date', 'Select Date');
 				//register option one
   				register_setting( 'sa_countdown_options_group', 'sa_countdown_option_name' );
   				//registr option two
   				register_setting( 'sa_countdown_options_group', 'sa_countdown_date' );
 			}

 			/**
 			*	Function to add the options to the page
 			*/
 			public function my_plugin_menu() {
				add_options_page( 'SA-Countdown Options Page', 'SA Countdown', 'manage_options', 'sa-countdown', array( $this,'sa_countdown_plugin_options' ) );
			}

			/**
			*	function to load the plugin UI
			*/
			public function sa_countdown_plugin_options() {
				if ( ! current_user_can( 'manage_options' ) )  {
					wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
				}
				echo '<div class="wrap">';

			/**
 			*	Here the html UI for the plugin's option page is defined
 			*/
					
			echo'   <form method="post" action="options.php">';
						settings_fields( "sa_countdown_options_group" );
			echo        '<div class="row">
							<div class="col-md-12">
								<h3 class="text-left">Countdown Plugin Option Page</h3>
								<br />
								<p>Add this shortcode to place countdown on the pages <strong>[sa-countdown]</strong></p>
								<br />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
								    <li class="active"><a data-toggle="tab" href="#home">General</a></li>
								</ul>

								<div class="tab-content">
							    	<div id="home" class="tab-pane fade in active">
							    		<div div class="col-md-4">
											<h3>General Information</h3>
											
											<div class="form-group">
												<label>Enter title</label>
												<input type="text" placeholder="Enter Title" name="sa_countdown_option_name" id="sa_countdown_option_name" class="form-control" required="required" value="'.get_option("sa_countdown_option_name").'">
											</div>

											<div class="form-group">
												<label>Select Date</label>
												<input type="datetime-local" placeholder="Select the date" name="sa_countdown_date" id="sa_countdown_date" class="form-control" required="required" value="'.get_option("sa_countdown_date").'">
											</div>

											<div class="col-md-12">';
												submit_button();
			echo 						'</div>
							    	</div>
							    </div>
							</div>
						</div>
					</form>';
			echo '</div>';
			}
		}

	 	/**
		*	creating object of the class
		*/
	 	$obj = new Create_Option_Page();
	}
?>