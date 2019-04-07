<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

theme.php - reads image_pointer and image_name from database, displays all of the images in
the selected theme and reads more metadata directly from jpg (in /images) to display underneath
each image with along image title.

-->

<?php
include("resources/config.php");
include("resources/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Selected Theme Page</title>
    <link rel="stylesheet" href="resources/style/style.css">

</head>

<body class="bg" background="">
<div class="logo">
    <img src="resources/images/LogoWhite.jpg" alt="kfphotography logo" width="400px" height="200px">
</div>


<?php
$customer_type = $_SESSION['customer_type'];

if ($customer_type == 'Admin') {

    include("resources/navbars/adminnav.html");

} else {

    include("resources/navbars/customernav.html");
}

?>

<?php

//GET theme_id from homepage selection
$theme_id = $_GET['theme_id'];

// read database
$sqltheme = "SELECT *  FROM image WHERE theme_id='$theme_id'";

$result = mysqli_query($db, $sqltheme);

// get more metadata from jpg

// declare metadata tag variables

$Model = 0;
$FNumber = 0;
$ExposureTime = 0;
$ISO = 0;
$speed = 0;
$Lens = "";
$Copyright = "";


// display each photo within selected theme

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ; ?>
        <br><br>
        <div class="picture" align="center">
            <img src="<?php echo trim($row['image_pointer'], "../"); ?> " alt="<?php echo $row['image_name']; ?>"
                 style="width:80%; height:80%">


            <!-- read metadata directly from jpg -->

            <?php $exif = exif_read_data(trim($row['image_pointer'], "../"), 0, true);

            foreach ($exif as $key => $section) {
                foreach ($section as $name => $val) {

                    if ($name == "ApertureFNumber") {
                        $FNumber = $val;
                    }
                    if ($name == "Model") {
                        $Model = $val;
                    }
                    if ($name == "ISOSpeedRatings") {
                        $ISO = $val;
                    }

                    if ($name == "UndefinedTag:0xA434") {
                        $Lens = $val;
                    }

                    if ($name == "Copyright") {
                        $Copyright = $val;
                    }
                }

            }
            ?>

            <!-- print image name and metadata from jpg in dir /images  -->

            <h2><?php echo $row['image_name'] . " " . $Copyright; ?></h2>
            <h3><?php echo "(Camera:  " . $Model . "  F-Number:  " . $FNumber . " ISO:   " . $ISO . "   Lens:  " . $Lens . ")"; ?></h3>
        </div>
        <?php
    }
} else {
    echo "no images";
}

// close result and sql query

$result->close();
?>


</body>


</html>