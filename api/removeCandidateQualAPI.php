<?php

if (isset($_GET["candidateID"])){
    include_once "../class/User.php";
    $user = new User();
    $user->removeCandidateQualification($_GET["candidateID"]);
    $msg =  "All related qualifications has been removed.";
} else {
    $msg = "Nothing has been removed.";
}

$msg = json_encode($msg);
echo $msg;

?>