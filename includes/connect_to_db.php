<?php
    // Include the constant file
    include('constants.php');

    // DB connection
    function connectToDb(){
        // Initialize connection object
        $mysqli = new mysqli(HOST_NAME, HOST_USERNAME, HOST_PASSWORD, DB_NAME);

        // Check for successfull connection
        if(mysqli_connect_errno()){
            echo "Unable to connect to database". mysqli_error($mysqli);
        }
        else
        {
            return $mysqli;
        }
    }

    function disconnectDb($mysqli){
        $mysqli ->close();
    }
?>