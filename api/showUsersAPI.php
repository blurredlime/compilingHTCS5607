<?php
    include_once "../class/Admin.php";

    $admin = new Admin();
    $users = $admin->showAllusers();
    $usersData = json_encode($users);
    echo $usersData;

    ?>