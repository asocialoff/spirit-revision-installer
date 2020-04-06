<?php
require("versioning/xml_parser.php");

/*Defines global variables*/
define('PUBLIC_SOURCE_CODE_URL_TARGET', 'http://pablolabeque.com/public_source_code/source_build_70.zip'); // temporary source code repository
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

define('SPIRIT_INSTALLER_REV_BUILD', $display_spirit_installer->index['rev']);
define('WEB_REV_BUILD', $display_website_rev->index['rev']);

function is_deployed() : bool
{
    if($_SERVER['SERVER_NAME'] == 'localhost')
    {
        return false;
    }else if($_SERVER['SERVER_NAME'] != 'localhost')
    {
        return true;
    }
}
?>
