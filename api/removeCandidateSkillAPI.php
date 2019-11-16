<?php

if (isset($_GET["candidateID"])){
    include_once "../class/User.php";
    $user = new User();
    $user->removeCandidateSkill($_GET["candidateID"]);
    $msg =  "All related skills has been removed.";
} else {
    $msg = "Nothing has been removed.";
}

$msg = json_encode($msg);
echo $msg;

?>