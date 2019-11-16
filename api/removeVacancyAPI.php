<?php

if (isset($_GET["vacancyID"])){
    include_once "../class/Vacancy.php";
    $vacancy = new Vacancy();
    $vacancy->removeVacancy($_GET["vacancyID"]);
    $msg = $_GET["vacancyID"]." has been removed.";
} else {
    $msg = "Nothing has been removed.";
}

$msg = json_encode($msg);
echo $msg;

?>