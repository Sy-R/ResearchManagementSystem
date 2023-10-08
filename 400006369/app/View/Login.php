<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>

    <body>
    <form action=".././LoginObject.php" method="post">

        <header>
            <a href="../Controller/logout.php">Log out</a>
        </header>

            <h3>Sign In</h3>
            <p id="errors">
            <?php
            if (isset($_GET['errors'])) {
                // Retrieve errors from the query parameter
                $error_message = urldecode($_GET['errors']);
            
                // Display the errors
                    echo "*$error_message<br>";

    
            }
            ?>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <button type="submit" class="cntrButton">Sign in</button>

            <p>Need an account? <a href="Registration.php">Register</a></p>
        </form>

        <footer class="footer">
            <p>Copyright &copy; Nusaybah Rahman. All Rights Reserved</p>
        </footer>
    </body>
</html>
<!-- css, html done -->