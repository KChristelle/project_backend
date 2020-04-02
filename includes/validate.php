<?php

class Validation{
    public function verifyusername($username){
        // Create connection instance
        $mysqli = connectToDb();

        $query = "SELECT username FROM registration"
                . "WHERE username= '" .$username."'";
        $result =  $mysqli->query($query);
        if($result->num_rows > 0)
        {
            //This means that the username already exists
            return false;
        }
        else
        {
            return true;
        }
    }
}