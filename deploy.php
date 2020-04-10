<?php
require("versioning/xml_parser.php");

$DebugInstaller = 1; // 0 : test / debug distro | >= 1 : official release branch

/*Defines global variables*/
if( $DebugInstaller >= 1 ) {
    define('PUBLIC_SOURCE_CODE_URL_TARGET', 'https://pablolabeque.com/public_source_code/source_build_70.zip'); // temporary source code repository
}else{
    define('PUBLIC_SOURCE_CODE_URL_TARGET', 'https://xorgentlem4n.github.io/public-source-repo/source_build_70.zip'); // temporary source code repository
}
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
