<?php

if (isset($_POST["vacancyID"])){
    include_once "../class/Vacancy.php";
    $vacancyID = $_POST["vacancyID"];
    $description = $_POST["description"];
    $notes = $_POST["notes"];
    $status = $_POST["status"];
    $salary = $_POST["salary"];
    $vacancy = new Vacancy();
    $vacancy->updateVacancy($vacancyID, $description, $notes, $status, $salary);
    $msg = $vacancyID." has been updated.";
} else{
    $msg = "Nothing has been updated";
}
$msg = json_encode($msg);
echo $msg;
?>