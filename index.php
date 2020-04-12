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
    && isset($_GET['db_password']) && isset($_GET['smtp_login']) && isset($_GET['smtp_password']) )
{
    // TODO: mkdir & file_put_contents with GET informations as a define parser..
    if(!file_exists($config_folder))
    {
        if( !preg_match("/[ \t]+/", $_GET["db_host"])
            && !preg_match("/[ \t]+/", $_GET["db_name"])
            && !preg_match("/[ \t]+/", $_GET["db_username"])
            && !preg_match("/[ \t]+/", $_GET["db_password"])
            && !preg_match("/[ \t]+/", $_GET["smtp_login"] )
            && !preg_match("/[ \t]+/", $_GET["smtp_password"]))
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
                . "\n\n" . '$smtp_login="' . $_GET["smtp_login"] . '";' . "\n" . '$smtp_password="' . $_GET["smtp_password"] . '";'
                . "\n" . "\n //DO NOT MODIFY" . "\n" . '$public_source_code_url="' . $output . '";'
                . "\n" . '$spirit_installer_rev_build="' . $spirit_installer_build . '";' . "\n" . '$web_revision_build="' . $web_rev_build . '";' . "\n?>";

            $CorePath = file_get_contents('core/database.sql'); // read the dump content
            $Connect = new mysqli( $_GET["db_host"] , $_GET["db_username"] , $_GET["db_password"]  , $_GET["db_name"] ); // fill the database info
            mysqli_multi_query( $Connect , $CorePath ); // import our dump to your target database

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
    <div class="body-scene">
        <div class="page-header-top">
            <h2> Settings | Step 1/3 </h2>
        </div>

        <div class="action-box">
            <fieldset>
                <legend>Database credentials</legend>
                <center><input required="" class="label_info" type="text" name="db_host" placeholder="Database Host"/></center>
                <center><input required="" class="label_info" type="text" name="db_name" placeholder="Database Name"/></center>
                <center><input required="" class="label_info" type="text" name="db_username" placeholder="Database Username"/></center>
                <center><input required="" class="label_info" type="password" name="db_password" placeholder="Database Password"/></center>
            </fieldset>
        </div>
        <div class="action-box">
            <fieldset>
                <legend>SMTP configuration</legend>
                <center><input required="" class="label_info" type="email" name="smtp_login" placeholder="Email address"/></center>
                <center><input required="" class="label_info" type="password"  name="smtp_password" placeholder="Email password"/></center>
            </fieldset>
        </div>
        <center><input class="label_info" type="submit" value="Build database configuration file"></input></center>
</form>
<script src="js/install.js"></script>
<div class="footer-scene">
    <?php
    if(!is_deployed())
    {
        echo "<p> Spirit Revision (c) 2020 - Configuration</p>";
    }else{
        echo "<p> Spirit Revision Installer version " . SPIRIT_INSTALLER_REV_BUILD . " (c) 2020</p>";
    }
    ?>
</div>
</div>
</body>
</html>
