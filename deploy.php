<?php
require("versioning/xml_parser.php");
require("versioning/VersionHandler.php");

$DebugInstaller = 0; // 0 : official release branch | >= 1 : test / debug distro | (always on 0 unless you know what you doing )

/*Defines global variables*/
if( $DebugInstaller >= 1 ) {
    define('PUBLIC_SOURCE_CODE_URL_TARGET', 'https://pablolabeque.com/public_source_code/source_build_70.zip'); // temporary source code repository
}else{
    define('PUBLIC_SOURCE_CODE_URL_TARGET', 'https://xorgentlem4n.github.io/public-source-repo/source_build_70.zip'); // temporary source code repository
}
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);

define('SPIRIT_INSTALLER_REV_BUILD', fixed_chunk($display_spirit_installer->index['rev']));
define('WEB_REV_BUILD', fixed_chunk($display_website_rev->index['rev']));

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

function create_file( $string )
{
    // do some normalizing
    return touch( $string );
}

?>
