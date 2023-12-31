<?php
namespace Controller;
use Exception;
try{
    //autoloader
    require_once '../app/Autoloader.php';

    //Register the autoloader
    \app\MyAutoloader::register();
    
}catch(Exception $e){
    echo  $e->getMessage();
}

class RegistrationController{
use testInput; //trait

//Member variables
//define variables
private $username ;
private $password;
private $email;
private $role;
private $errors = array();

//constructor
   public function __construct(){
    //clean data 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $this->username = $this->test_inputs($_POST["username"]);
        $this->email = $this->test_inputs($_POST["email"]);
        $this->password = $this->test_inputs($_POST["password"]);
        $this->role = $this->test_inputs($_POST["role"]);

        $this->validateForm();
    }
    }//constructor

// Methods
    public function getValues(){
        $password = password_hash($this->password, PASSWORD_DEFAULT);

        return array(
            'username' => $this->username,
            'password' => $password,
            'email' => $this->email,
            'role' => $this->role
        );
    }
    
    private function validateForm(){
        $this->validatePassword();
        $this->validateEmail();
    }

    private function validatePassword(){
        // //Passwords must contain at least one upper case character, at least one digit and be at
        // least 10 characters long
        if(strlen($this->password) < 10){
        $this->errors['password'] = "Password muct be at least 10 characters long";
        }
        if(!preg_match('/[A-Z]/', $this->password)){
        $this->errors['password'] = "Password muct contain at least one upper case character";
        }
        if(!preg_match('/[0-9]/', $this->password)){
            $this->errors['password'] = "Password muct contain at least one digit";
        }
    }

    private function validateEmail(){
        //validate email using bulit in validate function
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL) == false)
        $this->errors['email'] = "Invalid email";
    }

    public function getUsername(){
        return $this->username;
    }
    
    public function getErrors(){
        return $this->errors;
    }
}

?>
<!-- done -->