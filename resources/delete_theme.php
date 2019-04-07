<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

delete_theme -  displays form to delete selected theme and warns that images in theme will
be deleted from database but left in images directory

-->

<?php
include("config.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Theme </title>
</head>
<body>
<h1>KFPhotography Theme Delete </h1>

<?php

// check that all entries are filled out

if (!isset($_POST['theme_name'])) {
    echo "<p>You have not entered a valid theme name.<br>
             Please go back and try again.</p>";
    exit;
}
// create variable

$theme_name = $_POST['theme_name'];

// Check connection

if ($db === false) {
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
// Attempt theme delete

$sql = (" DELETE FROM  theme WHERE theme_name = ('" . $theme_name . "')");
if (mysqli_query($db, $sql)) {
    echo "Theme  " . $theme_name . " deleted successfully.<br><br>";
} else {
    echo "ERROR: Could not delete image, please try again $sql. " . mysqli_error($db);
}

// Close connection

mysqli_close($db);

// back to admin.php

echo "<a href=../admin.php> Back to Admin Page<br><br></a>";

?>

</body>
</html>