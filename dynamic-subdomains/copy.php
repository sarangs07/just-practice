<?php
    extract($_POST);

     $file = $_SERVER["DOCUMENT_ROOT"].'/sarang/research/test-doc.txt';
     $newfile = $_SERVER["DOCUMENT_ROOT"].'/sarang/research/'.$site_name.'/test-doc.txt';
     $path = $_SERVER["DOCUMENT_ROOT"].'/sarang/research/'.$site_name;
     
     
     
     if(!file_exists($path))
     {
        echo "Site is not created";
     }
     else
     {
        // if(!copy($file,$newfile))
        //  {
        //      echo "failed to copy";
        //  }
        //  else
        //  {
        //      echo "copied";
        //      header('location: '.$site_name);
        //  }
        $src = $_SERVER["DOCUMENT_ROOT"].'/sarang/research/assets/';
        $dst = $_SERVER["DOCUMENT_ROOT"].'/sarang/research/'.$site_name.'/assets/';

        recurse_copy($src,$dst);
        echo "site created";
     }

     function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);

        while(false !== ( $file = readdir($dir)) ) 
        {
            if (( $file != '.' ) && ( $file != '..' )) 
            {
                if ( is_dir($src . '/' . $file) ) 
                {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else 
                {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

     
?>`