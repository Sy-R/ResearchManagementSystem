<?php
 if(session_status() == PHP_SESSION_NONE){
    session_start();
 }
try{
//autoloader
//require_once '../Autoloader.php';
require_once 'Autoloader.php';
//Register the autoloader
\app\MyAutoloader::register();

//create login controller
$loginController = new \Controller\LoginController();

//create login model
$loginModel = new \Model\LoginModel();

//Get enetered password and email
$enteredPassword = $loginController->getPassword();
$enteredEmail = $loginController->getEmail();

//send entered password and email to be checked in database
$searchResults = $loginModel->userResults($enteredEmail,$enteredPassword);

//errors
if ($searchResults !== null){
    $error = $searchResults;
}
//Redirect to dashboard
if(empty($error)){
    //header('Location: GoTo.php');
    header('Location: ./Controller/GoTo.php');
    exit(); 
}
else{
//Send errors back to user
$error_message = urlencode($error);
// header('Location: ../View/Login.php?errors='. $error_message);
header('Location: ./View/Login.php?errors='. $error_message);
exit(); 
}
}catch(Exception $e){
    echo  $e->getMessage();
}
?>