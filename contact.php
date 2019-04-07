<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

contact.php - shows contact information

-->

<?php
include_once("resources/config.php");
include_once("resources/session.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Information</title>
    <link rel="stylesheet" href="resources/style/style.css">

</head>

<body class="bg" background="resources/images/login_pic.jpg">
<div class="logo">
    <img src="resources/images/LogoWhite.jpg" alt="kfphotography logo" width="400px" height="200px">
</div>

<?php

/* check customer type from login */

$customer_type = $_SESSION['customer_type'];

if ($customer_type == 'Admin') {

    include("resources/navbars/adminnav.html");
} else {

    include("resources/navbars/customernav.html");
}
?>

<div class="text-container" align="center">

    <h2>Contact Information</h2>
</div>

    <!-- Text from Kevin -->

    <div class="text" align="center">
        <p> Tel : 01224 777777 <br><br>

            Mobile : 0758 999999<br><br>

            email: kevin.flanagan@kfphotgraphy.com<br><br>

        </p>
    </div>

<!-- include copyright footer.php -->

<footer id="footer">
    <?php
    require("resources/footer.php");
    ?>
</footer>

</body>

<!-- end of body -->

