<?php
require_once 'DbConnect.php';

//Create database connection
$db = new DbConnect();

class RegistrationModel{

    public function searchUsername($username){
        global $db;

        //Ensure username is unique in the databse
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $usernameErr = "Username aleady exist.";
            return $usernameErr;
        }

        $stmt->close();
    }

    
    public function insertUser($values){
        global $db;
        
        $username = $values['username'];
        $email = $values['email'];
        $password = $values['password'];
        $role = $values['role'];

        $sql = "INSERT INTO users (username, password, email, role)
        VALUES (?, ?, ?, ?)";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bind_param("ssss", $username, $password,  $email, $role);
        $stmt->execute();
        $stmt->close();
    }
}
?>