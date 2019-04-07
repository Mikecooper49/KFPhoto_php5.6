<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

load_image.php -  Takes POST data from admin.php, reads some metadata from jpg and
loads data to kfphoto database

-->

<?php
include("config.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Load Image</title>
</head>
<body>
<h1>KFPhotography Image Load</h1>

<?php

// check that all entries are filled out

if (!isset($_POST['fileToUpload']) || !isset($_POST['image_name'])
    || !isset($_POST['theme_id'])) {
    echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
    exit;
}


// create variables to use in SQL INSERT

$fileToUpload = $_POST['fileToUpload'];
$image_name = $_POST['image_name'];
$theme_id = intval($_POST['theme_id']);
$image_pointer = "../images/" . $fileToUpload;
$width = 0;
$height = 0;
$phpdate = strtotime($date_taken);
$date_taken = date('Y-m-d H:i:s', $phpdate);


//read metadata from jpg


$exif = exif_read_data("$image_pointer", 'IFD0');
echo $exif === false ? "No header data found.<br>\n" : "Image contains headers<br>\n";


$exif = exif_read_data("$image_pointer", 0, true);


foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {

        if ($name == "Height") {
            $height = intval($val);
        }
        if ($name == "Width") {
            $width = intval($val);
        }
        if ($name == "DateTimeOriginal") {
            $date_taken = $val;
        }

    }

}

// Check connection

if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// query database

$query = "INSERT INTO image (image_name, theme_id, image_pointer, width, height, date_taken) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param('sisiis', $image_name,  $theme_id, $image_pointer, $width, $height, $date_taken);
$stmt->execute();

if ($stmt->affected_rows > 0) {

    echo "Image  " . $image_name . " loaded successfully </br>";


} else {
    echo "ERROR: Could not load image $sql. " . mysqli_error($db);
}

// Close connection

mysqli_close($db);

//back to admin.php

echo "<a href=../admin.php> Back to Admin Page</a>";

?>

</body>
</html>