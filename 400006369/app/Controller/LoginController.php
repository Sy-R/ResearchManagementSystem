<?php
require_once 'testInput.php';

class LoginController{

//Member variables
//define variables
private $password;
private $email;

//constructor
public function __construct(){
    //clean data 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $this->email = test_inputs($_POST["email"]);
        $this->password = test_inputs($_POST["password"]);
    }
    }//constructor

    //Methods
    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }
}
?>