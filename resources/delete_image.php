<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

delete_image.php -  displays form to delete an image from the database but leaves the jpg in images directory

-->

<?php
include("config.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Image</title>
</head>
<body>
<h1>KFPhotography Image Delete</h1>

<?php

// check that all entries are filled out

if (!isset($_POST['image_name'])) {
    echo "<p>You have not entered am image name.<br />
             Please go back and try again.</p>";
    exit;
}
// create variable

$image_name = $_POST['image_name'];

// Check connection

if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt image delete

$sql = (" DELETE from image WHERE image_name = ('" . $image_name . "')");
if (mysqli_query($db, $sql)) {
    echo "Image  " . $image_name . " deleted successfully.<br/>";
} else {
    echo "ERROR: Could not delete image, please try again $sql. " . mysqli_error($db);
}

echo "<a href=../admin.php> Back to Admin Page<br/><br/></a>";

// Close connection

mysqli_close($db);
?>

</body>
</html>