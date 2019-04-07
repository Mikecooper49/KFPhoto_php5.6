<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

create_theme.php - displays form to create a new theme

-->


<?php
include("config.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create New Theme</title>
</head>
<body>
<h1>KFPhotography Create New Theme</h1>

<?php

// check that all entries are filled out

if (!isset($_POST['theme_name'])
) {
    echo "<p>You have not entered a theme name<br/>
             Please go back and try again.</p>";
    exit;
}
// create variables


$theme_name = $_POST['theme_name'];
$theme_descrip = $_POST['theme_descrip'];


// Check connection

if ($db === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt to create new theme

$query = "INSERT INTO theme (theme_name, descrip) VALUES (?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param('ss', $theme_name, $theme_descrip);
$stmt->execute();

if ($stmt->affected_rows > 0) {

    echo "Theme  " . $theme_name . " created successfully </br>";
    echo "<a href=../admin.php> Back to Admin Page </a>";

} else {
    echo "ERROR: Could not load theme $sql. " . mysqli_error($db);
}

// Close connection

mysqli_close($db);
?>

</body>
</html>