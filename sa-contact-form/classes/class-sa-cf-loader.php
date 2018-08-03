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

if( ! class_exists('Sa_Cf_Loader') ) {

    /**
    * Create Sa_Cf_Loader class
    * @category Contact_Form
    * @package  Sa_Contact_Form
    * @author   Sarang <sarangs@bsf.io>
    * @license  GPLv2 or later
    * @link     https://www.google.com/
    */

    class Sa_Cf_Loader
    {
        /**
        *    Creating constructor to initialite the veriables and the functions.
        */
        function __construct()
        {
            $this->constantVers();
            $this->includesFiles();
        }

        /**
        * Creating function to declare the contant veriables
        * @return -
        */
        function constantVers()
        {
            // Here declared all the veriables which will be requierd in the countdown function.
            define('SA_CF_MAIN_FILE', trailingslashit(dirname(dirname(__FILE__))) . 'sa-countdown.php');
            define('SA_CF_BASE', plugin_basename(SA_CF_MAIN_FILE));
            define('SA_CF_DIR', plugin_dir_path(SA_CF_MAIN_FILE));
            define('SA_CF_PLUGIN_URL', plugins_url('/', SA_CF_MAIN_FILE));
        }
            
        /**
        * Creating function to load the desired files
        * @return -
        */
        function includesFiles()
        {
            /**
                * Require_once('sa-countdown other files to include one by one');
                */
            include_once SA_CF_DIR . 'classes/class-sa-cf-option-page.php' ;
            include_once SA_CF_DIR . 'classes/class-sa-cf-add-css-files.php' ;
            include_once SA_CF_DIR . 'classes/class-sa-cf-shortcode.php' ;
        }
    }

    /**
    *    Creating object of the class
    */
    $obj = new Sa_Cf_Loader();
}
