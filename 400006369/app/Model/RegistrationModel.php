<?php
namespace Model;
use Exception;
try{
    //autoloader
    require_once '../Autoloader.php';

    //Register the autoloader
    \app\MyAutoloader::register();

}catch(Exception $e){
    echo  $e->getMessage();
}

class RegistrationModel{
 
    public function searchUsername($username){
        //Create database connection
        $db = new DbConnect();

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
        //Create database connection
        $db = new DbConnect();

        $username = $values['username'];
        $email = $values['email'];
        $password = $values['password'];
        $role = $values['role'];

        $sql = "INSERT INTO users (username, password, email, role)
        VALUES (?, ?, ?, ?)";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bind_param("ssss", $username, $password,  $email, $role);
        $stmt->execute();
        if($stmt->error){
            return $stmt->error;
        }
        $stmt->close();
    }
}
?>