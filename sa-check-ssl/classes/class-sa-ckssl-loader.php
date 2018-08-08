<?php
/**
     * SA Contact Form
     * @category Sa_Check_Ssl
     * @package  Sa_Check_Ssl
     * @author   Sarang <sarangs@bsf.io>
     * @license  GPLv2 or later
     * @link     https://www.google.com/
     * @since    1.0.0
     */

     if( ! class_exists('Sa_Check_Ssl')){

     	/**
	    * Create Sa_Cf_Loader class
	    * @category Sa_Check_Ssl
	    * @package  Sa_Check_Ssl
	    * @author   Sarang <sarangs@bsf.io>
	    * @license  GPLv2 or later
	    * @link     https://www.google.com/
	    */
     	class Sa_Check_Ssl
     	{
     		
     		function __construct()
     		{
     			$this->checkSsl();
     		}

     		function checkSsl(){
     			$web_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     			
     			echo "<script>alert('".$web_link."');</script>";
     		}
     	}

     	$obj = new Sa_Check_Ssl();
     }
?>