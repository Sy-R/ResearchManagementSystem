<?php
// if(session_status() == PHP_SESSION_NONE){
    session_start();
// }
require_once '../Model/LoginModel.php';
require_once 'LoginController.php';

//create login controller
$loginController = new LoginController();

//create login model
$loginModel = new LoginModel();

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
    header('Location: GoTo.php');
    exit(); 
    // if ($_SESSION["role"] == "Research Group Manager"){
    //     header('Location: ../View/RGMDashboard.php');
    //     exit();
    // }elseif ($_SESSION["role"] == "Research Study Manager"){
    //     header('Location: ../View/RSMDashboard.php');
    //     exit;
    // }elseif($_SESSION["role"] == "Researcher")
    // header('Location: ../View/RDashboard.php');
}
else{
//Send errors back to user
$error_message = urlencode($error);
header('Location: ../View/Login.php?errors='. $error_message);
exit(); 
}
?>