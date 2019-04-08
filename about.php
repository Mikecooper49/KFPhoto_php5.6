<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

about.php - shows text about photographer

-->

<?php
session_start();
include_once("resources/config.php");
// include_once("resources/session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>About</title>
    <link rel="stylesheet" href="resources/style/style.css">

</head>

<body class="bg" background="resources/images/login_pic.jpg">
<div class="logo">
    <img src="resources/images/LogoWhite.jpg" alt="kfphotography logo" width="400px" height="200px">
</div>

<?php

/* check customer type from login and set navbar */

$customer_type = $_SESSION['customer_type'];

if ($customer_type == 'Admin') {

    include("resources/navbars/adminnav.html");
} else {

    include("resources/navbars/customernav.html");
}
?>

<div class="text-container" align="center">

    <h2>About Kevin Flanagan</h2>

    </div>

    <!-- Text from Kevin -->
    <div class="text" align="center">
        <p> My first memory of photography was at the age of five or six in my Grandfather’s darkroom which he had
            built in his loft.
            It was a wonderful experience for a boy of that age. First of all, climbing the ladder to enter a hidden
            world and then
            to see the magic happen as the images appeared on the paper in the developing bath.<br><br>
            That magic has never left me and I am now a keen amateur photographer. Although my work is now mostly
            digital, I have
            recently gone back to using film and darkroom printing.<br><br>
            My work is developing but is predominantly landscape, both rural and urban. A recurring theme is the
            juxtaposition of
            modern technology with the human space and it’s intrusion into every aspect of life.<br><br>
            I live in the North East of Scotland and am a member of the Royal Photographic Society and the Bon Accord
            Camera Club.
        </p>
    </div>



<!-- include footer.php -->

<footer id="footer">
    <?php
    require("resources/footer.php");
    ?>
</footer>

</body>

<!-- end of body -->

</html>