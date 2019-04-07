<!--
             KFPhoto

Created by Mike Cooper (1808760) for module CMM007
Date: March/April 2019

This app uses the kfphoto sql database

session.php (validates username and password sets session variables)

-->

<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // username, password sent from login form on index.php

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);


// check whether cookies are set from login page

if(!empty($_POST["rememberme"])) {
    setcookie ('username',$_POST['username'],time()+ 86400); // set time limit to 1 day
    setcookie ('password',$_POST['password'],time()+ 86400); // set time limit to 1 day

} else {
    setcookie('username',"");
    setcookie('password',"");

}


    // get data from customers table in kfphoto database

    $sql = "SELECT *  FROM customers WHERE name = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $customer_type = $row['customer_type'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row and set user type (Admin or customer)

    if ($count == 1) {
        $_SESSION['username'] = $myusername;
        $_SESSION['customer_type'] = $customer_type;
        header("location:homepage.php");
    } else {
        $error = "Your Login Name or Password is invalid please try again";
    }
}

?>
