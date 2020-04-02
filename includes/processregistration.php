<?php
include('connect_to_db.php');
include('validate.php');

// Fetch inputs
$admin_full_name = $_POST['full_name'];
$username = $_POST['username'];
$email =  $_POST['email'];
$password = $POST['password'];

$msg = "";
$action_page = "";

//Create a constructor
$validate = new Validation();

$usernamenotinuse = $validate->verifyusername($username);

if ($usernamenotinuse) {
    //Create a connection object
    $mysqli = connectToDb();

    $query = "INSERT INTO admin "
            . "(admin_full_name,username,password, email)"
            . "VALUES ('" . $admin_full_name . "',"
            . "'" . $username . "',"
            . "PASSWORD('$password'),"
            . "'" . $email . "')";

    //Execute the query
    $result = $mysqli->query($query);
    echo "Registration was successful";

    //Check if the query executed successfully
    // if ($result) {
    //     //Redirect the user to the login page
    //     $action_page = "../login.php";
    // } else {
    //     //Redirect them to the register page and display an error message
    //     $msg = "Unable to create account. Please try again.";
    //     $action_page = "../register.php";
    // }
}
// //Redirect the user as per the action page
// echo '<form name="user_redirect" id="user_redirect" method="POST"'
//  . 'action="' . $action_page . '">'
//  . '<input type="text" name="msg" value="' . $msg . '" />'
//  . '</form>';

// //create a javascript to execute the form
// echo '<script language="Javascript" type="text/javascript">'
//  . 'window.onload=function(){ '
//  . 'window.document.user_redirect.submit(); }'
//  . '</script>';