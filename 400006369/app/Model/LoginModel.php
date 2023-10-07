<?php
namespace Model;
use Exception;
try{
    //autoloader
    require_once '../app/Autoloader.php';

    //Register the autoloader
    \app\MyAutoloader::register();
    
}catch(Exception $e){
    echo  $e->getMessage();
}

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

class LoginModel{

    private function findUser($email ,$password, $db){
        //Ensure user exist in the databse
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
        //user found, varify password
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        //verify entered password against hashed password
        if(password_verify($password, $hashedPassword)){
            //create session variable to control access to pages, and display userinfo
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['role'] = $user['role'];
        }else{
            $stmt->close();
            return "Invalid email/password.";
        }

        }else{
        $stmt->close();
        return "Invalid email/password.";
        }

        
    }

    public function userResults($email, $password){
        //create database connection, send connection to findUser to query database
        $db = new DbConnect();
        return $this->findUser($email, $password, $db);
    }

}
?>