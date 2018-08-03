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

if( ! class_exists('Sa_Cf_Shortcode') ) {
    /**
  * Create Sa_Cf_Shortcode class
  * @category Contact_Form
  * @package  Sa_Contact_Form
  * @author   Sarang <sarangs@bsf.io>
  * @license  GPLv2 or later
  * @link     https://www.google.com/
  */
    class Sa_Cf_Shortcode
    {
        /**
        * Creating constructor to initialite the veriables and the functions.
        */
        function __construct()
        {
            add_shortcode('sa_cf', array( $this, 'createCfShortcode' ));
            /**
            * Add_action( 'wp_head', array( $this, 'addCfScript' ) );
            */
            add_action('wp_enqueue_scripts', array( $this, 'addCfScript' ));
        }

        /**
        * Create function to place cf script in the head tag of the website page.
        * @return -
        */
        function addCfScript()
        {
            wp_enqueue_script('jquery');
            wp_register_script('sa-cf-script', plugins_url().'/sa-contact-form/assets/js/sa-cf-stylesheet-script.js');
            wp_enqueue_script('sa-cf-script');
        }

        /**
        * Creating function to create shortcode
        * @return -
        */
        public function createCfShortcode()
        {
            ob_start(); 
            $data  = '<div class="cf_box">'; 
            $data .= 	'<form action="#" class="form" name="sa-cf-form" id="sa-cf-form">';
            $data .= 	'<div id="show_resp"></div>';
            $data .= 		'<div class="col-md-5">';
            $data .= 			'<div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Your Name" name="sa_cf_name" id="sa_cf_name" required>
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Your Email ID" name="sa_cf_email" id="sa_cf_email" required>
                              </div>
                              <div class="form-group">
                                <input type="submit" class="btn btn-primary sa-cf-btn" id="sa-cf-btn" value="Send"> <span id="loading_img">Sending..</span>
                              </div>';
            $data .= 		'</div>';
            $data .=	'</form>';
            $data .= '</div>';
            return $data;
        }
    }

    /**
    * Creating object of the class
    */
    $obj = new Sa_Cf_Shortcode();
}
