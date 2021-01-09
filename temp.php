<?php
/*
// Define the folder to clean
// (keep trailing slashes)
$captchaFolder  = 'temp/';
 
// Filetypes to check (you can also use *.*)
$fileTypes      = '*.png';
 
// Here you can define after how many
// minutes the files should get deleted
$expire_time    = 20; 
 
// Find all files of the given file type
foreach (glob($captchaFolder . $fileTypes) as $Filename) {
 
    // Read file creation time
    $FileCreationTime = filectime($Filename);
 
    // Calculate file age in seconds
    $FileAge = time() - $FileCreationTime; 
 
    // Is the file older than the given time span?
    if ($FileAge > ($expire_time * 60)){
 
        // Now do something with the olders files...
 
        print "The file $Filename is older than $expire_time minutes\n";
 
        // For example deleting files:
        unlink($Filename);
    }
 
}
*/




echo scanDirectoryImages("temp");

/**
 * Recursively search through directory for images and display them
 * 
 * @param  array  $exts
 * @param  string $directory
 * @return string
 */
function scanDirectoryImages($directory, array $exts = array('jpeg', 'jpg', 'gif', 'png'))
{
    if (substr($directory, -1) == '/') {
        $directory = substr($directory, 0, -1);
    }
    $html = '';
    if (
        is_readable($directory)
        && (file_exists($directory) || is_dir($directory))
    ) {
        $directoryList = opendir($directory);
        while($file = readdir($directoryList)) {
            if ($file != '.' && $file != '..') {
                $path = $directory . '/' . $file;
                if (is_readable($path)) {
                    if (is_dir($path)) {
                        return scanDirectoryImages($path, $exts);
                    }
                    if (
                        is_file($path)
                        && in_array(end(explode('.', end(explode('/', $path)))), $exts)
                    ) {
                        $html .= '<a href="' . $path . '"><img src="' . $path
                            . '" style="max-height:100px;max-width:100px" /></a>';
                    }
                }
            }
        }
        closedir($directoryList);
    }
    return $html;
}
?>