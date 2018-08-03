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

if( ! class_exists('Add_Cf_Css_Files')) {
    /**
    *  Creating class to add css & scripts
    * @category Contact_Form
    * @package  Sa_Contact_Form
    * @author   Sarang <sarangs@bsf.io>
    * @license  GPLv2 or later
    * @link     https://www.google.com/
    */
    class Add_Cf_Css_Files
    {
            /**
            *    Creating constructor to initialite the veriables and the functions.
            */
        function __construct()
        {
            /**
                *  Loading css
                */
            add_action('wp_enqueue_scripts', array( $this, 'cfenqueFrontendstyle' ));
            /**
                 *  Load css to admin side
                 */
            add_action('admin_enqueue_scripts',	array( $this, 'cfenqueAdminstyle' ));
        }

        /**
         *  Creating function to add the CSS file link
         *    @return -
         */
        public function cfenqueFrontendstyle()
        {
                 
            wp_register_style('sa-cf-stylesheet', plugins_url().'/sa-contact-form/assets/css/sa-cf-stylesheet-style.css');
            wp_enqueue_style('sa-cf-stylesheet');

        }

        /**
        * Creating function to add the CSS file link in admin panel
        * @return -
        */
        public function cfenqueAdminstyle()
        {
                 
            wp_register_style('admin-bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
            wp_enqueue_style('admin-bootstrap-css');
        }
             
    }

    /**
        *    Creating object of the class
        */
    $obj = new Add_Cf_Css_Files();
}
