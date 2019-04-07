<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

config_rgu.php (opens db1808760_kfphoto database at RGU)

-->

<?php

define('DB_SERVER', 'CSDM-WEBDEV');
define('DB_USERNAME', '1808760');
define('DB_PASSWORD', '1808760');
define('DB_DATABASE', 'db1808760_kfphoto');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

?>