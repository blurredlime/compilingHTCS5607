<?php
include_once "../class/Vacancy.php";
$employerID = $_GET["employerID"];

$vacancy = new Vacancy();
$compNames = $vacancy->showVacancyCompName($employerID);
$vacancyData = json_encode($vacancyData);
echo $vacancyData;

?>