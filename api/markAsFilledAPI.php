<?php

if (isset($_POST["vacancyID"])){
    include_once "../class/Vacancy.php";
    $vacancyID = $_POST["vacancyID"];
    $status = $_POST["status"];
    $vacancy = new Vacancy();
    $vacancy->markFilled($vacancyID, $status);
    $msg = $vacancyID." has been updated.";
} else{
    $msg = "Nothing has been updated";
}
$msg = json_encode($msg);
echo $msg;
?>