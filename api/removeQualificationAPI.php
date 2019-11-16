<?php

if (isset($_GET["qualificationID"])){
    include_once "../class/Qualification.php";
    $qualification = new Qualification();
    $qualification->removeQualification($_GET["qualificationID"]);
    $msg = $_GET["qualificationID"]." has been removed.";
} else {
    $msg = "Nothing has been removed.";
}

$msg = json_encode($msg);
echo $msg;

?>