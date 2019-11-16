<?php

if (isset($_POST["description"])){
    include_once "../class/Vacancy.php";
    $vacancy = new Vacancy();
    $newID = $vacancy->addVacancy($_POST["description"], $_POST["notes"], $_POST["status"], $_POST["salary"], $_POST["employerID"], $_POST["qualificationID"]);
    $msg = $newID." has been added.";
} else {
    $msg = "Nothing has been added.";
}
$msg = json_encode($msg);
echo $msg;

?>
