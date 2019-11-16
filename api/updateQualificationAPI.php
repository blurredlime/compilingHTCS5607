<?php

if (isset($_POST["qualificationID"])){
    include_once "../class/Qualification.php";
    $qualificationID = $_POST["qualificationID"];
    $name = $_POST["name"];
    $level = $_POST["level"];
    $qualification = new Qualification();
    $qualification->updateQualification($qualificationID, $name, $level);
    $msg = $qualificationID." has been updated.";
} else{
    $msg = "Nothing has been updated";
}
$msg = json_encode($msg);
echo $msg;
?>