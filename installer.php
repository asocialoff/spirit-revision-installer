<?php
session_start();

require("deploy.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Installer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if(!is_deployed())
{
    echo "<div class='non_deployed'>  Non Deployed Version!! </div>";
}
?>
<div class="body-scene">
    <div class="page-header-top">
        <h2> Settings | Step 2/3 </h2>
    </div>

    <div class="action-box">
        <fieldset>
            <legend>Installation</legend>
            <?php if(!file_exists(ROOT_PATH . '/spirit-revision')) {  // if source folder is here then stop installation?>
                <center><p class="step_details_header" id="step_details_header">Press installation button and follow the next steps</p></center>
                <center class="center_download"><button id="loading" onclick="download();">Install Spirit Revision</button></center>
                <center><p id="zipping_label" class="notification_download"> </p></center>
                <div id="installer_bar">
                    <div id="bar"></div>
                </div>
            <?php } else {  ?>
                <center><p style="background-color: #7f39a5;">Spirit-revision has been successfully installed</p></center>
                <center><a href="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/spirit-revision'; ?>"><button>Ready</button></a></center>
            <?php } ?>
            <center><p class="revision_version_section">Spirit revision build: <?php echo WEB_REV_BUILD; ?> | Installer build: <?php echo SPIRIT_INSTALLER_REV_BUILD; ?> </p></center>
        </fieldset>
    </div>
    <div class="footer-scene">
        <?php
        if(!is_deployed())
        {
            echo "<p> Spirit Revision (c) 2020 - Login</p>";
        }else{
            echo "<p> Spirit Revision Installer version " . SPIRIT_INSTALLER_REV_BUILD . " (c) 2020</p>";
        }
        ?>
    </div>
</div>
<script src="js/install.js"></script>
</body>
</html>
