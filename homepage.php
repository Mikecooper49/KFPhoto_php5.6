<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

homepage.php - page after login where different hyperlinked themes are displayed (responsive)

-->

<?php
include_once("resources/config.php");
include_once("resources/session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>KFPhotography Homepage</title>
    <link rel="stylesheet" href="resources/style/style.css">

</head>

<body class="bg" background="resources/images/login_pic.jpg">
<div class="logo">
    <img src="resources/images/LogoWhite.jpg" alt="kfphotography logo" width="400px" height="200px">
</div>



<!-- set navbar -->

<?php

$customer_type = $_SESSION['customer_type'];

if ($customer_type == 'Admin') {

    include("resources/navbars/adminnav.html");
} else {

    include("resources/navbars/customernav.html");
}
?>

<!-- gather data from theme table to populate homepage-->

<?php
$query = "SELECT * from theme (theme_name, descrip) VALUES (?, ?)";

?>


<h2> Please click on an image to enter a theme</h2>

<!-- responsive container for images-->

<div class="container">
    <div>
        <a href="theme.php?theme_id=9">
            <img src="images/Shakkin_Briggie.jpg" alt=" Shakkin Briggie">
            <h2>Aberdeen</h2>
        </a>
    </div>

    <div>
        <a href="theme.php?theme_id=2">
            <img src="images/Windmill.jpg" alt="Windmill">
            <h2>Copenhagen</h2>
        </a>
    </div>

    <div>
        <a href="theme.php?theme_id=5">
            <img src="images/Finzean.jpg" alt="Finzean">
            <h2>Pot Pouri</h2>
        </a>
    </div>

    <div>
        <a href="theme.php?theme_id=3">
            <img src="images/Bridge.jpg" alt="Bridge in Stavanger">
            <h2>Stavanger</h2>
        </a>
    </div>

    <div>
        <a href="theme.php?theme_id=10">
            <img src="images/Cobbles.jpg" alt="Aberdeen Coobles">
            <h2>Urban</h2>
        </a>
    </div>

</div>

</body>

<!-- end of body -->

</html>