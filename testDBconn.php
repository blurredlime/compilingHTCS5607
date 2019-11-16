<?php

    include_once "class/Admin.php";

    $user = new User(); $admin = new Admin();
    $users = $admin->showAllusers();
    $usersData = json_encode($users);
   //print_r($user);
    echo $usersData;
    ?>
