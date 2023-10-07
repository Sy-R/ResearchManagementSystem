<!-- control access to page, check session varaibles to ensure user has autthrization, 
if not redirect to error page  -->
<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['role'])){
    header('Location: Login.php');
}
if($_SESSION['role'] !== "Research Group Manager"){
    header('Location: Unauthorized.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Research Group Manager</title>
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

        <form action="../Controller/RGMCreateUserObject.php" method="post">
            <h3>Create a User</h3>
            <p id="errors">
            <?php
            if (isset($_GET['errors'])) {
                // Retrieve the serialized array from the query parameter
                $error_message = urldecode($_GET['errors']);
            
                // Unserialize the array
                $error_array = unserialize($error_message);
            
                // Display the errors
                if (is_array($error_array)) {
                    foreach ($error_array as $error) {
                        echo "*$error<br>";
                    }
                }
            }
            ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
    
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
    
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
    
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="Research Study Manager">Research Study Manager</option>
                <option value="Researcher">Researcher</option>
            </select>

            <button type="submit" class="cntrButton">Create</button>
        <footer class="footer">
            <p>Copyright &copy; Nusaybah Rahman. All Rights Reserved</p>
        </footer>
    </body>
</html>
<!-- css, html done -->