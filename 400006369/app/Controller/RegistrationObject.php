<?php
// require_once 'RegistrationController.php';
// require_once '../Model/RegistrationModel.php';
try{
//autoloader
require_once '../Autoloader.php';
//Register the autoloader
\app\MyAutoloader::register();

//create registration controller
$validateRegistration = new \Controller\RegistrationController();

//create registration model
$addRegistration = new \Model\RegistrationModel();

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
    header('Location: ../View/Login.php');
    exit();
}

// //Append insertion message to the errors from registration
//     $insertResult = $db->insertUser($values);
//     array_push($error_array,$insertResult);

// Serialize the array and encode it for safe URL transport
$error_message = urlencode(serialize($error_array));

//send any errors to the user
header('Location: ../View/Registration.php?errors='. $error_message);
exit();
}catch(Exception $e){
    echo  $e->getMessage();
}
?>

<!-- done -->