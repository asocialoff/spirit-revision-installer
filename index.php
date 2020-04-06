<?php
require("deploy.php");
require("Xor/xor.php"); // include our cypher class

    if(is_deployed())
    {
        $config_folder = ROOT_PATH . '/spirit-config';
        $fetch_target = ROOT_PATH . '/full-fetchable-source';
    }else{
        $config_folder = 'config';
    }

    if(isset($_GET['db_host'])&&isset($_GET['db_name'])&&isset($_GET['db_username'])
    &&isset($_GET['db_password']))
    { 
        // TODO: mkdir & file_put_contents with GET informations as a define parser..
        if(!file_exists($config_folder))
        {
            if( !preg_match("/[ \t]+/", $_GET["db_host"])
            && !preg_match("/[ \t]+/", $_GET["db_name"])
            && !preg_match("/[ \t]+/", $_GET["db_username"])
            && !preg_match("/[ \t]+/", $_GET["db_password"]))
            {
                $output = PUBLIC_SOURCE_CODE_URL_TARGET; // Source code url
                $spirit_installer_build = SPIRIT_INSTALLER_REV_BUILD;
                $web_rev_build = WEB_REV_BUILD;

                mkdir($fetch_target);
                mkdir($config_folder);
                $file = fopen( $config_folder . '/config.php','w'); // target file to write to

                // writting to target file
                $parse = "<?php \n/*\n* Auto-generated configuration file \n*/\n\n" . '$cfg_host="' . $_GET["db_host"] . '";' . "\n" . '$cfg_name="'  .  $_GET["db_name"] . '";'
                . "\n" . '$cfg_username="' . $_GET["db_username"] . '";' . "\n" . '$cfg_password="' . $_GET["db_password"] . '";'
                . "\n" . "\n //DO NOT MODIFY" . "\n" . '$public_source_code_url="' . $output . '";'
                . "\n" . '$spirit_installer_rev_build="' . $spirit_installer_build . '";' . "\n" . '$web_revision_build="' . $web_rev_build . '";' . "\n?>";

                if(fwrite($file, $parse) !== TRUE){
                    echo "File written!";
                    header('Location: installer.php');
                }else{
                    echo '<p id="error">Error</p>';
                }

            }else{
                echo '<p id="error">Error, cannot write to config file</p>';
            }
        }else{
            header('Location: installer.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Pre-Installation</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        if(!is_deployed())
        {
            echo "<div class='non_deployed'>  Non Deployed Version!! </div>";
        }
        ?>
        <br>
        <form method="get" name="" onsubmit="build()" >
        <div class="border_download_settings">
            <center><h2 class="header_step" id="step_header">Settings | Step 1/3</h2></center>
            <center><input required="" class="label_info" type="text" name="db_host" placeholder="Database Host"/></center>
            <center><input required="" class="label_info" type="text" name="db_name" placeholder="Database Name"/></center>
            <center><input required="" class="label_info" type="text" name="db_username" placeholder="Database Username"/></center>
            <center><input required="" class="label_info" type="password" name="db_password" placeholder="Database Password"/></center>
            <br>
            <center><input class="label_info" type="submit" value="Build database configuration file"></input></center>
        </form>
        <script src="js/install.js"></script>
        </div>
    </body>
</html>
