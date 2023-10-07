<?php
//start session if not started
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

//unset all session variables
session_unset();

//destroy sesssion
session_destroy();

//redirect to login page
header('Location: ../View/Login.php');
exit();
?>