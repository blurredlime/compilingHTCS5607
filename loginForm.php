<?php
session_start();
if (isset($_SESSION["name"])){

    ?>
    <a href='api/logoutAPI.php'><div id="logoutNav">Logout</div></a>
    <?php
}else{
    ?>
    <form action="api/loginAPI.php" method="post">
        <p id="username">
            Username:
            <input type="text" name="username" placeholder="Username">
        </p>
        <p id="password">
            Password:
            <input type="text" name="password" placeholder="Password">
        </p>
        <p>

            <input id="loginSubmit" type="submit" value="Login">
        </p>
    </form>



    <?php


}


?>