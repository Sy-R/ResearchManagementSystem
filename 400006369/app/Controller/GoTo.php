<!-- control access to page, check session varaibles to ensure user has authorization, 
if not redirect to error page  -->
 <?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['role'])){
    header('Location: ../View/Login.php');
    exit();
}
if($_SESSION['role'] == "Researcher"){
    header('Location: ../View/RDashboard.php');
    exit();
}
if($_SESSION['role'] == "Research Study Manager"){
    header('Location: ../View/RSMDashboard.php');
    exit();
}
if($_SESSION['role'] == "Research Group Manager"){
    header('Location: ../View/RGMDashboard.php');
    exit();
}
?> 