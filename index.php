<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

index.php - login page

-->
<?php

include("resources/config.php");
include("resources/session.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="resources/style/style.css">

</head>

<!-- background photo -->

<body class="bg" background="resources/images/login_pic.jpg">

<!-- login box and check/set login cookie -->

<div align="left">
    <div style="width:400px; border=0;  align=right">

        <div style="margin:20px 20px">

            <div class="loginbox" align="right">
                <form action="" method="post">
                    <label> Email : </label><input type="text" name="username" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>" class="box"/><br/><br/>
                    <label> Password : </label><input type="password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" class="box"/><br/><br/>
                    Remember Me: <input type="checkbox" name="rememberme" class="box"/><br><br/>
                    <input type="submit" value="Log On">
                </form>
            </div>

            <?php if(isset($error)) {
            echo "<p>Sorry, you're login hasn't worked.<br />
             Please try again.</p>";}?>
        </div>
    </div>
</div>

<!-- footer -->

<footer id="footer">
    <?php
    require("resources/footer.php");
    ?>
</footer>

</body>

<!-- end of body -->

</html>




