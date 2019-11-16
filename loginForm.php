<?php
        session_start();
        if (isset($_SESSION["name"])) {
            echo $_SESSION["name"];

?>

            <p><a href = "api/logoutAPI.php"> Logout</a></p>

<?php

        } else {
?>

        <form action = "api/loginAPI.php" method = "post">
            <p>Username: <input type = "text" name = "username" placeholder = "Username"></p>
            <p>Password: <input type = "text" name = "password" placeholder = "Password"></p>
            <p><input type = "submit" value = "Login"></p>
        </form>

<?php
        }

?>