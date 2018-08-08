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
     			
                
                $this->get_domain();
     		}

     		


               function get_domain()
               {
                     //echo "in the function";
                     $uri = $_SERVER['REQUEST_URI'];
                    //echo $uri."<br />"; // Outputs: URI
                     
                    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                     
                    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    //echo "Website URL is : ".$url."<br />"; // Outputs: Full URL
                     
                    $query = $_SERVER['QUERY_STRING'];
                    //echo $query."<br />"; // Outputs: Query String

                    $parse = parse_url($url);
                    //echo "Your Domain Name is :".$parse['host'];

                    switch ($protocol) {
                        case 'https://':
                            echo "Your website is HTTPS enabled";
                            break;
                        case 'http://':
                            echo "Your website is not HTTPS enabled";
                            break;
                        default:
                            echo "Nothing found";
                            break;
                    }
               }

               
     	}

     	$obj = new Sa_Check_Ssl();
     }
?>