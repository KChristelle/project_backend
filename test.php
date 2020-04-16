<?php
    include('includes/connect_to_db.php');
   

    $admin_full_name = $_POST['admin_full_name'];
    $username = $_POST['username'];
    $email =  $_POST['email'];
    $password = $_POST['password'];

    // DB Connection
    $conn =  connectToDb();

    $stmt = $conn->prepare("insert into admin(admin_full_name, username, email, user_password)
    values(?, ?, ?, ?)");
    $stmt->bind_param('sssi',$admin_full_name, $username, $email, $password);
    $stmt->execute();
    if ($stmt->affected_rows != 0) {
        echo "Registration was successful";
        } else {
            echo 'Error: ' . $stmt->error;
        }
    $stmt->close();
    $conn->close();
  
?>