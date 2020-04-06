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
        <div class="border_download">
            <center><h2 class="header_step" id="step_header">Installation | Step 2/3</h2></center>
        <?php if(!file_exists(ROOT_PATH . '/spirit-revision')) {  // if source folder is here then stop installation?>
            <center><p class="step_details_header" id="step_details_header">Press installation button and follow the next steps</p></center>
            <center class="center_download"><button onclick="download();">Install Spirit Revision</button></center>
            <center><p id="zipping_label" class="notification_download"> </p></center>
            <center><p id="test_label" class="notification_download"> </p></center>
        <?php } else {  ?>
            <center><p>Error, spirit revision is already installed or is currently in installation!</p></center>
                <center><a href="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . '/spirit-revision'; ?>">Ready</a></center>
        <?php } ?>
        <center><p class="revision_version_section">Source code build: <?php echo WEB_REV_BUILD; ?> | Installer revision build: <?php echo SPIRIT_INSTALLER_REV_BUILD; ?> </p></center>
        </div>
        <script src="js/install.js"></script>
    </body>
</html>
