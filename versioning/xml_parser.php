<?php
    /*
    * purpose: get the lastest revision build number from SVN
    */
    ini_set('display_errors', 0);


    function get_last_revision_number($path){
        $ch = curl_init(); // init curl
        /* lets add option to our curl request */
        curl_setopt($ch, CURLOPT_URL,$path);
        curl_setopt($ch, CURLOPT_FAILONERROR,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        // execute the request
        $retValue = curl_exec($ch);
        // close connection
        curl_close($ch);
        return $retValue;
    }

    /*Parse XML request*/
    $spirit_installer = get_last_revision_number('https://svn.riouxsvn.com/spiritinstaller/');
    $display_spirit_installer = new SimpleXMLElement($spirit_installer);

    $website_rev = get_last_revision_number('https://svn.riouxsvn.com/spirit_revision/');
    $display_website_rev = new SimpleXMLElement($website_rev);
?>
