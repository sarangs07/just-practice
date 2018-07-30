<?php
	/**
	 * SA Countdown
	 *
	 * @package sa-countdown
	 * @since 1.0.0
	 */

	 if( ! class_exists(create_Option_Page) ) {

	 	class create_Option_Page{

	 		private static $static_veriable;

 			public static function instantiate(){

 				if ( ! isset( self::$static_veriable ) ) {
					self::$static_veriable = new create_Option_Page();
					self::$static_veriable->allhooks();
				}

				return self::$static_veriable;

 			}

 			/**
 			*	Creating function for all the hooks which are going to use in the further plugin
 			*/

 			public function allhooks(){
 				add_action( 'admin_init', array( $this, 'plugin_setting' ) );
 				add_action( 'admin_menu', array( $this, 'my_plugin_menu' ) );
 			}

 			public function plugin_setting(){
 				add_option( 'myplugin_option_name', 'Enter plugin title here');
   				register_setting( 'myplugin_options_group', 'myplugin_option_name', 'myplugin_callback' );
 			}

 			public function my_plugin_menu() {
				add_options_page( 'SA-Countdown Options Page', 'SA Countdown', 'manage_options', 'sa-countdown', array( $this,'sa_countdown_plugin_options' ) );

			}

			
 			

			public function sa_countdown_plugin_options() {
				if ( ! current_user_can( 'manage_options' ) )  {
					wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
				}
				echo '<div class="wrap">';

				?>
					

				<?php
					
				echo '<form method="post" action="options.php">';
						settings_fields( "myplugin_options_group" );
				echo '<div class="row">
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
									<form action="#" method="post" name="countdown_form" id="sacd-1">

										<div class="form-group">
											<label>Enter title</label>
											<input type="text" placeholder="Enter Title" name="cd_title" id="cd_title" class="form-control" required="required" value="'.get_option("myplugin_option_name").'">
										</div>

										<div class="form-group">
											<label>Select Date</label>
											<input type="date" placeholder="Select the date" name="cd_date" id="cd_date" class="form-control" required="required">
										</div>

										<div class="col-md-12">';
											submit_button();
									echo '</div>

									</form>
						    	</div>
						    </div>
						    <div id="menu1" class="tab-pane fade">
						      <h3>Shortcode</h3>
						      <div class="col-md-12">
						      	<p>Plugin Shortcode is : </p>
						      </div>
						    </div>
						</div>

					</div>
				</div>
					  </div>';
				echo '</div>';
			}

 			 

 			 
	 	}

	 	create_Option_Page::instantiate();

	 }
?>