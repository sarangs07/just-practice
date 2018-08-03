<?php
    /**
     * SA Contact Form
     * @category Contact_Form
     * @package  Sa_Contact_Form
     * @author   Sarang <sarangs@bsf.io>
     * @license  GPLv2 or later
     * @link     https://www.google.com/
     * @since    1.0.0
     */
if( ! class_exists('Sa_Cf_Option_Page') ) {
    /**
    * Create Sa_Cf_Option_Page class
    * @category Contact_Form
    * @package  Sa_Contact_Form
    * @author   Sarang <sarangs@bsf.io>
    * @license  GPLv2 or later
    * @link     https://www.google.com/
    */
    class Sa_Cf_Option_Page
    {
        /**
        *    Creating constructor to initialite the veriables and the functions.
        */
        function __construct()
        {
            $this->allhooks();
        }

        /**
        * Function to call all the hooks
        * @return -
        */
        public function allhooks()
        {
            add_action('admin_init', array( $this, 'sacfPluginsetting' ));
            add_action('admin_menu', array( $this, 'sacfPluginmenu' ));
        }


        /**
        * Function to add the plugin setting
        * @return -
        */
        public function sacfPluginsetting()
        {
            /**
             * Adding option one
             */
            add_option('sa_cf_name', 'Enter Name');
            /**
             * Adding option two
             */
            add_option('sa_fc_email', 'Enter Email');
            /**
             * Register option one
             */
            register_setting('sa_cf_options_group', 'sa_cf_name');
            /**
               * Registr option two
               */
            register_setting('sa_cf_options_group', 'sa_fc_email');
        }

        /**
        * Function to add the options to the page
        * @return -
        */
        public function sacfPluginmenu() 
        {
            add_options_page('SA - Contact Form Settings', 'SA Contact Form', 'manage_options', 'sa-cf', array( $this,'sacfPluginoptions' ));
        }

        /**
        * Function to load the plugin UI
        * @return -
        */
        public function sacfPluginoptions() 
        {
            if ( ! current_user_can('manage_options') ) {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }
            echo '<div class="wrap">';

            /**
             *    Here the html UI for the plugin's option page is defined
             */
            echo   '<style>.plugin_body{border:1px #ccc solid;padding:15px;} .plugin_body ul{list-style-type: decimal;list-style-position: inside;}</style>';
            echo   '<form method="post" action="options.php">';
            echo   		'<div class="plugin_body">';
            settings_fields("sa_cf_options_group");
            echo        	'<div class="row">
                                <div class="col-md-12">
                                    <div class="plugin_header">
                                        <h3 class="text-left">Contact Form Plugin Settings</h3>
                                        <br />
                                        <p>Add this shortcode to place contact form on the page <strong>[sa-cf]</strong></p>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#home">General</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                        <!--<div div class="col-md-4">
                                                <h3>General Information</h3>
                                                
                                                <div class="form-group">
                                                    <label>Enter title</label>
                                                    <input type="text" placeholder="Enter Title" name="sa_cf_name" id="sa_cf_name" class="form-control" required="required" value="'.get_option("sa_cf_name").'">
                                                </div>

                                                <div class="form-group">
                                                    <label>Select Date</label>
                                                    <input type="email" placeholder="Select the date" name="sa_fc_email" id="sa_fc_email" class="form-control" required="required" value="'.get_option("sa_cf_email").'">
                                                </div>

                                                <div class="col-md-12">';
                                                    submit_button();
            echo 							'</div>
                                            </div>-->
                                            <div div class="col-md-6">
                                                <h3>How to add SA - Contact Form to your website.</h3>
                                                <p>Follow below steps to add the plugin</p>
                                                <ul>
                                                <!--<li>Give/Enter the title for your plugin</li>
                                                    <li>Select/Enter the target date</li>
                                                    <li>Save the changes</li>-->
                                                    <li>Copy - Paste this shortcode <strong>[sa_cf]</strong> and place where you want to display the countdown</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>';
            echo '</div>';
        }
    }

    /**
    * Creating object of the class
    */
    $obj = new Sa_Cf_Option_Page();
}
