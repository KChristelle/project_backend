<?php
    $admin_full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email =  $_POST['email'];
    $password = $POST['password'];

    // DB Connection
    $conn = new mysqli('localhost', 'root', '', 'registration');
    if($conn -> connect_error){
        die('Connection Failed : '. $conn-> connect_error);

    }else{
        $stmt = $conn->prepare("insert into admin(admin_full_name, username, email, password)
        values(?, ?, ?, ?)");
        $stmt->bind_param($admin_full_name, $username, $email, $password);
        $stmt->execute();
        echo "Registration was successful";
        $stmt->close();
        $conn->close();
    }
?>