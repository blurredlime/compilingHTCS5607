<?php
include_once "../class/Vacancy.php";

$vacancy = new Vacancy();
$delVacancies = $vacancy->showDeleteVacancies();
$vacanciesData = json_encode($delVacancies);
echo $vacanciesData;

?>