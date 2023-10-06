<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale="1.0">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>

<body>

    <form action="../Controller/RegistrationObject.php" method="post">
        <h3>Create an account</h3>
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
        </p>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="Research Group Manager">Research Group Manager</option>
            <option value="Research Study Manager">Research Study Manager</option>
            <option value="Researcher">Researcher</option>
        </select>

        <button type="submit">Register</button>

        <p>Already have an account? <a href="">Sign in</a></p>
    </form>

    <footer class="footer">
        <p>Copyright &copy; Nusaybah Rahman. All Rights Reserved</p>
    </footer>
</body>
</html>
<!-- css, html done -->