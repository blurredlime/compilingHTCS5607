<?php
session_start()
?>
<div class = "header">
    <div class = "headerbanner"><div class="logocontainer"><a href="homenavigation.php"> <img src = "images/logo.png" id = "lgralogo"></a></div>
        <h1>Looking Glass Recruitment Agency</h1>
    <div id="nameWrap">
        <div id="username">
            <?php
            echo $_SESSION['name']
            ?>
            <img id="TypeOfUserstoredImg" src="images/userdefault.png">
        </div>
    </div>
        <div id="logout"><a href="api/logoutAPI.php">Logout<img id="logout" src="images/logout.png" href="api/logoutAPI.php"></a></div>
    </div>

</div>



