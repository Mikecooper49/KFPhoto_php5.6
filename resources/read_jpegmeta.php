<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

read_jpegmeta.php -  simple utility to read ALL metadata from a jpg

-->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Read jpg metadata</title>
</head>
<body>
<h2>KFPhotography Read Meta Data</h2>

<?php

echo "<a href=../admin.php> Back to Admin Page<br><br></a>";

// create variables for matadata read

$fileToUpload = $_POST['fileToUpload']; // Post from admin.php
$image_pointer = "../images/" . $fileToUpload;


$exif = exif_read_data("$image_pointer", 'IFD0');
echo $exif === false ? "Sorry no metadata found.<br>\n" : "Image contains this metadata<br><br>\n";

$exif = exif_read_data("$image_pointer", 0, true);

foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {

        echo $name . " = " . $val ?> <br><?php ;
    }

}
?>
