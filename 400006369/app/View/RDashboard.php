<!-- control access to page, check session varaibles to ensure user has autthrization, 
if not redirect to error page  -->
<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['role'])){
    header('Location: Login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Researcher</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>

    <body>
        <header>
            <img src="research.png" alt="logo">
            <a href="../Controller/logout.php">Log out</a>
   
            <div class="userInfo">
           <p id="userTitle">Researcher: 
            <?php 
            echo $_SESSION['username']
            ?>
            </p>
           <p id="userEmail">Email: 
           <?php 
            echo $_SESSION['email']
            ?>
           </p>
       </div>
       </header>

       <div class="flex-container">
        <div class="flexDiv"><a href="">View All Studies</a></div>
    </div>

        <footer class="footer">
            <p>Copyright &copy; Nusaybah Rahman. All Rights Reserved</p>
        </footer>
    </body>
</html>