<?php
require_once 'RegistrationController.php';
require_once '../Model/RegistrationModel.php';

//create registration controller
$validateRegistration = new RegistrationController();

//create registration model
$addRegistration = new RegistrationModel();

//Get any errors from the registration object
$error_array = $validateRegistration->getErrors();

//Get username to verfity
$userUsername = $validateRegistration->getUsername();
// send username to database, If username is found, store error message in result
$nameResult = $addRegistration->searchUsername($userUsername);

//Append username error if any, to the errors from registration
if($nameResult !== null){
    array_push($error_array,$nameResult);
}

//If no errors add record to database
if(empty($error_array)){
    $values = $validateRegistration -> getValues();
    $insertResult = $addRegistration->insertUser($values);
    //check for insert errors
    if($insertResult){
        array_push($error_array,$insertResult);
    }else{
    header('Location: ../View/RGMCreateUser.php');
    exit();
    }
}



// Serialize the array and encode it for safe URL transport
$error_message = urlencode(serialize($error_array));


//send any errors to the user
header('Location: ../View/RGMCreateUser.php?errors='. $error_message);
exit();
?>

