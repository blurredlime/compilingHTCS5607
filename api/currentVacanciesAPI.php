<?php
include_once "../class/Vacancy.php";

$vacancy = new Vacancy();
$allCurrentVacancies = $vacancy->showCurrentVacancies();
$vacancysData = json_encode($allCurrentVacancies);
echo $vacancysData;

?>