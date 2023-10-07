<?php
namespace Controller;
use Exception;
try{
    //autoloader
    require_once '../Autoloader.php';

    //Register the autoloader
    \app\MyAutoloader::register();
    
}catch(Exception $e){
    echo  $e->getMessage();
}

class LoginController{
use testInput; //trait

//Member variables
//define variables
private $password;
private $email;

//constructor
public function __construct(){
    //clean data 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $this->email = $this->test_inputs($_POST["email"]);
        $this->password = $this->test_inputs($_POST["password"]);
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