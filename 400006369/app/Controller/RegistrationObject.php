<?php
require_once 'RegistrationController.php';
require_once '../Model/DbConnect.php';

//Create database object
$db = new DbConnect();

//Create registration object
$validateRegistration = new RegisterController();

//send username to database
$userUsername = $validateRegistration->getUsername();
//If username is found, store error message in result
$nameResult = $db->searchUsername($userUsername);

//Get any errors from the registration object
$error_array = $validateRegistration->getErrors();

//Append username error if any, to the errors from registration
if($nameResult !== null){
    array_push($error_array,$nameResult);
}

//If no errors add record to database
if(empty($error_array)){
    $values = $validateRegistration -> getValues();
}

//Append insertion message to the errors from registration
    $insertResult = $db->insertUser($values);
    array_push($error_array,$insertResult);

// Serialize the array and encode it for safe URL transport
$error_message = urlencode(serialize($error_array));

//send any errors to the user
header('Location: ../View/Registration.php?errors='. $error_message);

exit();
?>

<!-- done -->