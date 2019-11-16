<?php

if (isset($_GET["candidateID"])){
    include_once "../class/User.php";
    $user = new User();
    $user->removeUser($_GET["candidateID"]);
    $msg = $_GET["candidateID"]." has been removed.";
} else {
    $msg = "Nothing has been removed.";
}

$msg = json_encode($msg);
echo $msg;

?>