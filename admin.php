<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

admin.php - page where images and themes are managed (only available to Admin users)

-->

<?php
include("resources/config.php");
include("resources/session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page for Add & Delete</title>
    <link rel="stylesheet" href="resources/style/style.css">

</head>

<body class="bg" background="resources/images/login_pic.jpg">
<div class="logo">
    <img src="resources/images/LogoWhite.jpg" alt="kfphotography logo" width="400px" height="200px">
</div>

<?php
include("resources/navbars/adminnav.html");
?>

<h1> Admin - Manage Images and Themes</h1>
<br>

<div class="admin" style="width:60%">

    <!-- load image form -->
    <h2>Load New Image to a Theme</h2>
    <form action="resources/load_image.php" method="post">
        <label for="">Image: </label>
        <input type="file" id="fileToUpLoad" name="fileToUpload"/>
        <label for="fileToUpLoad">Image Name: (up to 30 chars) </label>
        <input type="text" id ="fileToUpLoad" name="image_name"/>
        <div id ="theme_select">
        <label for="theme_id">Select a theme: </label>
       <!-- <input name="theme_name" type ="text"/> -->
        <select name="theme_id" size="5">
            <option value="9">Aberdeen</option>
            <option value="2">Copenhagen</option>
            <option value="3">Stavanger</option>
            <option value="10">Urban</option>
            <option value="5">Pot Pouri</option>
        </select>
        </div>
        <br/>
        <input type="submit" name="Load" value="Load">
    </form>
</div>

<!-- delete image form -->
<div class="form-inline">
    <div class="admin" style="float:left; width:20%">

        <h2>Delete Image</h2>
        <br>
        <form action="resources/delete_image.php" method="post">
            <label for="image_name">Image Name: </label>
            <input type="text" id="image_name" name="image_name">
            <br/><br/>
            <input type="submit" value="Delete">
        </form>
    </div>

    <div class="admin" style=" float:left; width:20%">

        <!-- delete theme form -->
        <h2>Delete Theme</h2>
        <br>
        <form action="resources/delete_theme.php" method="post"
              onsubmit="return confirm('Theme and Images within theme will be deleted, Confirm ?')">
            <label for="theme_name">Theme Name: </label>
            <input type="text" id="theme_name" name="theme_name">
            <br/><br/>
            <input type="submit" value="Delete">
        </form>
    </div>
    <div class="admin" style=" float:left; width:40%">

        <!--create new theme form -->

        <h2>Create New Theme</h2>
        <br>
        <form action="resources/create_theme.php" method="post">
            <label for="theme_name">Theme Name: </label>
            <input type="text" id="theme_name" name="theme_name">
            <label for="theme_descrip">Theme Description: </label>
            <input type="text" id="theme_descrip" name="theme_descrip">
            <br/><br/>
            <input type="submit" value="Create">
        </form>
    </div>
    <br/><br/>

    <!-- read jpg metadata utility -->
    <div class="admin" style= " float:left; width:41.5%">
    <h2>Read jpg metadata (in images dir)</h2>
    <br>
        <form action="resources/read_jpegmeta.php" method="post">
            <label for="">Image Name: </label>
            <input type="file" id="fileToUpLoad" name="fileToUpload"/>
            <br/><br/>
            <input type="submit" value="Read Metadata">
        </form>
</div>

<!-- include footer.php -->

<footer id="footer">
    <?php
    require("resources/footer.php");
    ?>
</footer>

</body>
</html>

<!-- end of body -->

