<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

logout.php -  simple logout

-->

<?php
session_start();

if (session_destroy()) {
    header("Location:../index.php");
}
?>