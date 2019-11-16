<?php

    if (isset($_POST["firstName"])){
        include_once "../class/User.php";
        $user = new User();
        $newID = $user->register($_POST["firstName"], $_POST["lastName"], $_POST["streetAddress"], $_POST["suburb"], $_POST["city"], $_POST["emailAddress"],$_POST["phoneNumber"], $_POST["workType"], $_POST["status"], $_POST["username"], $_POST["password"]);
        $msg = $newID." has been added.";
    } else {
        $msg = "Nothing has been added.";
    }
    $msg = json_encode($msg);
    echo $msg;

?>
