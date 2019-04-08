<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

config.php (opens kfphoto database on home computer, if this fails it opens db_1808760_kfphoto connection at RGU)

-->

<?php

// home environment connection

define('DB_SERVER_HOME', 'localhost');
define('DB_USERNAME_HOME', 'root');
define('DB_PASSWORD_HOME', 'root');
define('DB_DATABASE_HOME', 'kfphoto');
$db = mysqli_connect(DB_SERVER_HOME, DB_USERNAME_HOME, DB_PASSWORD_HOME, DB_DATABASE_HOME);

// if not connected at home try RGU connection

if (!$db) {

    define('DB_SERVER_RGU', 'CSDM-WEBDEV');
    define('DB_USERNAME_RGU', '1808760');
    define('DB_PASSWORD_RGU', '1808760');
    define('DB_DATABASE_RGU', 'db1808760_kfphoto');
    $db = mysqli_connect(DB_SERVER_RGU, DB_USERNAME_RGU, DB_PASSWORD_RGU, DB_DATABASE_RGU);

}

?>