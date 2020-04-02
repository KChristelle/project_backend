<?php
$admin_full_name = $_POST['full_Name'];
$username = $_POST['username'];
$email =  $_POST['email'];
$password = $POST['password'];

if(!empty($admin_full_name) || !empty($username) || !empty($email) || !empty($password)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "registration";

    // create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
        die('Connection Error(' . mysqli_connect_errno(). ')'. mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT email from admin where email = ? limit 1";
        $INSERT = "INSERT Into admin (admin_full_name, username, password, email)
        values(?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssss", $admin_full_name, $username, $password, $email);
            $stmt->execute();
            echo "New record inserted";

        }
        else{
            echo "That email already exists";
        }
        $stmt->close();
        $conn->close();
    }
}else{
    echo "All fields are required";
    die();
}
?>