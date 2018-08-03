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

    /**
    *    Configuration file is required to run the some functions 
    */
    require_once'../../../../wp-config.php';

if( ! class_exists('Add_Data_To_Db')) {
    /**
    *  Creating class to add data to database
    * @category Contact_Form
    * @package  Sa_Contact_Form
    * @author   Sarang <sarangs@bsf.io>
    * @license  GPLv2 or later
    * @link     https://www.google.com/
    */
    class Add_Data_To_Db
    {
        /**
        *  Creating construction to call the member functions
        */
        function __construct()
        {
            $this->sendToDb();
        }

        /**
        *  Creating function to send the data to database
        * @return -
        */
        function sendToDb()
        {
            //Getting the valus from the form
            $cf_name = $_POST['sa_cf_name'];
            $cf_email = $_POST['sa_cf_email'];
                
            //Conditions to check the option 'sa_cf_name' value is present or not
            if ( get_option('sa_cf_name') !== false ) {
                //Already exist so update it
                update_option('sa_cf_name', $cf_name);
            }
            else
            {
                //Not present so add it
                add_option('sa_cf_name', $cf_name);
            }

            //Conditions to check the option 'sa_cf_email' value is present or not
            if ( get_option('sa_cf_email') !== false ) {
                //Already exist so update it
                update_option('sa_cf_email', $cf_email);
            }
            else
            {
                //Not present so add it
                update_option('sa_cf_email', $cf_email);
            }

            echo "Thank you for the enquiry <br />";
        }
    }

    // Creating an objectof the class and calling the constructor
    $obj = new Add_Data_To_Db();
}  
?>