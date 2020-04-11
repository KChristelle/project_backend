<?php
    $admin_full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email =  $_POST['email'];
    $password = $_POST['password'];

    // DB Connection
    $conn = new mysqli('localhost', 'root', '', 'registration');
    if($conn -> connect_error){
        die('Connection Failed : '. $conn-> connect_error);

    }else{
        $stmt = $conn->prepare("insert into admin(admin_full_name, username, email, password)
        values(?, ?, ?, ?)");
        $stmt->bind_param('sssi',$admin_full_name, $username, $email, $password);
        $stmt->execute();
        if ($stmt->num_rows == 1) {
            echo "Registration was successful";
         } else {
             echo 'Error: ' . $stmt->error;
         }
        $stmt->close();
        $conn->close();
    }
?>