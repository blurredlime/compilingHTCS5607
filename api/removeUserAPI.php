<?php

    if (isset($_GET["userID"])){
        include_once "../class/Admin.php";
        $admin = new Admin();
        $admin->deleteUser($_GET["userID"]);
        $msg = $_GET["userID"]." has been removed.";
    } else {
        $msg = "Nothing has been removed.";
    }

    $msg = json_encode($msg);
    echo $msg;

?>