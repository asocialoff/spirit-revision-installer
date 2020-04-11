<?php
//error_reporting(E_ERROR | E_PARSE);
//require("installer.php");

/*
* INFO: This all system needs a public target directory such as http://examplesite.com/mypublic-source
* which contains all the source code that can be fetched & zipped to any server
*/

require("deploy.php");
//echo 'debug: ' . $_POST['test'];

$remote_file_url  = PUBLIC_SOURCE_CODE_URL_TARGET;
$rev_src = WEB_REV_BUILD;

/* extract */
$src = new ZipArchive(); // create a new instance of your source directory
$zip = new ZipArchive();// create an instance of ZipArchive

// credits: phpmyadmin's modified ZIP::ARCHIVE Library
function Zip($source, $destination, $include_dir = false)
{

    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    if (file_exists($destination)) {
        unlink ($destination);
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE)) {
        return false;
    }
    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {

        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        if ($include_dir) {

            $arr = explode("/",$source);
            $maindir = $arr[count($arr)- 1];

            $source = "";
            for ($i=0; $i < count($arr) - 1; $i++) {
                $source .= '/' . $arr[$i];
            }

            $source = substr($source, 1);

            $zip->addEmptyDir($maindir);

        }

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', $file);

            // Ignore "." and ".." folders
            if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                continue;

            $file = realpath($file);

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

if(is_deployed())
{
    // TARGET SOURCE CODE LOCATION
    //$src->open(ROOT_PATH . "/full-fetchable-source/spirit-revision-rev-70.zip");
    // EXTRACTED SOURCE CODE LOCATION
    //$src->extractTo(ROOT_PATH);
    echo "Fetching source code from server...";

    mkdir(ROOT_PATH . "/spirit-revision");

    $url = $remote_file_url; // url of source code respository
    $zip_file = ROOT_PATH . "/" . "full-fetchable-source/source_build_70.zip"; // target
    $target_directory = ROOT_PATH . "/spirit-revision"; // target final directory
	$open_zip = fopen($zip_file, "w");

	// use curl to download files from server 1 to server 2
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FAILONERROR, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_FILE, $open_zip);
    // execute curl request
	$page = curl_exec($ch);

	curl_close($ch);

	/* Open the Zip file */
	$extractPath = $target_directory;

	if($zip->open($zip_file) != "true"){
		echo "Stream error 0x1";
	}

	/* Extract Zip File */
	$zip->extractTo($extractPath);

    $zip->open($zip_file);

    ?>

    <textarea disabled='' title='' rows='10' placeholder='Starting deployed routine
    Init chosen repo: <?php echo $DebugInstaller . PHP_EOL; ?>
    (Downloading from <?php echo $remote_file_url . PHP_EOL; ?> ....)
    Uploading spirit-revision v<?php echo $rev_src . PHP_EOL; ?>
    Importing sql dump....
    DebugFinalPath: <?php echo $target_directory . PHP_EOL; ?>
    ----------------------
    -------FILE DUMP------
    ----------------------
    <?php for($i = 0; $i < $zip->numFiles; $i++)
    {
        echo $zip->getNameIndex($i) . PHP_EOL;
    } ?>
    ' cols='80' style='width:100%; margin: 0;'></textarea>

    <?php


//    file_put_contents("LOG_ERROR.txt",$a);
//    $target_name = "./spirit-revision_archive.zip"; // set a target name
//    $zip->addFromString("README.txt" . '' , "Compressed spirit-revision successfully.\n");
    /* fetch source code from server 1 in order to populate it  */
    //$zip->addFile(ROOT_PATH . "/public_source_code",'hello-world.txt');

}else{
    // TODO: Fix localhost installer
    $src->open("core/spirit-revision-rev-70.zip"); // zip file to extract
    $src->extractTo('src'); // extract directory
    echo "Fetching source code from local server...";

    // details to create a zip
    $target_name = "./spirit-revision_archive.zip"; // set a target name
    $zip->addFromString("README.txt" . '' , "Compressed spirit-revision successfully.\n");
    $zip->addFile('core/hello-world.txt','hello-world.txt');

    echo "<textarea disabled='' title='' rows='10' placeholder='Init chosen repo: $DebugInstaller
    (Downloading from $remote_file_url ....)
    Uploading Spirit-revision $rev_src......
    Importing sql dump to target database....
    /!\ WARNING /!\ Localhost version detected            
    ' cols='80' style='width:100%; margin: 0;'></textarea>";
}

//$zip->open($target_name, ZipArchive::CREATE); // create a zip archive

// add files to the archive

// close to avoid leak
$dbg = "status: " . $zip->getStatusString() . "\n" . 'fetch_source_code_debug_url: [' . $public_source_code_url . "]\n";
file_put_contents("LOG.txt",$dbg);
$src->close();
$zip->close();
?>
